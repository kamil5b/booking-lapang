<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lapang;
use App\Models\Order;
use App\Models\Feedback;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class adminController extends Controller
{
    public static function index()
    {
        return view('admin.admin-home',["page" => "home"]);
    }

    public static function orders(){
        $data = [];
        $order = Order::all();
        foreach($order as $p){
            $lapang = Lapang::where('id',$p->lapang_id)->first();
            $user = User::where('id',$p->orang_id)->first();
            $tmp = [
                'id'=>$p->id,
                'tanggal'=>$p->tanggal,
                'name'=>$user->name,
                'waktu'=>$p->waktu,
                'durasi'=>$p->durasi,
                'lapang'=>$lapang->name
            ];
            array_push($data,$tmp);
        }
        return view('admin.dashboard', [
            'page'=>'order',
            "headers"=> [
                'ID','Tanggal Sewa','Nama Pembooking','Waktu Sewa','Durasi Sewa','Nama Lapang'
            ],
            'editable' => false,
            'deletable' => true,
            "data"=>$data
        ]);
    }
    public static function lapang(){
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
        return view('admin.dashboard', [
            'page'=>'lapang',
            "headers"=> [
                'ID','Nama Lapang','Kategori'
            ],
            'editable' => true,
            'deletable' => true,
            "data"=>$data
        ]);
    }
    
    public static function users(){
        $data = [];
        $users = User::all();
        foreach($users as $p){
            $tmp = [
                'id'=>$p->id,
                'name'=>$p->name,
                'nim'=>$p->nim,
                'email'=>$p->email,
                'created_at'=>$p->created_at
            ];
            array_push($data,$tmp);
        }
        return view('admin.dashboard', [
            'page'=>'users',
            "headers"=> [
                'ID','Nama','No HP','Email','Joined at'
            ],
            'editable' => false,
            'deletable' => true,
            "data"=>$data
        ]);
    }
    public static function feedbacks(){
        $data = [];
        $fb = Feedback::all();
        foreach($fb as $p){
            $tmp = [
                'id'=>$p->id,
                'feedback'=>$p->feedback,
                'tanggal'=>$p->created_at
            ];
            array_push($data,$tmp);
        }
        return view('admin.dashboard', [
            'page'=>'feedbacks',
            "headers"=> [
                'ID','Feedback','Tanggal'
            ],
            'editable' => false,
            'deletable' => false,
            "data"=>$data
        ]);
    }
}
