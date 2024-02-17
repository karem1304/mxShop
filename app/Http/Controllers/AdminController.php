<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Token;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index()
    {
        return redirect()->route('admin.categories');
    }
    public function profile(){
        return view('Admin.profil');
    }
    public function updateProfile(Request $request){
        $user = User::where('uuid',Auth::user()->uuid)->first();
        $user->update($request->except('_token'));
        return back()->with(['success'=>'Les informations ont été mise à jour avec succès']);
    }
    public function updatePassword(Request $request){
        $user = User::where('uuid',Auth::user()->uuid)->first();
        $verif = Hash::check($request->lastPassword, $user->password);
        if($verif){
            if($request->password == $request->passwordConfirm){
                $user->update([
                    'password'=>Hash::make($request->password)
                ]);
                return back()->with(['success'=>'Le mot de passe a été changé avec succès']);
            }
            else{
                return back()->withErrors('les mot de passes ne correspondent pas');
            }
        }
        return back()->withErrors('l\'ancien mot de passes ne correspond pas');
    }
    public function login()
    {
        return view('Admin.Auth.login');
    }
    public function signIn(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        }
        return back()->withErrors(['errors' => 'L\'email ou le mot de passe est incorrect']);
    }
    public function forgotPassword()
    {
        return view('Admin.Auth.forgotPassword');
    }
    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['error' => 'L\'email n\'existe pas']);
        }
        $token = Str::random(40);
        $expiration = now()->addMinutes(5);
        $token = Token::create([
            'token' => $token,
            'expire_at' => $expiration
        ]);
        Mail::to($user->email)->send(new ForgotPasswordMail($user, $token));
        return redirect()->route('login')->withErrors(['error' => 'un mail de réinitialisation vous a été envoyé et expire dans deux minutes']);
    }
    public function recoverPassword($token, $id)
    {
        $token = Token::where('expire_at', '<', $token)->first();
        $user = User::where('uuid', $id)->first();
        if (!$token) {
            return view('Admin.Auth.recoverPassword', compact($user));
        }
        return redirect()->route('forgotPassword')->withErrors(['error' => 'Le lien a deja expiré']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function products($id)
    {
        $products= Product::whereHas('category',function($query) use($id){ $query->where('uuid',$id);})->get();
        $category = Category::where('uuid',$id)->first();
        return view('Admin.product',compact('products','category','id'));
    }
    public function addProduct($id, Request $request){
        $formData = $request->formData;
        $brand = Brand::where('uuid',$formData['brand_id'])->first();
        $category = Category::where('uuid',$formData['category_id'])->first();
        $formData['uuid']= Str::uuid();
        $formData['brand_id']=$brand->id;
        $formData['category_id']=$category->id;
        $product = Product::create($formData);
        Image::create([
            'name'=>'product01.png',
            'uuid'=>Str::uuid(),
            'product_id'=>$product->id
        ]);
        // if($formData['image']){
        //     $image = $formData['image'];
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('admin/dist/img'),$imageName);
        //     Image::create([
        //         'name'=>$imageName,
        //         'product_id'=>$product->id,
        //         'uuid'=>Str::uuid()
        //     ]);
        // }

        return response()->json($product);
    }
    public function deltProduct($id){
        // dd($id);
        $product = Product::where('uuid',$id)->delete();
        return $product;
    }
    public function editProduct($id){
        $product = Product::where('uuid',$id)->first();
        return response()->json($product);
    }
    public function updateProduct($id,Request $request){
        $product = Product::where('uuid',$id)->first();
        $formData =$request->formData;
        // dd($product);
        $product->update($formData);
        return response()->json($product);
    }
    public function infoProduct($id){
        $product= Product::where('uuid',$id)->first();
        return view('Admin.infoProduct',compact('product'));
    }
    public function upload($id,Request $request){
        $product= Product::where('uuid',$id)->first();
        if($request->hasFile('image')){
            $image= $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('dist/img'),$imageName);
            Image::create([
                'name'=>$imageName,
                'uuid'=>Str::uuid(),
                'product_id'=>$product->id
            ]);
            return back();
        }
        return back();
    }
    public function deleteUpload($id){
        Image::where('uuid',$id)->first()->delete();
        return back();
    }
    // categorie
    public function categories()
    {
        $categories = Category::all();
        return view('Admin.category', compact('categories'));
    }
    public function deleteCategory($id)
    {
        $category = Category::where('uuid', $id)->first();
        Product::where('category_id', $category->id)->delete();
        $category->delete();
        return back();
    }
    public function addCategory(Request $request)
    {
        $data = [
            'name' => $request->name,
            'uuid' => Str::uuid()
        ];
        $category = Category::create($data);
        if ($category) {
            return response()->json(['La categorie a été ajouté']);
        }
        return response()->json(['error' => 'La categorie n\'a pas été ajouté']);
    }
    public function editCategory($id)
    {
        $category = Category::where(['uuid'=>$id])->first();

        if ($category) {
            return response()->json($category);
        }
        return response()->json(['error' => ['messsage'=>'La categorie n\'a pas été trouvé','code'=>500]]);
    }
    public function updateCategory($id,Request $request)
    {
        $category = Category::where(['uuid'=>$id])->first();

        if ($category) {
            $category->update($request->except('_token'));
            return response()->json($category);
        }
        return response()->json(['error' => ['messsage'=>'La categorie n\'a pas été trouvé','code'=>500]]);
    }
    // Fin categorie

    // Marque
    public function brands()
    {
        $brands= Brand::all();
        return view('Admin.brand',compact('brands'));
    }
    public function deleteBrand($id)
    {
        $brand = Brand::where('uuid', $id)->first();
        Product::where('brand_id', $brand->id)->delete();
        $brand->delete();
        return back();
    }
    public function addBrand(Request $request)
    {
        $data = [
            'name' => $request->name,
            'uuid' => Str::uuid()
        ];
        $brand = Brand::create($data);
        if ($brand) {
            return response()->json(['La marque a été ajouté']);
        }
        return response()->json(['error' => 'La marque n\'a pas été ajouté']);
    }
    public function editBrand($id)
    {
        $brand = Brand::where(['uuid'=>$id])->first();

        if ($brand) {
            return response()->json($brand);
        }
        return response()->json(['error' => ['messsage'=>'La marque n\'a pas été trouvé','code'=>500]]);
    }
    public function updateBrand($id,Request $request)
    {
        $brand = Brand::where(['uuid'=>$id])->first();

        if ($brand) {
            $brand->update($request->except('_token'));
            return response()->json($brand);
        }
        return response()->json(['error' => ['messsage'=>'La marque n\'a pas été trouvé','code'=>500]]);
    }
    // fin marque

}