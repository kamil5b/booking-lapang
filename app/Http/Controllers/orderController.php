<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Lapang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;

class orderController extends Controller
{
    public static function index($id)
    {
        if (!Auth::check()) {
            
            return view('login',['page'=>'products']);
        }
        $pas = Lapang::where('id', $id )->first();
        return view('order', [
            'page'=>'products',
            "id"=>$id,
            "user_id"=>Auth::user()->id,
            "category" => $pas->category,
            "name" => $pas->name,
            "pic"=>$pas->pic
        ]);
    }
    
    public static function index_admin()
    {
        if (!Auth::check()) {
            
            return view('login',['page'=>'products']);
        }
        $pas = Order::all();
        return view('order', [
            'page'=>'products',
            "id"=>$id,
            "user_id"=>Auth::user()->id,
            "category" => $pas->category,
            "name" => $pas->name
        ]);
    }
    public static function jadwalku()
    {
        if (!Auth::check()) {
            
            return redirect('/login');
        }
        $data = [];
        $order = Order::where('orang_id',Auth::user()->id)->get();

        foreach($order as $p){
            $lapang = Lapang::where('id',$p->lapang_id)->first();
            $tmp = [
                'id'=>$p->id,
                'tanggal'=>$p->tanggal,
                'waktu'=>$p->waktu,
                'durasi'=>$p->durasi,
                'lapang'=>$lapang->name
            ];
            array_push($data,$tmp);
        }
        return view('jadwalku', [
            'page'=>'jadwalku',
            "data"=>$data
        ]);
    }

    public static function APIGet($id){
        $data = Order::where('orang_id',$id)->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }
    public static function APIDelete($id){
        Order::destroy($id);
        return response()->json([
            'success' => true
        ],200);
    }
    public static function delete($id){
        Order::destroy($id);
        return redirect('/jadwalku');
    }
    public static function APIadd(Request $request){
        error_log("masuk");
        $add_time = $request->durasi * 60;
        error_log("0");
        $endTime = strtotime("+{$add_time} minutes", strtotime($request->waktu));
        error_log("0");
        $end_time = date('H:i', $endTime);
        
        error_log("0");
        $file = $request->file('image');
        error_log("0");
        error_log($request->hasFile('image'));
        $imageName = time().'.'.$file->extension();
        error_log($imageName);
        $bool_order = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereTime('waktu', '<=', $end_time)->doesntExist();
        error_log('$bool_order :'.$bool_order);
        if($bool_order){
            error_log("11");
            $file->move(public_path('ktm'), $imageName);
            error_log("11");
            error_log($request->orang_id);
            error_log($request->lapang_id);
            error_log($request->tanggal);
            error_log($request->waktu);
            error_log($request->durasi);
            error_log($end_time);
            Order::create([
                'orang_id' => $request->orang_id,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
            
        error_log("success");
            return response()->json([
                'success' => true
            ],200);
        }
        

        $bool_order_1 = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereTime('waktu', '>=', $end_time)->doesntExist();
        error_log('$bool_order_1 :'.$bool_order_1);
        $bool_order_2 = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereDate('waktu', '>=', $request->waktu
            )->whereDate('end_time', '<=', $end_time)->doesntExist();
        
        //$end_time = $request->waktu + $request->durasi * (60 * 60);
        if($bool_order_1 && $bool_order_2){
            error_log("2");
            $file->move(public_path('ktm'), $imageName);
            error_log("2");
            Order::create([
                'orang_id' => $request->orang_id,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
            error_log("success");
            return response()->json([
                'success' => true
            ],200);
        }
        error_log("gagal");
        return response()->json([
            'success' => false
        ],401);
    }
    public static function add_order(Request $request){
        $imageName = time().'.'.$request->ktm->extension();
        $add_time = $request->durasi * 60;
        $endTime = strtotime("+{$add_time} minutes", strtotime($request->waktu));
        $end_time = date('H:i', $endTime);

        $bool_order = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereTime('waktu', '<=', $end_time)->doesntExist();
        error_log('$bool_order :'.$bool_order);
        if($bool_order){
            $request->ktm->move(public_path('ktm'), $imageName);
            Order::create([
                'orang_id' => $request->user_id,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
            return view('receipt',[
                'page' => 'receipt',
                'name' => Auth::user()->name,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
        }
        

        $bool_order_1 = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereTime('waktu', '>=', $end_time)->doesntExist();
        error_log('$bool_order_1 :'.$bool_order_1);
        $bool_order_2 = Order::where(
            'lapang_id',$request->lapang_id
            )->whereDate('tanggal', '=', $request->tanggal
            )->whereDate('waktu', '>=', $request->waktu
            )->whereDate('end_time', '<=', $end_time)->doesntExist();
        
        //$end_time = $request->waktu + $request->durasi * (60 * 60);
        if($bool_order_1 && $bool_order_2){
            $request->ktm->move(public_path('ktm'), $imageName);
            Order::create([
                'orang_id' => $request->user_id,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
            return view('receipt',[
                'page' => 'receipt',
                'name' => Auth::user()->name,
                'lapang_id' => $request->lapang_id,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'durasi'=> $request->durasi,
                'end_time' => $end_time,
                'ktm'=>$imageName
            ]);
        }
        $id = $request->lapang_id;
        // alihkan halaman ke halaman sebelumnya
        return redirect(`/order/$id`);
    }

}
