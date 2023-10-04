<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Resto.</title>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- custom css file link  -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
    
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
              <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
    @php $total = 0 @endphp
    @if(session('fav'))
    @foreach(session('fav') as $id => $c )
   
             <tr data-id="">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="/images/{{$c['image']}}"   width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$c['name']}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{$c['price']}}</td>
                    
                    
                   
                   

                 
                </tr>
                @endforeach
                @endif
      
    </tbody>
   <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total  ${{ $total}} </strong></h3></td>
        </tr>
        <tr>
            
            <td colspan="5" class="text-right">
                <a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a  href="{{ url('thanks')}}"  class="btn btn-success" value="Checkout">Checkout</a>
            </td>
        </tr>
    </tfoot>
 
</table>
</body>
</html>



   

