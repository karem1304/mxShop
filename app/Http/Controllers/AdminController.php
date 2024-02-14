<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index(){
        return view('Admin.index');
    }
    public function login(){
        return view('Admin.Auth.login');
    }
    public function signIn(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['errors'=>'L\'email ou le mot de passe est incorrect']);
    }
    public function forgotPassword(){
        return view('Admin.Auth.forgotPassword');
    }
    public function resetPassword(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return back()->withErrors(['error'=>'L\'email n\'existe pas']);
        }
        $token=Str::random(40);
        $expiration = now()->addMinutes(5);
        $token=Token::create([
            'token'=>$token,
            'expire_at'=> $expiration
        ]);
        Mail::to($user->email)->send(new ForgotPasswordMail($user,$token));
        return redirect()->route('login')->withErrors(['error'=>'un mail de réinitialisation vous a été envoyé et expire dans deux minutes']);
    }
    public function recoverPassword($token,$id){
        $token = Token::where('expire_at','<',$token)->first();
        $user = User::where('uuid',$id)->first();
        if(!$token){
            return view('Admin.Auth.recoverPassword',compact($user));
        }
        return redirect()->route('forgotPassword')->withErrors(['error'=>'Le lien a deja expiré']);

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function products(){
        return view('Admin.product');
    }
    public function categories(){
        $categories=Category::all();
        return view('Admin.category',compact('categories'));
    }
    public function deleteCategory($id){
        $category=Category::where('uuid',$id)->first();
        Product::where('category_id',$category->id)->delete();
        $category->delete();
        return back();
    }
    public function brands(){
        return view('Admin.brand');
    }
}

