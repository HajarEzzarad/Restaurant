<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Resto;
use App\Models\User;

use App\Http\Controllers\Mail;

class RestoController extends Controller
{
    //
    public function show(){
        $home = DB::select('select * from _resto where type= "home"');
        $popular = DB::select('select * from _resto where type= "dish"');
        $menu=DB::select('select * from _resto where type= "menu"');
    
        return view('resto.index',['home'=>$home,'popular'=>$popular,'menu'=>$menu]);
    }


    public function index(){
        return view('auth.login');
    }
    public function register_view(){
        return view('auth.register');
    }

    public function home(){
        return view('resto.index');
    }
    
  //LOGIN   
    public function logout(){
       \Session::flush();
       \Auth::logout();
       return redirect('');
    }
    
    

public function register(Request $request){
//validate data
$request->validate([
    'name'=>'required',
    'email'=>'required|unique:users|email',
    'password'=>'required|confirmed'
]);
// save in users table
User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>\Hash::make($request->password)
]);
//login user here
if(\Auth::attempt($request->only('email','password'))){
    return redirect('home');
}
return redirect('register')->withErrors('Error');

}


    public function login(Request $request){
        //validate data
       $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        //login code
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }
        return redirect('login')->withErrors('Login Details are not valid');
    }


//cart

public function cart(){
    return view('resto.cart');
}
public function fav(){
    return view('resto.fav');
}
////
public function addToFav($id){
    $product =Resto::find($id);
if(!$product){
    abort(404);
}
$fav =session()->get('fav');
// if cart is empty
if(!$fav){
    $fav=[
        $id =>[
        "name"=>$product->name,
    "image"=>$product->image,
    "price"=>$product->price,
        ]
    ]; 
    session()->put('fav',$fav);
    return redirect()->back()->with('message','product added succefully');
}
}
/////
public function addToCart($id){
$product =Resto::find($id);
if(!$product){
    abort(404);
}



$cart =session()->get('cart');
// if cart is empty
if(!$cart){
    $cart=[
        $id =>[
        "name"=>$product->name,
    "image"=>$product->image,
    "price"=>$product->price,
    "quantity"=>1,
        ]
    ]; 
    session()->put('cart',$cart);
    return redirect()->back()->with('message','product added succefully');
}
if(isset($cart[$id])){
    $cart[$id]['quantity']++;
    session()->put('cart',$cart);
    return redirect()->back()->with('message','product added succefully');
}
$cart[$id]=[
    "name"=>$product->name,
"image"=>$product->image,
"price"=>$product->price,
"quantity"=>1,
];
session()->put('cart',$cart);
return redirect()->back()->with('message','product added succefully');
}


public function update(Request  $request){
    if($request->id and $request->quantity){
        $cart =session()->get('cart');
        $cart[$request->id]["quantity"]= $request->quantity;
        session()->put('cart',$cart);
        session()->flash('success','Cart updated successfully');
    }
    
}

public function remove($id){
    if($id){
        $cart=session()->get('cart');
        if(isset($cart[$id])){
unset($cart[$id]);
session()->put('cart',$cart);
        }
        session()->flash('success','Cart updated successfully');
    }
    return redirect()->back()->with('message','product added succefully');
}


public function order(){
    return view('resto.ordernow');
}


public function sendEmail(Request $request){
    \Mail::send(
        'shop.order_confirmation',
        ['user' => $request->name ],
        function($message) use ($request){
            $message->to($request->email);
            $message->subject($request->name, "Your order confirmation");
        }
    );
}
}