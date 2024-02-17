@extends('Layouts.body')

@section('content')
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Accueil Page</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('index') }}">Accueil</a></li>
                        <li><a href="{{ route('product', [$product->category->uuid]) }}">liste des
                                {{ $product->category->name }}</a></li>
                        <li>Produit - {{ $product->name }}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        {{-- <div id="product-main-img"> --}}
                            @foreach ($product->images()->get() as $image)
                                <div class="product-preview">
                                    <img src="{{ asset('dist/img/' . $image->name) }}" alt="">
                                </div>
                            @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach ($product->images()->get() as $image)
                            <div class="product-preview">
                                <img src="{{ asset('dist/img/' . $image->name) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="product-price">{{ format($product->price) }} <del
                                    class="product-old-price">{{ format($product->firstPrice) }}</del></h3>
                            <span class="product-available">En Stocke</span>
                        </div>
                        <p>{{ $product->description }}.</p>
                        <ul class="product-links">
                            <li>Categorie:</li>
                            <li><a
                                    href="{{ route('product', [$product->category->uuid]) }}">{{ $product->category->name }}</a>
                            </li>
                        </ul>
                        <br>
                        <button class="btn btn-success col-lg-12"><a
                                href="https://api.whatsapp.com/send?phone=+237658284420&text={{ $product->description }}"
                                class="h4"><i class="fa fa-whatsapp "></i> Commandez via whatsapp</a></button>
                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p>{{ $product->description }}.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                @foreach ($products as $prod)
                <div class="col-md-3 col-xs-6">
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
                                <h3 class="product-name"><a
                                        href="{{ route('info', [$prod->uuid]) }}">{{ $prod->name }}</a></h3>
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
                                    <button class="quick-view" onclick="ajouterPanier('{{ $prod->uuid }}')"><i class="fa fa-shopping-cart"></i><span
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
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->
@endsection
