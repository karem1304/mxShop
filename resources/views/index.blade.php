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
                    <li>Accueil</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

{{-- Entete --}}
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('dist/img/shop01.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="#" class="cta-btn">Achetez Maintenant <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('dist/img/shop03.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="#" class="cta-btn">Achetez Maintenant <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('dist/img/shop02.png') }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="#" class="cta-btn">Achetez Maintenant <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

{{-- fin entete --}}


{{-- slide --}}
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
                                        {{-- $productslide est la variable qui recupere juste les 6 derniers produits en stock --}}
                                        @foreach ($productSlide as $prod)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{ ('dist/img/'.$prod->images()->first()->name.'') }}" alt="">
												<div class="product-label">
													<span class="sale">{{pourcentage($prod->firstPrice, $prod->price)}}</span>
													@if(calNew($prod->created_at))<span class="new"> New </span>@endif
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{ $prod->category->name }}</p>
												<h3 class="product-name"><a href="{{ route('info',[$prod->uuid]) }}">{{ $prod->name }}</a></h3>
												<h4 class="product-price">{{ format($prod->price) }} <del class="product-old-price">{{ format($prod->firstPrice) }}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
                                                <button class="quick-view" onclick="ajouterPanier('{{ $prod->uuid }}')"><i class="fa fa-shopping-cart"></i><span class="tooltipp">Ajouter au panier</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir plus</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"> <i class="fa fa-whatsapp"></i> <a  href="https://api.whatsapp.com/send?phone=+237658284420&text={{ $prod->description }}"> COMMMANDEZ</a></button>
											</div>
										</div>
										<!-- /product -->                                            
                                        @endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
{{-- fin slide --}}
<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>M</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>A</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>X</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>I</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>M</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>U</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>S</h3>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">Des Fast deal cette semaine</h2>
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>T</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>E</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>L</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>E</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>C</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>O</h3>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>M</h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Laptop</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        @foreach ($laptops as $laptop)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('dist/img/'.$laptop->images()->first()->name) }}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $laptop->category->name }}</p>
                                <h3 class="product-name"><a href="{{ route('info',[$laptop->uuid]) }}">{{ $laptop->name }}</a></h3>
                                <h4 class="product-price">{{ format($laptop->price) }} <del class="product-old-price">{{ format($laptop->firstPrice) }}</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->                            
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Desktop</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        @foreach ($desktops as $desktop)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('dist/img/'.$desktop->images()->first()->name) }}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $desktop->category->name }}</p>
                                <h3 class="product-name"><a href="{{ route('info',[$desktop->uuid]) }}">{{ $desktop->name }}</a></h3>
                                <h4 class="product-price">{{ format($desktop->price) }} <del class="product-old-price">{{ format($desktop->firstPrice) }}</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->                            
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Accessoires</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        @foreach ($accessoires as $accessoire)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('dist/img/'.$accessoire->images()->first()->name) }}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $accessoire->category->name }}</p>
                                <h3 class="product-name"><a href="{{ route('info',[$accessoire->uuid]) }}">{{ $accessoire->name }}</a></h3>
                                <h4 class="product-price">{{ format($accessoire->price) }} <del class="product-old-price">{{ format($accessoire->firstPrice) }}</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->                            
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection