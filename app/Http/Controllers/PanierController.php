<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    //
    private $panierTemporaire = [];
    public function ajout(Request $request){
        // dd($request->key);
        $nouvelArticle = Product::where('uuid',$request->key)->with('image')->with('category')->with('brand')->first();
        $key=$request->key;
        $cart = $request->session()->get('cart',[]);
        if(array_key_exists($key, $cart)){
            $cart[$key]['quantity']++;
        }else{
            $cart[$key]=[
                'product'=>$nouvelArticle,
                'quantity'=>1
            ];
        }
        $request->session()->put('cart',$cart);

        return response()->json(['message'=>'Article ajouté au panier','data'=>$cart]);
    }

    public function afficherPanier(Request $request){
        $cart = $request->session()->get('cart',[]);
        return response()->json(['cart'=>$cart]);
    }
    public function removeProductFromCart(Request $request,$id){
        $cart = $request->session()->get('cart',[]);
        // $key=$request->key;
        // dd($id);
        if(array_key_exists($id, $cart)){
            unset($cart[$id]);
        }
        $request->session()->put('cart',$cart);
        return response()->json(['message'=>'Produit retiré','data'=>$cart]);
    }
    public function checkout(Request $request){
        $cart = $request->session()->get('cart',[]);
        // dd($cart);
        return view('checkout',compact('cart'));
    }
}
