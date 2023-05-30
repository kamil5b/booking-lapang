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
                'category'=>$p->category,
                'pic'=>$p->pic
            ];
            
            array_push($data,$tmp);
        }
        return view('produk', [
            'page'=>'lapang',
            "data"=>$data
        ]);
    }
    
    public static function APIGet(){
        $data = Lapang::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
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
            'category'=>$lapang->category,
            'lat'=>$lapang->lat,
            'lng'=>$lapang->lng
        ]);
    }



    //ACTIONS

    public static function add_lapang(Request $request){
        /*try
        {
            $imageName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('pic'), $imageName);
            Lapang::create([
                'name' => $request->name,
                'category' => $request->category,
                'lat'=> $request->lat,
                'lng'=> $request->lng,
                'pic' => $imageName
            ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect('/admin/lapang/add');
        }*/
        $imageName = time().'.'.$request->pic->extension();
        error_log($request->lng);
            $request->pic->move(public_path('pic'), $imageName);
            Lapang::create([
                'name' => $request->name,
                'category' => $request->category,
                'lat'=> $request->lat,
                'lng'=> $request->lng,
                'pic' => $imageName
            ]);
        // alihkan halaman ke halaman sebelumnya
        return redirect('/admin/lapang');
    }

    public static function edit_lapang(Request $request){
        $lapang = Lapang::find($request->id);
        $lapang->name = $request->name;
        $lapang->category = $request->category;
        $lapang->lat = $request->lat;
        $lapang->lng = $request->lng;
        $lapang->save();
        // alihkan halaman ke halaman sebelumnya
        return redirect('/admin/lapang');
    }
    
    public static function delete($id){
        Lapang::destroy($id);
        return redirect('/admin/lapang');
    }

}
