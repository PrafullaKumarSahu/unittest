@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                <form action="{{ route('carousels.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="src" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <div class="input-group">
                            <span class="input-group-addon">http://</span>
                            <input type="text" name="link" id="link" class="form-control" placeholder="www.example.com" value="{{ old('link') }}">
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('carousels.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
