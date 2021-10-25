@extends('components.mainlayout')

@section('content')
    <div class="row">
        <div class="col">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('frontend.portal.create') }}">
                        <button type="button" class="btn btn-primary" style="float: right;">Upload</button>
                    </a>
                </div>
            </div>
            <table class="table table-bordered table-condensed table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th scope="col">RDO Code</th>
                        <th scope="col">RCO Code</th>
                        <th scope="col">File Name</th>
                        <th scope="col">File Path</th>
                        <th scope="col">Date Uploaded</th>
                        {{-- <th scope="col">Test</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataa as $index => $value)
                        <tr>
                            <td>
                                <div class="mb5 text-center">
                                    {{ $value->id }}
                                </div>
                            </td>
                            <td>
                                <div class="mb5">
                                    {{ $value->rdo_code }}
                                </div>
                            </td>
                            <td>
                                <div class="mb5">
                                    {{ $value->rco_code }}
                                </div>
                            </td>
                            <td>
                                @if ($value->uploads)
                                    <ul>
                                        @foreach ($value->uploads as $ind => $val)
                                            <div style="font-size: 13px;">
                                                <li> {{ $val->filename }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                @else
                                    <div style="font-size: 13px;">
                                        {{ '-' }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($value->uploads)
                                    <ul>
                                        @foreach ($value->uploads as $ind => $val)
                                            <div style="font-size: 13px;">
                                                <li> {{ $val->path }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                @else
                                    <div style="font-size: 13px;">
                                        {{ '-' }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="mb5">
                                    {{ $value->created_at }}
                                </div>
                            </td>
                            {{-- <td>
                                @if (json_decode($value->path))
                                    <ul>
                                        @foreach (json_decode($value->path) as $ind => $val)
                                            <div style="font-size: 13px;">
                                                <li> {{ $val }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                @else
                                    <div style="font-size: 13px;">
                                        {{ '-' }}
                                    </div>
                                @endif
                            </td> --}}
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="{{ route('frontend.portal.edit', [$value->id]) }}">Update</a>
                                        <a class="dropdown-item"
                                            href="{{ route('frontend.portal.destroy', [$value->id]) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <p>No record found yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($dataa->total() > 0)
            <nav class="mt-2">
                <p>Showing <strong>{{ $dataa->firstItem() }}</strong> to
                    <strong>{{ $dataa->lastItem() }}</strong> of
                    <strong>{{ $dataa->total() }}</strong>
                    entries
                </p>
                {!! $dataa->appends(request()->query())->render() !!}
                </ul>
            </nav>
        @endif
    </div>
    </div>
@endsection
