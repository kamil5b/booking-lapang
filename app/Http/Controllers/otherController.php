<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lapang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class otherController extends Controller
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
            'page'=>'products',
            "data"=>$data
        ]);
    }


    public static function feedback(Request $request){
        Lapang::create([
                'feedback' => $request->feedback
            ]);
        // alihkan halaman ke halaman sebelumnya
        return redirect('/contact');
    }

}
