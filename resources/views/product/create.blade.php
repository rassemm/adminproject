@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
                </div>
            </div>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
               <span>Name</span>
               <input type="text" name="name" class="form-control" >
              </div>
             </div>
              
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                   <span>Author</span>
                   <input type="text" name="author" class="form-control" >
                  </div>
                 </div>
                  
                 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                       <span>Test</span>
                       <input type="text" name="test" class="form-control" >
                      </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <strong>Product Image</strong>
                        <input type="file" name="image" class="form-control" placeholder="">
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>
                    
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                           <span>Content</span>
                          <textarea class="form-control" style="height:150px" name="content" id="" cols="30" rows="10"></textarea>                          </div>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </form>
    </div>
</div>
    
@endsection