@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Deleted Items</h2>
            
          </div>
        </div>
        <div class="card-body">

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
                    <form method="POST" action="{{ url('/products' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                   <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;This item will be deleted permanently, are you sure?&quot;)">
                       <i class="fa fa-trash-o" aria-hidden="true"></i> Delete Permanently
                     </button>
                    </form>

                    <form method="POST" action="{{ url('/products/restore/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}
                      <button type="submit" class="btn btn-success btn-sm" title="Restore Product" onclick="return confirm(&quot;This item will be restored, are you sure?&quot;)">
                          <i class="fa fa-undo" aria-hidden="true"></i> Restore
                          </button>
                    </form>



                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>


        </div>
      </div>
    </div>
  </div>
</div>



@endsection
