@extends('index')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Coba Upload ke Storage local</h4>
                <form action="/testing" method="post" enctype="multipart/form-data" form">
                    @csrf()
                    <div class="form-group">
                        <label for="file">cari file</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>    
            </div>    
        </div>    
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">File Terupload</h4>
                {{-- <div>
                        <a href="/{{Session::get('uploaded') }}">{{ Session::get('uploaded') }}</a>
                </div> --}}
                <div>
                    @php($files = Session::get('path') ?? [])
                    <ul>
                    @foreach ($files as $item)
                        <li><a href="{{ $item }}" target="_blank">{{ $item }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection