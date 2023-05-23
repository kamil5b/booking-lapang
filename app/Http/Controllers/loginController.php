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
 /*
   
  public static function register(Request $request) 
    {

        if($request->password != $request->pass2){
            return redirect()->to('register');
        }
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns|unique:email',
            'name' => 'required',
            'nim' => 'required',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
    
        $user = User::create($validatedData);

        auth()->login($user);

        return redirect('/products')->with('success', "Account successfully registered.");
    }
  */
    public static function register(RegisterRequest $request) 
    {

        //if($request->password != $request->pass2){
        //    return redirect()->to('register');
        //}

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
    
/*
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nomor_hp' => ['required'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $orang = User::where('nomor_hp', $request->nomor_hp)->first();
            $request->session()->regenerate();
            $request->session()->put('data',$orang);
            
            return redirect()->intended('/');
        }
 
        return back()->with('loginError', 'Login failed');
    }
 */
    public function loginAPI(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
            ]);
        } else{
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
                'name' => 'required|max:255',
                'nomor_hp' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]);
    
            $validatedData['password'] = Hash::make($validatedData['password']);
        
            $user = User::create($validatedData);
            /*
            $orang = orang::where('nomor_hp',$request->nomor_hp)->first();
            if(orang::where('nomor_hp',$request->nomor_hp)->doesntExist()){
                $orang = orang::create([
                    'nama_lengkap' => $request->name,
                    'nomor_hp' => $request->nomor_hp,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'kelamin' => $request->kelamin,
                    'alamat' => $request->alamat
                ]);
            }
            
            karyawan::create([
                'user_id' => $user->id,
                'orang_id' => $orang->id,
                'gaji_pokok' => $request->gaji_pokok
            ]);
            */
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
           ], 401);

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
