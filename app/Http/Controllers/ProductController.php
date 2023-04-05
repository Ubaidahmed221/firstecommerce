<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCateg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;


class ProductController extends Controller
{
    //
    function index(){

        // $cat = Product::all();
        $cat = DB::select("SELECT * from products INNER JOIN product_categs on products.catid = product_categs.catid;");

        return view('dashboardviews.product.index')->with('cat',$cat);

    }

    function insart(){
        
        $cat = ProductCateg::all();

        return view('dashboardviews.product.insart',compact('cat'));

    }

    function store(Request $req){

        $req->validate([
            'pname' => 'required | max : 45',
            'pdes'  => 'required | max : 250',
            'pprice' => 'required',
            'cat' => 'required',
            'pimg'  => 'required | image | mimes:png,jpg'
        ]);
        $img = $req['pimg'];
        $name = $img->getClientOriginalName();
        $name = Str::random(6) . '_' . $name; 
        $img->move('productimg' ,$name);

        $pro = new Product();

        $pro->ptitle = $req['pname'];
        $pro->pdes = $req['pdes'];
        $pro->pprice = $req['pprice'];
        $pro->catid = $req['cat'];
        $pro->pimg = $name;

        $pro->save();
        return redirect('/dashboards/product');

    }
   
    function edit($id){

        $por = Product::find($id);
        $pcat = ProductCateg::all();


        if($por != null){
            return view('dashboardviews.product.edit',compact('por','pcat'));
        }
        return redirect('dashboardviews/product');
        
    }

    function update($id,Request $req){

        $cats = Product::find($id);

        if($cats != null){

            if($req->pimg != null){
                $img = $req['pimg'];
                $name = $img->getClientOriginalName();
                $name = str::random(7) . '_' . $name;
                $img->move('productimg',$name);
                unlink('productimg/'.$req->oldimg);

            }else{

                $name = $req->oldimg;

            }
          
            $cats->ptitle = $req['pname'];
            $cats->pdes = $req['pdes'];
            $cats->pprice = $req['pprice'];
            $cats->catid = $req['cat'];
            $cats->pimg = $name;
    
            $cats->save();

            return redirect('/dashboards/product');

        }
        return redirect('/dashboards/product');

    }

    function delet($id){
        $pro = Product::find($id);

        if($pro != null){

            $pro->delete();
            return redirect('/dashboards/product');
        }
        return redirect('/dashboards/product');
    }

    function trash(){

        $cat = Product::onlyTrashed()->get();

        return view('dashboardviews.product.trash',compact('cat'));

    }
    function restore($id){
        $cat = Product::onlyTrashed()->find($id);

        if($cat != null){

            $cat->restore();
            return redirect('/dashboards/product/trash');
        }
        return redirect('/dashboards/product/trash');


    }

    function forcedelect($id){
     $cats =  Product::onlyTrashed()->find($id);

    if($cats != null){
        $cats->forceDelete();
        return redirect('/dashboards/product/trash');
        
    }
    return redirect('/dashboards/product/trash');


    }
}
?>


