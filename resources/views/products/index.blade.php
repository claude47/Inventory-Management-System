@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Product List</h2>
            <a href="{{ url('/admin/users') }}" class="btn btn-primary btn-sm" title="Show Users">Show Users</a>
          </div>
        </div>
        <div class="card-body">
          <a href="{{ url('/products/create') }}" class="btn btn-success btn-sm mb-3" title="Add New Product">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                      <a href="{{ url('/products/' . $item->id) }}" title="View Product">
                        <button class="btn btn-info btn-sm">
                          <i class="fa fa-eye" aria-hidden="true"></i> View
                        </button>
                      </a>
                      <a href="{{ url('/products/' . $item->id . '/edit') }}" title="Edit Product">
                        <button class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                        </button>
                      </a>
                      <form method="POST" action="{{ url('/products' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)">
                          <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="text-right mt-3">
            <a href="{{ url('/admin/deleted') }}" class="text-underline">View deleted items</a>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>



@endsection
