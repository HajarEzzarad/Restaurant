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
       <section class="order" id="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>
    @if(Route::has('login'))
    @auth
    <form action="{{ url('order_confirmation') }}">
    <h1 class="heading"> your personnal information </h1>
        <div class="inputBox">
       
            <div class="input">
                <span>your name</span>
              
                <input type="text" placeholder="enter your name" value="{{ Auth::user()->name  }}">
              
            </div>
            <div class="input">
                <span>your number</span>
                <input type="number" placeholder="enter your number">
            </div>
        </div>
       
      
        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <h1 class="heading"> your order </h1>
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
        <input type="submit" value="order now" class="btn">

    </form>
@else
<p>please log in or register before order</p>
                        <a href="{{ route('login') }}" class="btn btn-link">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                        @endif
                    @endauth
                </div>
                @endif





</section>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

 



:root{
    --green:#27ae60;
    --black:#192a56;
    --light-color:#666;
    --box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
}

*{
    font-family: 'Nunito', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    text-decoration: none;
    outline: none; border:none;
    text-transform: capitalize;
    transition: all .2s linear;
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 5.5rem;
    scroll-behavior: smooth;
}

section{
    padding:2rem 9%;
}

section:nth-child(even){
    background:#eee;
}

.sub-heading{
    text-align: center;
    color:var(--green);
    font-size: 2rem;
    padding-top: 1rem;
}

.heading{
    text-align: center;
    color:var(--black);
    font-size: 3rem;
    padding-bottom: 2rem;
    text-transform: uppercase;
}

.btn{
    margin-top: 1rem;
    display: inline-block;
    font-size: 1.7rem;
    color:#fff;
    background: var(--black);
    border-radius: .5rem;
    cursor: pointer;
    padding:.8rem 3rem;
}

.btn:hover{
    background: var(--green);
    letter-spacing: .1rem;
}

header{
    position: fixed;
    top:0; left: 0; right:0;
    background: #fff;
    padding:1rem 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
    box-shadow: var(--box-shadow);
}

header .logo{
    color:var(--black);
    font-size: 2.5rem;
    font-weight: bolder;
}

header .logo i{
    color:var(--green);
}

header .navbar a{
    font-size: 1.7rem;
    border-radius: .5rem;
    padding:.5rem 1.5rem;
    color:var(--light-color);
}

header .navbar a.active,
header .navbar a:hover{
    color:#fff;
    background: var(--green);
}

header .icons i,
header .icons a{
    cursor: pointer;
    margin-left: .5rem;
    height:4.5rem;
    line-height: 4.5rem;
    width:4.5rem;
    text-align: center;
    font-size: 1.7rem;
    color:var(--black);
    border-radius: 50%;
    background: #eee;
}

header .icons i:hover,
header .icons a:hover{
    color:#fff;
    background: var(--green);
    transform: rotate(360deg);
}

header .icons #menu-bars{
    display: none;
}

#search-form{
    position: fixed;
    top:-110%; left:0; 
    height:100%; width:100%;
    z-index: 1004;
    background:rgba(0,0,0,.8);
    display: flex;
    align-items: center;
    justify-content: center;
    padding:0 1rem;
}

#search-form.active{
    top:0;
}

#search-form #search-box{
    width:50rem;
    border-bottom: .1rem solid #fff;
    padding:1rem 0;
    color:#fff;
    font-size: 3rem;
    text-transform: none;
    background:none;
}

#search-form #search-box::placeholder{
    color:#eee;
}

#search-form #search-box::-webkit-search-cancel-button{
    -webkit-appearance: none;
}

#search-form label{
    color:#fff;
    cursor:pointer;
    font-size: 3rem;
}

#search-form label:hover{
    color:var(--green);
}

#search-form #close{
    position: absolute;
    color:#fff;
    cursor: pointer;
    top: 2rem; right:3rem;
    font-size: 5rem;
}

.home .home-slider .slide{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:2rem; 
    padding-top: 9rem;
}

.home .home-slider .slide .content{
    flex:1 1 45rem;
}

.home .home-slider .slide .image{
    flex:1 1 45rem;
}

.home .home-slider .slide .image img{
    width: 100%;
}

.home .home-slider .slide .content span{
    color:var(--green);
    font-size: 2.5rem;
}

.home .home-slider .slide .content h3{
    color:var(--black);
    font-size: 7rem;
}

