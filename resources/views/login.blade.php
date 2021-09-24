@extends('base')


@section('content')


<div class="py-5 container">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="title text-center">User Login</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/login')}}" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary " type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop