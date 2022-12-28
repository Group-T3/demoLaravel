
@extends('admin.layout.home')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Delete Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Browser Default</h5>
                            <p>If you perform a product deletion, it will be removed from the product list!
                                This action cannot be undone...You need to think carefully before doing this!!!</p>

{{--                            <form class="row g-3" action="{{route('admin.delete.product', ['id'=> 'id'])}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="validation" class="form-label">ID: </label>--}}
{{--                                    <input name="id" type="number" class="form-control" id="id" required="" placeholder="1">--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <button class="btn btn-danger" type="submit">Delete</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection