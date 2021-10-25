@extends('components.mainlayout')

@section('content')
    <div class="row">
        <div class="col">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Upload</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
                @if (session()->has('notification-status'))
                    <div class="alert alert-{{ in_array(session()->get('notification-status'), ['failed', 'error', 'danger']) ? 'danger' : session()->get('notification-status') }}"
                        role="alert">
                        {{ session()->get('notification-msg') }}
                    </div>
                @endif
                {!! csrf_field() !!}
                <div class="card mt-3">
                    <div class="card-header text-center" style="background-color:#4FC2F8; color:#eee;font-size:30px;">
                        Upload BIR MRCOS DB File
                    </div>
                    <div class=" card-body">
                        <div class="form-group">
                            <label for=""> RDO Code</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="rdo_code" value="{{ old('rdo_code') }}"
                                required>
                            @if ($errors->first('rdo_code'))
                                <p class="mt-1 text-danger">{!! $errors->first('rdo_code') !!}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for=""> RCO Code</label><span style="color: red">*</span>
                            <input type="text" class="form-control" name="rco_code" value="{{ old('rco_code') }}"
                                required>
                            @if ($errors->first('rco_code'))
                                <p class="mt-1 text-danger">{!! $errors->first('rco_code') !!}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fileupload"> File Upload</label><span style="color: red">*</span><small>Click Add More Button to Select Multiple</small>
                            <input type="file" class="form-control-file" id="fileupload" name="files[]"
                                value="{{ old('files') }}" required>
                            <div class="mt-2" id="upload_container"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button class="btn btn-danger text-center" type="button" id="add_more">Add
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="btn-group mt-4">
                            <button class="btn btn-success text-center" type="submit"
                                style="width:160px;height:46px;background-color:#FF9700;border:none">CONTINUE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
