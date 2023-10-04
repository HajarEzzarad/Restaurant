<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Resto/cart</title>
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
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
              <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
    @php $total = 0 @endphp
    @if(session('cart'))
    @foreach(session('cart') as $id => $c )
    @php $total += $c['price'] * $c['quantity'] @endphp
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
                    <td data-th="Quantity">
                        <input type="number" value="{{ $c['quantity'] }}" class="form-control quantity" />
                    </td>
                    
                    <td data-th="Subtotal" class="text-center">${{ $c['quantity'] * $c['price']}}</td>
                    <td class="actions" data-th="">
                    <button data-id="{{ $id }}" class="btn btn-info btn-sm update-cart" role="button"><i class="fa fa-refresh"></i></button>
                    <script type="text/javascript">
// this function is for update card
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: 'update-cart',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
    </script>
                    </td>
                    
                    <td class="actions" data-th="">
                    <a href="{{ url('remove-from-cart/'.$id)}}" class="btn btn-danger btn-sm remove-from-cart" role="button" type="submit"><i class="fa fa-trash-o" ></i></a> 
                   
                    </td>
                 
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



   

