@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="card" style="left: 200px;" >
            <div class="card-header" >
             {{ $product->name }}
            </div>
            <div class="card-body">
                <h5>{{ $product->author }}</h5>
                <h5>{{ $product->test }}</h5>
                <p>{{ $product->content }}</p>
              <a href="{{ route('product.index') }}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
</div>
    
@endsection