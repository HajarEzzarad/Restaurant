

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
 
@section('content')
  
  <div class="card" style="margin:20px;">
    <div class="card-header">Edit Product</div>
    <div class="card-body">      
    <form action="{{ url('update-cart',$h->id) }}" method="post">
        {!! csrf_field() !!}
        @method('PUT')
          <input type="hidden" name="id" id="id" value="{{$h->id}}" id="id" />
          <label>Image</label></br>
          <img src="/images/{{$h->prd_image}}"   width="100" height="100" class="img-responsive"/>
          <input type="text" name="image" id="name" value="{{$h->prd_name}}" class="form-control"></br>
          <label>Name</label></br>
          <input type="text" name="name" id="name" value="{{$h->prd_name}}" class="form-control"></br>
          <label>Price</label></br>
          <input type="text" name="price" id="address" value="{{$h->prd_price}}" class="form-control"></br>
          <label>Quantity</label></br>
          <input  name="quantity" type="number" value="{{ $h->quantity }}" class="form-control quantity update-cart" /></br>

          <input  type="submit" value="Update" class="btn btn-success"></br>
      </form>
    </div>
  </div>


</body>
</html>
