<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lapang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

//PRODUCT = LAPANG
class productController extends Controller
{
    public static function index()
    {
        $data = [];
        $lapang = Lapang::all();
        foreach($lapang as $p){
            $tmp = [
                'id'=>$p->id,
                'name'=>$p->name,
                'category'=>$p->category
            ];
            array_push($data,$tmp);
        }
        return view('produk', [
            'page'=>'lapang',
            "data"=>$data
        ]);
    }

    public static function add()
    {
        return view('admin.add-lapang', [
            'page'=>'lapang',
        ]);
    }
    public static function edit($id)
    {
        $lapang = Lapang::where('id',$id)->first();
        return view('admin.edit-lapang', [
            'page'=>'lapang',
            'id'=>$id,
            'name'=>$lapang->name,
            'category'=>$lapang->category
        ]);
    }



    //ACTIONS

    public static function add_lapang(Request $request){
        try
        {
            Lapang::create([
                'name' => $request->name,
                'category' => $request->category
            ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect('/admin/lapang/add');
        }
        
        // alihkan halaman ke halaman sebelumnya
        return redirect('/admin/lapang');
    }

    public static function edit_lapang(Request $request){
        $lapang = Lapang::find($request->id);
        $lapang->name = $request->name;
        $lapang->category = $request->category;
        $lapang->save();
        // alihkan halaman ke halaman sebelumnya
        return redirect('/admin/lapang');
    }
    
    public static function delete($id){
        Lapang::destroy($id);
        return redirect('/admin/lapang');
    }

}
