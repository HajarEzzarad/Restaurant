<section class="dishes" id="dishes">
<h3 class="sub-heading"> our dishes </h3>
    <h1 class="heading"> popular dishes </h1>
    <div class="box-container">
  @foreach($popular as $p)
        <div class="box">
            <a href="{{ url('add-to-fav/'.$p->id)}}" class="fas fa-heart"></a>
            <img class="img" src="/images/{{$p->image}}" alt="">
            <h3>{{$p->name}}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>{{$p->price}}</span>
            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$p->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
          
          
        </div>
    @endforeach
    </div>
   
</section>