<?php

namespace App\Laravel\Controllers\Frontend;

/*
 * Request Validator
 */

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Upload;
use App\Laravel\Models\Codes;

class MainController extends Controller
{

	protected $data = [];

	public function __construct()
	{
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['js'] = "index.js";
	}

	public function index()
	{
		$this->data['page_title'] .= " - Home";

		$this->data['dataa'] = Codes::with('uploads')->orderBy('created_at', "DESC")
			->paginate(10);

		return view('frontend.index', $this->data);
	}
}
