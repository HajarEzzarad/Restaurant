<section class="home" id="home">

<div class="swiper-container home-slider">

    <div class="swiper-wrapper wrapper">
 
    @foreach($home as $homes)
                <div class="swiper-slide slide">
            <div class="content">
               
                <h3>{{$homes->name}}</h3>
                <p>{{$homes->description}}</p>
                <a href="#" class="btn">order now</a>
            </div>
            <div class="image">
           <img src="/images/{{$homes->image}}" >
            </div>
        </div>
    @endforeach
       
      

    </div>

    <div class="swiper-pagination"></div>

</div>

</section>