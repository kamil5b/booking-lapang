<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public static function register(RegisterRequest $request) 
    {

        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/products')->with('success', "Account successfully registered.",);
    }
    
    public static function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::validate($credentials)):
            return redirect()->to('login');
                //->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect('jadwalku');
    }
    
    public function loginAPI(){
        error_log("masuk login");
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            error_log("masuk");
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            error_log("success");
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
            ],200);
        } else{
            
            error_log("gagal");
            return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401
            );
        }
       
    }
    
    public function registerAPI(Request $request){
        if($request->password == $request->password2){
            $validatedData = $request->validate([
                'email' => 'required|email:rfc,dns',
                'name' => 'required',
                'nim' => 'required',
                'password' => 'required|min:8',
                'pass2' => 'required|same:password'
            ]);
    
            $validatedData['password'] = Hash::make($validatedData['password']);
        
            $user = User::create($validatedData);
            $success['token'] = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => $validator->errors(),
           ], 401,200);

    }

    public static function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
    public static function delete($id){
        $email = User::where("id",$id)->first();
        if($email->email != "admin@gmail.com"){
            User::destroy($id);
        }
        return redirect('/');
    }

}