.home .home-slider .slide .content p{
    color:var(--light-color);
    font-size: 2.2rem;
    padding:.5rem 0;
    line-height: 1.5;
}

.swiper-pagination-bullet-active{
    background:var(--green);
}

.dishes .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(28rem, 1fr));
    gap:1.5rem;
}

.dishes .box-container .box{
    padding:2.5rem;
    background:#fff;
    border-radius: .5rem;
    border:.1rem solid rgba(0,0,0,.2);
    box-shadow: var(--box-shadow);
    position: relative;
    overflow: hidden;
    text-align: center;
}

.dishes .box-container .box .fa-heart,
.dishes .box-container .box .fa-eye{
    position: absolute;
    top:1.5rem;
    background:#eee;
    border-radius: 50%;
    height: 5rem;
    width:5rem;
    line-height: 5rem;
    font-size: 2rem;
    color:var(--black);
}

.dishes .box-container .box .fa-heart:hover,
.dishes .box-container .box .fa-eye:hover{
    background: var(--green);
    color:#fff;
}

.dishes .box-container .box .fa-heart{
    right:-15rem;
}

.dishes .box-container .box .fa-eye{
    left:-15rem;
}

.dishes .box-container .box:hover .fa-heart{
    right:1.5rem;
}

.dishes .box-container .box:hover .fa-eye{
    left:1.5rem;
}

.dishes .box-container .box .img{
    height:17rem;
    margin:1rem 0;
}

.dishes .box-container .box h3{
    color:var(--black);
    font-size: 2.5rem;
}

.dishes .box-container .box .stars{
    padding:1rem 0;
}

.dishes .box-container .box .stars i{
    font-size: 1.7rem;
    color:var(--green);
}

.dishes .box-container .box span{
    color:var(--green);
    font-weight: bolder;
    margin-right: 1rem;
    font-size: 2.5rem;
}

.about .row{
    display: flex;
    flex-wrap: wrap;
    gap:1.5rem;
    align-items: center;
}

.about .row .image{
    flex:1 1 45rem;
}

.about .row .image img{ 
    width: 100%;
}

.about .row .content{
    flex:1 1 45rem;
}

.about .row .content h3{
    color:var(--black);
    font-size: 4rem;
    padding:.5rem 0;
}

.about .row .content p{
    color:var(--light-color);
    font-size: 1.5rem;
    padding:.5rem 0;
    line-height: 2;
}

.about .row .content .icons-container{
    display: flex;
    gap:1rem;
    flex-wrap: wrap;
    padding:1rem 0;
    margin-top: .5rem;
}

.about .row .content .icons-container .icons{
    background:#eee;
    border-radius: .5rem;
    border:.1rem solid rgba(0,0,0,.2);
    display: flex;
    align-items: center;
    justify-content: center;
    gap:1rem;
    flex:1 1 17rem;
    padding:1.5rem 1rem;
}

.about .row .content .icons-container .icons i{
    font-size: 2.5rem;
    color:var(--green);
}

.about .row .content .icons-container .icons span{
    font-size: 1.5rem;
    color:var(--black);
}

.menu .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
}

.menu .box-container .box{
    background: #fff;
    border:.1rem solid rgba(0,0,0,.2);
    border-radius: .5rem;
    box-shadow: var(--box-shadow);    
}

.menu .box-container .box .image{
    height: 25rem;
    width: 100%;
    padding:1.5rem;
    overflow: hidden;
    position: relative;
}

.menu .box-container .box .image img{
    height: 100%;
    width: 100%;
    border-radius: .5rem;
    object-fit: cover;
}

.menu .box-container .box .image .fa-heart{
    position: absolute;
    top:2.5rem; right: 2.5rem;
    height: 5rem;
    width: 5rem;
    line-height: 5rem;
    text-align: center;
    font-size: 2rem;
    background: #fff;
    border-radius: 50%;
    color:var(--black);
}

.menu .box-container .box .image .fa-heart:hover{
    background-color: var(--green);
    color:#fff;
}

.menu .box-container .box .content{
    padding:2rem;
    padding-top: 0;
}

.menu .box-container .box .content .stars{
    padding-bottom: 1rem;
}

.menu .box-container .box .content .stars i{
   font-size: 1.7rem;
   color:var(--green);
}

.menu .box-container .box .content h3{
    color:var(--black);
    font-size: 2.5rem;
}

