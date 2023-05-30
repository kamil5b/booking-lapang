<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lapang;
use App\Models\Feedback;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class otherController extends Controller
{

    public static function feedback(Request $request){
        Feedback::create([
                'feedback' => $request->feedback
        ]);
        // alihkan halaman ke halaman sebelumnya
        return redirect('/contact');
    }

}
