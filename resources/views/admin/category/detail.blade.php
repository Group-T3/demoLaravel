@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">Category Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"><span class=""
                                                                     style="font-size: 24px; margin-left: 8px; color: #012970;">{{$category->name}}</span>
                            </h5>
                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="post"
                                  action="{{route('admin.update.category', ['id'=> $category->id])}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">Category name: </label>
                                    <input name="name" type="text" class="form-control" id="inputName"
                                           value="{{$category->name}}" placeholder="TV Samsung 4k 64 inch" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select class="form-control" id="inputStatus" name="status">
                                        @if($category->status == "ACTIVE")
                                            <option value="{{$category->status}}">{{$category->status}}</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                            <option value="DELETE">DELETE</option>
                                        @elseif($category->status == "DEACTIVE")
                                            <option value="{{$category->status}}">{{$category->status}}</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DELETE">DELETE</option>
                                        @else
                                            <option value="{{$category->status}}">{{$category->status}}</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DEACTIVE">DEACTIVE</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputDescription" class="form-label">Description</label>
                                    <input name="desc" type="text" class="form-control" id="inputDescription"
                                           placeholder="1234 Main St" value="{{$category->desc}}" required="">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->
                            <div>
                                <h5 class="text-danger" style="margin: 8px 0">If you want to delete this product?
                                    Please click the button below to delete!</h5>
                            </div>
                            <form method="POST" action="{{route('admin.hiden.category', ['id' => $category->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