.menu .box-container .box .content p{
    color:var(--light-color);
    font-size: 1.6rem;
    padding:.5rem 0;
    line-height: 1.5;
}

.menu .box-container .box .content .price{
    color:var(--green);
    margin-left: 1rem;
    font-size: 2.5rem;
}

.review .slide{
    padding:2rem;
    box-shadow:var(--box-shadow);
    border:.1rem solid rgba(0,0,0,.2);
    border-radius: .5rem;
    position: relative;    
}

.review .slide .fa-quote-right{
    position: absolute;
    top:2rem; right:2rem;
    font-size: 6rem;
    color:#ccc;
}

.review .slide .user{
    display: flex;
    gap:1.5rem;
    align-items: center;
    padding-bottom: 1.5rem;
}

.review .slide .user img{
    height: 7rem;
    width: 7rem;
    border-radius: 50%;
    object-fit: cover;
}

.review .slide .user h3{
    color:var(--black);
    font-size: 2rem;
    padding-bottom: .5rem;
}

.review .slide .user i{
    font-size: 1.3rem;
    color:var(--green);
}

.review .slide p{
    font-size: 1.5rem;
    line-height: 1.8;
    color:var(--light-color);
}

.order form{
    max-width:90rem;
    border-radius: .5rem;
    box-shadow: var(--box-shadow);
    border:.1rem solid rgba(0,0,0,.2);
    background:#fff;
    padding:1.5rem;
    margin:0 auto;
}

.order form .inputBox{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.order form .inputBox .input{
    width:49%;
}

.order form .inputBox .input span{
    display:block;
    padding:.5rem 0;
    font-size: 1.5rem;
    color:var(--light-color);
}

.order form .inputBox .input input,
.order form .inputBox .input textarea{
    background:#eee;
    border-radius: .5rem;
    padding:1rem;
    font-size: 1.6rem;
    color:var(--black);
    text-transform: none;
    margin-bottom: 1rem;
    width:100%;
}

.order form .inputBox .input input:focus,
.order form .inputBox .input textarea:focus{
    border:.1rem solid var(--green);
}

.order form .inputBox .input textarea{
    height:20rem;
    resize: none;
}

.order form .btn{
    margin-top: 0;
}

.footer .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
    gap:1.5rem;
}

.footer .box-container .box h3{
    padding:.5rem 0;
    font-size: 2.5rem;
    color:var(--black);
}

.footer .box-container .box a{
    display: block;
    padding:.5rem 0;
    font-size: 1.5rem;
    color:var(--light-color);
}

.footer .box-container .box a:hover{
    color:var(--green);
    text-decoration: underline;
}

.footer .credit{
    text-align: center;
    border-top: .1rem solid rgba(0,0,0,.1);
    font-size: 2rem;
    color:var(--black);
    padding:.5rem;
    padding-top: 1.5rem;
    margin-top: 1.5rem;
}

.footer .credit span{
    color:var(--green);
}

.loader-container{
    position: fixed;
    top:0; left:0;
    height:100%; 
    width:100%;
    z-index: 10000;
    background:#fff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.loader-container img{
    width:35rem;
}

.loader-container.fade-out{
    top:-110%;
    opacity:0;
}


































/* media queries  */

@media (max-width:991px){

    html{
        font-size: 55%;
    }
    
    header{
        padding:1rem 2rem;
    }

    section{
        padding:2rem;
    }


}

@media (max-width:768px){

    header .icons #menu-bars{
        display: inline-block;
    }

    header .navbar{
        position: absolute;
        top:100%; left:0; right:0;
        background:#fff;
        border-top: .1rem solid rgba(0,0,0,.2);
        border-bottom: .1rem solid rgba(0,0,0,.2);
        padding:1rem;
        clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
    }

    header .navbar.active{
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
    }

    header .navbar a{
        display: block;
        padding:1.5rem;
        margin:1rem;
        font-size: 2rem;
        background:#eee;
    }

    #search-form #search-box{
        width:90%;
        margin:0 1rem;
    }

    .home .home-slider .slide .content h3{
        font-size: 5rem;
    }

}

@media (max-width:450px){

    html{
        font-size: 50%;
    }

    .dishes .box-container .box img{
        height:auto;
        width: 100%;
    }

    .order form .inputBox .input{
        width:100%;
    }

}

</style>
</body>
</html>
