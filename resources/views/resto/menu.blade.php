<section class="menu" id="menu">

    <h3 class="sub-heading"> our menu </h3>
    <h1 class="heading"> today's speciality </h1>

    <div class="box-container">
@foreach($menu as $menus)
        <div class="box">
            <div class="image">
                <img src="images/{{$menus->image}}" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3> {{$menus->name}}</h3>
                <p>{{$menus->description}}</p>
        
                <span class="price">${{$menus->price}}</span>
               <p class="btn-holder"><a href="{{ url('add-to-cart/'.$menus->id)}}"  class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
            </div>
        </div>

      @endforeach

    </div>

</section>