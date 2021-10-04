@extends('base')

@section('content')

<style>
  body{
    background-image:url('eco.jpg');
    background-repeat: no-repeat;
    background-size: 100%;
  }
</style>

  <div class="container py-lg-5">
    <div class="mt-2" style="float: right; ">
      <a href="{{url('dashboard/new')}}" class="btn btn-success" style="float:right;">Add Item</a>
    </div>
    <h1 class="text-white text-center">List of Items</h1>
      
        <table class="table table-borderless table-dark text-center">
            <thead class="theadstyle">
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($items as $item)
        
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td class="text-center" style="width: 150px;">
                        <a href="{{ url('dashboard/edit/' . $item->id) }}" class="btn btn-primary btn-sm d-inline">Edit</a>
                        <a href="{{ url('dashboard/delete/' . $item->id) }}" class="btn btn-danger btn-sm" type="submit">Delete</a>
                    </td>
                </tr>
        
                @endforeach
            </tbody>
        </table> 
  </div>

    
@endsection

