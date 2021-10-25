<?php

namespace App\Laravel\Controllers\Frontend;

/*
 * Request Validator
 */

use App\Laravel\Requests\PageRequest;

use App\Laravel\Models\Upload;
use App\Laravel\Models\Codes;

use DB;

class FileUploadController extends Controller
{

	protected $data = [];

	public function __construct()
	{
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['js'] = "uploadfile.js";
	}

	public function index(PageRequest $request)
	{
		$this->data['page_title'] .= " - List of Uploads";
		$this->data['uploads'] = Upload::orderBy('created_at', "DESC")->get();
		return view('frontend.fileuploadPortal.index', $this->data);
	}

	public function create(PageRequest $request)
	{
		$this->data['page_title'] .= " - New Upload";
		return view('frontend.fileuploadPortal.create', $this->data);
	}

	public function store(PageRequest $request)
	{
		// $path = array();
		// $filename = array();
		DB::beginTransaction();
		try {
			$code = new Codes;
			$code->rdo_code = $request->input('rdo_code');
			$code->rco_code = $request->input('rco_code');

			$code->save();

			if ($code) {
				if ($request->hasfile('files')) {
					foreach ($request->file('files') as $file) {
						$upload = new Upload;
						$name = $file->getClientOriginalName();
						$file->move(public_path() . '/uploads/', $name);
						$upload->code_id = $code->id;
						$upload->filename = $name;
						$upload->path = public_path() . '/uploads/' . $name;

						// array_push($filename, $name);
						// array_push($path, public_path() . '/uploads/' . $name);

						$upload->save();
					}
				}
			}
			// $code->path = json_encode($path);
			// $code->filename = json_encode($filename);
			// $code->save();

			DB::commit();

			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Upload Success.");
			return redirect()->route('frontend.index');
		} catch (\Exception $e) {
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();
		}
	}

	public function edit($id)
	{
		$codes = Codes::find($id);

		if (!$codes) {
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Upload not found.");
			return redirect()->route('frontend.index');
		}
		$this->data['code'] = $codes;
		return view('frontend.fileuploadPortal.edit', $this->data);
	}

	public function update(PageRequest $request, $id = NULL)
	{
		DB::beginTransaction();

		try {
			$codes = Codes::with('uploads')->where('id', $id)->first();
			$codes->rdo_code = $request->input('rdo_code');
			$codes->rco_code = $request->input('rco_code');
			$codes->save();

			// if ($codes) {
			// 	if ($request->hasfile('files')) {
			// 		foreach ($request->file('files') as $file) {
			// 			$upload = Upload::where('code_id', $id);
			// 			$name = $file->getClientOriginalName();
			// 			$file->move(public_path() . '/uploads/', $name);
			// 			$upload->code_id = $codes->id;
			// 			$upload->filename = $name;
			// 			$upload->path = public_path() . '/uploads/' . $name;


			// 			$upload->save();
			// 		}
			// 	}
			// }

			DB::commit();

			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Update Successfully.");
			return redirect()->route('frontend.index');
		} catch (\Throwable $e) {
			DB::rollback();;
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Errorss: Code #{$e->getMessage()}");
		}
	}

	public function destroy($id)
	{
		DB::beginTransaction();

		try {
			$codes = Codes::find($id);

			$codes->delete();

			if ($codes) {
				$uploads = Upload::where('code_id', $id)->get();

				foreach ($uploads as $upload) {
					$upload->delete();
				}
			}


			DB::commit();

			session()->flash('notification-status', "success");
			session()->flash('notification-msg', "Upload Deleted Successfully.");
			return redirect()->route('frontend.index');
		} catch (\Throwable $e) {
			DB::rollback();;
			session()->flash('notification-status', "failed");
			session()->flash('notification-msg', "Server Errorss: Code #{$e->getMessage()}");
		}
	}
}
