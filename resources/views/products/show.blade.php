@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">Products Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $products->name }}</h5>
        <p class="card-text">Description : {{ $products->drescription }}</p>
        <p class="card-text">Price : {{ $products->price }}</p>
  </div>
       
    </hr>
  
  </div>
</div>

@endsection
