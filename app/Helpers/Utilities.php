<?php

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Product;

function pourcentage($nb1 , $nb2){
    $ecart =$nb1 - $nb2;
    $ecart =abs(($ecart/$nb1) * 100);
    return number_format($ecart,2,'.',' ').' %';
}
function categories(){
    $cat = Category::all();
    return $cat;
}
function calNew($date){
    $date2 = Carbon::create($date);
    $date1 = Carbon::now();

    $cal = $date1->diffInDays($date2);

    if($cal < 30){
        return true;
    } 
    return false;
}
function format($number){
    $form = number_format($number,0,'.',' ');
    return $form.' XAF';
}
function prod3(){
    $products = Product::take(3)->get();
    return $products;
}