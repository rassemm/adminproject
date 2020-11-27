@extends('admin.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    @auth
                        
                    
                    <div class="pull-right">
                        <h2>Product Managment</h2>
                        <div class="card" style="left:700px;">
                            <div class="pull-left">
                                <div class="" style="left: 200px;">
                                    <form action="{{ route('product.index') }}" method="GET" role="search">
                    
                                        <div class="input-group pull-left" >
                                            <span class="input-group-btn mr-5 mt-1">
                                                <button class="btn btn-info" type="submit" title="Search projects">
                                                    <span ><i class="fa fa-search" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                                            <a href="{{ route('product.index') }}" class=" mt-1">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                                        <span ><i class="fa fa-cog" aria-hidden="true"></i></span>
                                                    </button>
                                                </span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <div class="">
                        <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
                    </div>
                    <div class="card" style="left:350px;">
                        <a href="{{action('ProductController@downloadPDF')}}" class="btn btn-dark">Download PDF</a>
                    </div>
                    
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                    </div>
                  <div class="col-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col"> Name</th>
                          <th scope="col">Author</th>
                          <th scope="col">Test</th>
                          <th scope="col">Content</th>
                          <th scope="col">Create at</th>
                          <th scope="col">image</th>
                          <th scope="col" style="width: 350px">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $product)
                              
                          
                        <tr>
                          <th scope="row">{{ $product->id }}</th>
                          <td>{{ $product->name}}</td>
                          <td>{{ $product->author}}</td>
                          <td>{{ $product->test}}</td>
                          <td>{{ $product->content }}</td>
                          <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                          <td><img src="{{ URL::to('/') }}/images/{{ $product->image }}" class="img-thumbnail" width="75" /></td>                          @if (auth()->user()->hasRole('super_admin'))
                          <td>
                            {{-- <a href="{{action('ProductController@downloadPDF', $product->id)}}">Download PDF</a> --}}
                            
                          <form action="{{ route('product.destroy',$product->id) }}"method="POST">

                    @csrf
                    @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                <a href="{{route('product.show',$product->id) }}">  <button type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></i> </button></a>
                                <a href="{{route('product.edit',$product->id) }}">  <button type="button" class="btn btn-success"><i class="fa fa-edit" style="font-size:15px"></i> </button></a>
                        </form>
                          </button>
                          </td> 
                          @endif
                        
                        </tr>
                        
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @endauth
        </div>
    </div>

@endsection