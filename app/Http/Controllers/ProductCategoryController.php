<?php

namespace App\Http\Controllers;
use App\Models\ProductCateg;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class ProductCategoryController extends Controller
{
    function index(){

        $cat = ProductCateg::all();

        return view('dashboardviews.productcate.index')->with('cat',$cat);

    }
    function insart(){
        return view('dashboardviews.productcate.insart');
    }
    function store(Request $req){
        $req->validate([
            'catname' => 'required | max : 45',
            'catdes'  => 'required | max : 250',
            'catimg'  => 'required | image | mimes:png,jpg'
        ]);
        $img = $req['catimg'];
        $name = $img->getClientOriginalName();
        $name = Str::random(6) . '_' . $name; 
        $img->move('procatimg' ,$name);

        $cat = new ProductCateg;

        $cat->catname = $req['catname'];
        $cat->catdes = $req['catdes'];
        $cat->catimg = $name;

        $cat->save();
        return redirect('/dashboards/productcat');
    }
   
    function edit($id){

        $cat = ProductCateg::find($id);

        if($cat != null){
            return view('dashboardviews.productcate.edit')->with('cat',$cat);
        }
        return redirect('dashboardviews.productcate');
    }
    function update($id,Request $req){
        $cat = ProductCateg::find($id);

        if($cat != null){
            if($req->catimg != null){
                $img = $req['catimg'];
                $name = $img->getClientOriginalName();
                $name = str::random(7) . '_' . $name;
                $img->move('procatimg',$name);
                unlink('procatimg/'.$req->oldimg);

            }else{
                $name = $req->oldimg;
            }
          
            $cat->catname = $req['catname'];
            $cat->catdes = $req['catdes'];
            $cat->catimg = $name;
    
            $cat->save();
            return redirect('/dashboards/productcat');

        }
        return redirect('dashboardviews.productcate');


    }

    function delet($id){
        $cat = ProductCateg::find($id);

        if($cat != null){

            $cat->delete();
            return redirect('/dashboards/productcat');


        }
        return redirect('/dashboards/productcat');



    }
}
