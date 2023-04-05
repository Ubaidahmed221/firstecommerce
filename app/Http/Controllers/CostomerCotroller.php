<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostomerCotroller extends Controller
{
    function index(){
        $cut = Db::table('costomers')->get();

        return view('dashboardviews.costomer.costomer',compact('cut'));

    }
    function insart(){

        return view('dashboardviews.costomer.insart');
    }
    
    function store(Request $req){
        $req->validate([
            'cname' => 'required | max:40',
            'cemail' => 'required | email | max:35',
            'cpassword' => 'required |  max:10',
            'cnumber' => 'required',
            'caddres' => 'required'
        ]);
        Db::insert('insert into costomers(cname,cemail,cpassword,ccontact,caddres) values(?,?,?,?,?)',[$req->cname,$req->cemail,$req->cpassword,$req->cnumber,$req->caddres]);

        return redirect('/dashboards/costomer');

    }
    function edit($id){
      $data =   Db::select("select * from costomers where cid = $id");
      $data = $data[0];

      return view('dashboardviews.costomer.edit',compact('data'));
    }
    function update($id,Request $req){
        $cus = Db::select("select * from costomers where cid = $id");

        if($cus != null){
            DB::update("UPDATE `costomers` SET cname = ? , cemail = ?,cpassword = ? ,ccontact = ? , caddres = ? where cid  = ?",[$req->cname,$req->cemail,$req->cpassword,$req->cnumber,$req->caddres,$id]);

            return redirect('/dashboards/costomer');
        }
        return redirect('/dashboards/costomer');


    }
    function delet($id){

       $del = Db::select("select * from costomers where cid = $id");

        if($del != null){
            Db::delete("delete from costomers where cid = $id");

        return redirect('/dashboards/costomer');

        }
        return redirect('/dashboards/costomer');

    }
}
