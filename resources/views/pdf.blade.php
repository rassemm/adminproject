<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title>Product liste</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
<h1 class=" mb-3">Product Liste</h1>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Author</b></td>
        <td><b>Test</b></td> 
        <td><b>Content</b></td>     
      </tr>
      </thead>
      <tbody>
      
          @foreach ($products as $product)
          <tr> 
          <td>
            {{$product->id}}
          </td>
        <td>
          {{$product->name}}
        </td>
        <td>
            {{$product->author}}
        </td>
        <td>
            {{$product->test}}
        </td>
        <td>
            {{$product->content}}
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </body>
</html>