<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $productSlide=Product::take(6)->latest()->get();
        $laptops=Product::whereHas('category',function($query){$query->where('name','like','%laptop%');})->take(5)->latest()->get();
        $desktops=Product::whereHas('category',function($query){$query->where('name','like','%desktop%');})->take(5)->latest()->get();
        $accessoires=Product::whereHas('category',function($query){$query->where('name','like','%accessoire%');})->take(5)->latest()->get();
        // dd($accessoires);
        return view('index',compact('productSlide','laptops','desktops','accessoires'));
    }
    public function product($id, Request $request){
        $number_min=$request->input('number_min');
        $number_max=$request->input('number_max');
        $brand_id=$request->input('brand');
        // dd([$number_max,$number_min,$brand_id]);
        $products=Product::whereHas('category',function($query) use($id){$query->where('uuid',$id);});
        if($number_max){
            $products = $products->where('price','<',$number_max);
        }
        if($number_min){
            $products = $products->where('price','>',$number_min);
        }
        if($brand_id){
            $products = $products->whereHas('brand',function($query) use($brand_id){$query->where('uuid',$brand_id);});
        }
        $brands = Brand::all();
        $products = $products->get();
        // dd($products);
        return view('product',compact('products','brands','id','number_min','number_max','brand_id'));
    }
    public function info($id){
        $product = Product::where('uuid',$id)->first();
        $products = Product::where('uuid','!=',$id)->where('category_id',$product->category_id)->take(4)->get();

        return view('info',compact('product','products'));
    }
    public function allProduct(Request $request){
        $number_min=$request->input('number_min');
        $number_max=$request->input('number_max');
        $brand_id=$request->input('brand');
        // dd([$number_max,$number_min,$brand_id]);
        $products=new Product();
        if($number_max){
            $products = $products->where('price','<',$number_max);
        }
        if($number_min){
            $products = $products->where('price','>',$number_min);
        }
        if($brand_id){
            $products = $products->whereHas('brand',function($query) use($brand_id){$query->where('uuid',$brand_id);});
        }
        $brands = Brand::all();
        $products = $products->get();
        // dd($products);
        return view('allProduct',compact('products','brands','number_min','number_max','brand_id'));
    }
    public function research(Request $request){
        $key=$request->key;
        $products = Product::where('name','like',"%$request->key%")->orWhere('price','like',"%$key%")->whereHas('brand',function($query) use($key){$query->where('name','like',"%$key%");})->whereHas('category',function($query) use($key){$query->where('name','like',"%$key%");})->whereHas('color',function($query) use($key){$query->where('name','like',"%$key%");})->with('image')->with('brand')->with('category')->get();
        return response()->json($products);
    }
}
