<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{
    function index(){
     $data = DB::select("SELECT * FROM products");
        return view('clientviews.index',compact('data'));
    }
    function details($id){
      $data =   DB::select('select * from products where pid = ?', [$id]);
      if($data != null){

          
          $data = $data[0];
          return view('clientviews.details',compact('data'));
        }
        return redirect('/');

    }
    function addtocart(Product $product){
        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $product->pid => [
                    'title' => $product->ptitle,
                    'pimg' => $product->pimg,
                    'price' => $product->pprice,
                    'quantity' => 1
                ]
                ];
                session()->put('cart',$cart);

                return redirect('/allcart');


        }
        if($cart(isset($product->pid))){

            $cart[$product->pid]['quantity']++;

            session()->put('cart',$cart);

            return redirect('/allcart');
        }
        $cart[$product->pid] = [
            'title' => $product->ptitle,
            'pimg' => $product->pimg,
            'price' => $product->pprice,
            'quantity' => 1
        ];
        
        session()->put('cart',$cart);

        session()->get('cart');

        return redirect('/allcart');

    }

        function allcart(){
            
            $cart = session()->get('cart');
            // print_r($cart);
            return view('clientviews.allcart',compact('cart'));
            
            
        }
   
    function contact(){
        return view('clientviews.contact');

    }

    function register(){
        return view('clientviews.insart');

    }
    function registerstore(Request $req){

        $req->validate([

            'cname' => 'required | max:40',
            'cemail' => 'required | email | max:35',
            'cnumber' => 'required',
            'caddres' => 'required',
            'cpassword' => 'required | max:10'
        ]);
      Db::insert('insert into costomers(cname,cemail,cpassword,ccontact,caddres) values(?,?,?,?,?)',[$req->cname,$req->cemail,$req->cpassword,$req->cnumber,$req->caddres]);

        return redirect('/customers/login');
    }
    function login(){

        return view('clientviews.login');
    }
    function loginout(){

        session()->forget('email');
        session()->forget('role');

        return redirect('/');
    }


    function loginstore(Request $req){

        $req->validate([

            'cemail' => 'required | email | max:35',
            'cpassword' => 'required | max:10'
        ]);
      $data =   Db::select('select * from costomers where cemail = ? and cpassword = ?',[$req->cemail,$req->cpassword]);

      if($data != null){
        session()->put('email',$req->cemail);
        session()->put('role',$data[0]->role);
           

        return redirect('/');
    }
    return redirect('/customers/login');

    }

    function adminlogin(){

        return view('clientviews.admin.login');
    }
    function adminloginstore(Request $req){

        $req->validate([
           
            'email' => 'required | email | max:35',
            'password' => 'required'
        ]);
      $data =   Db::select('select * from users where email = ? and password = ?',[$req->email,md5($req->password)]);

      if($data != null){

        session()->put('email',$req->email);
        session()->put('role',$data[0]->role);
        
        return redirect('/dashboards');
    }
    session()->flash('status','email and password incorrect');

    return redirect('/admin/login');
}

function adminloginout(){
    session()->forget('email');
    session()->forget('role');

    return redirect('/');

}


}
