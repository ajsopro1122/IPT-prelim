@extends('base')

@section('content')


<div class="row mt-2 py-lg-5">
    <div class="col-md-4 offset-4">
        <div class="card">
            <div class="card-header text-center bg-danger text-white">
                <h3>Delete Item</h3>
            </div>
            <div class="card-body">
                <form action="{{url('/dashboard/delete/' . $item->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <h5 class="mt-2 mb-3">Are you sure delete to this item: {{ $item->name }}? </h5>
                    
                    <div class="text-center">
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <a href="{{ url('/dashboard') }}" class="btn btn-info text-white">Cancel</a>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection