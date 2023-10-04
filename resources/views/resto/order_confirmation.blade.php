<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    
                    
                    <td data-th="Subtotal" class="text-center">${{ $c['quantity'] * $c['price']}}</td>
                    
                    
                    
                 
                </tr>
                @endforeach
                @endif
      
    </tbody>
   <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total  ${{ $total}} </strong></h3></td>
        </tr>
       
    </tfoot>
 
</table>
</body>
</html>