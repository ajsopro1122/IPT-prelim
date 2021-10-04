@extends('base')

@section('content')

    <div class="container py-lg-5">
        <div class="col-md-4 offset-4">
            <div class="card">
                <div class="card-header bg-black text-white text-center ">
                    <h3>Create New Item</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/dashboard')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input type="description" name="description" id="description" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="submit">Add Item</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection