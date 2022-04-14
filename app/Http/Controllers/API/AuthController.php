<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        return view('auth.register');
        return "auth register";
        $data = $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth:sanctum')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=> $token,
        ];

        return response($response,201);
    }

    public function registerUser(Request $request)
    {
        //return "Register User";
        $data = $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string|min:3|max:12',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $result = $user->save();
        if($result){
            //with = session
            return back()->with(['success','you have registered successfully']);
        }else{
            return back()->with(['fail','Something  wrong']);

        }
        return "Register User";

    }

    public function login(Request $request)
    {
        return view('auth.login');
        //return "auth login";
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);
        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password)){
            return response(['message'=>'Invalid credentials'],401);
        }else{
            $token = $user->createToken('auth:sanctum')->plainTextToken;
            $response = [
                'user'=>$user,
                'token'=> $token,];
                return response($response,200);
        }
    }

    public function loginUser(Request $request){
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string|min:3|max:12',
        ]);
        $user = User::where('email','=',$data['email'])->first();
        if($user){
            if(Hash::check($data['password'], $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'password not matches');
            }

        }else{
            return back()->with('fail', 'this is not registerd');
        }
        return "login user";
    }

    public function logout()
    {
        if(Session::has('loginId')){
            session()->pull('loginId');
            return redirect('login');
        }
    }
    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('pages.dashboard',compact('data'));
    }


}
