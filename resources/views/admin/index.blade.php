@extends('admin.layout.home')
@section('content')
<div id="contact" class="container">
    <h1 class="text-center" style="margin-top: 100px">Image Upload</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>

        <img src="{{ asset('images/'.Session::get('image')) }}" />
    @endif

    <form method="post" action="{{route('image.upload')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <input class="form-control" name="image" type="file">
        </div>
        <br>
        <button type="submit">Upload</button>
    </form>

</div>
@endsection
