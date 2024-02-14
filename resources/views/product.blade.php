@extends('Layouts.body')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Accueil Page</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('index') }}">Accueil</a></li>
                    @php
                        $name= App\Models\Category::where('uuid',$id)->first();
                    @endphp
                    <li>liste des {{ $name->name }}</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <form action="{{ route('product',[$id]) }}" method="get">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min1" type="number" name="number_min" @if($number_min) value="{{ $number_min }}" @else value="1000" @endif>
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max1" type="number" name="number_max" @if($number_max) value="{{ $number_max }}" @else value="50000000" @endif>
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
    
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                @foreach ($brands as $brand)
                                    @php
                                        $numberProduct = App\Models\Product::whereHas('category',function($query) use($id){$query->where('uuid',$id);})->where('brand_id', $brand->id)->count();
                                    @endphp
                                    @if ($numberProduct > 0)
                                        <div class="input-checkbox">
                                            <input type="radio" id="{{ $brand->uuid }}" name="brand" value="{{ $brand->uuid }}" @if($brand_id) @if($brand_id == $brand->uuid) checked @endif @endif>
                                            <label for="{{ $brand->uuid }}">
                                                <span></span>
                                                {{ $brand->name }}
                                                <small>({{ $numberProduct }})</small>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <button type="submit" class="btn btn-danger col-lg-12" style="margin-bottom: 1.5rem;margin-top: 1.5rem;"> <i class="fa fa-search"></i> Rechercher</button>
                    </form>

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        @foreach (prod3() as $product)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('dist/img/'.$product->images()->first()->name) }}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name }}</p>
                                <h3 class="product-name"><a href="{{ route('info',[$product->uuid]) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ format($product->price) }} <del class="product-old-price">{{ format($product->firstPrice) }}</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->                            
                        @endforeach
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach ($products as $prod)
                            <div class="col-md-4 col-xs-6">
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ 'dist/img/' . $prod->images()->first()->name . '' }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">{{ pourcentage($prod->firstPrice, $prod->price) }}</span>
                                            @if (calNew($prod->created_at))
                                                <span class="new"> New </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $prod->category->name }}</p>
                                        <h3 class="product-name"><a href="{{ route('info',[$prod->uuid]) }}">{{ $prod->name }}</a></h3>
                                        <h4 class="product-price">{{ format($prod->price) }} <del
                                                class="product-old-price">{{ format($prod->firstPrice) }}</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="quick-view"><i class="fa fa-shopping-cart"></i><span
                                                    class="tooltipp">Ajouter au panier</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir
                                                    plus</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"> <i class="fa fa-whatsapp"></i> <a
                                                href="https://api.whatsapp.com/send?phone=+237658284420&text={{ $prod->description }}">
                                                COMMMANDEZ</a></button>
                                    </div>
                                </div>
                                <!-- /product -->
                            </div>
                        @endforeach
                        <!-- /product -->
                    </div>
                    <!-- /store products -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
