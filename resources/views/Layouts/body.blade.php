<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Maximus Telecom</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +237 658284420</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Douala, Cité des palmiers</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="{{ route('admin.index') }}"><i class="fa fa-user-o"></i> Mon compte</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3 text-center">
                        <h1>
                            MAXIMUS TELECOM
                        </h1>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6 text-center">
                        <div class="header-search">
                            <form>
                                <input class="input" placeholder="Recherchez ici" class="form-control"
                                    id="searchInput">
                                <br>
                                <div id="searchResult"
                                    style="display: none;position:absolute;height: auto; width: 54%; margin-left:13rem;z-index: 9999999;"
                                    class="col-lg-9 form-control text-left"></div>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"
                                    id="btn-cart-button">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Mon panier</span>
                                    <div class="qty" id="qty-carts"></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list" id="cart-list">

                                    </div>
                                    <div class="cart-summary">
                                        <small><span id="item-cart"></span> Item(s)</small>
                                        <h5>SUBTOTAL: <span id="price-cart"></span> XAF</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="#">View Cart</a>
                                        <a href="{{ route('checkout') }}">Checkout <i
                                                class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class=" @if (Route::CurrentRouteName() == 'index') active @endif"><a
                            href="{{ route('index') }}">Accueil</a></li>
                    <li class=" @if (Route::CurrentRouteName() == 'allProduct') active @endif"><a
                            href="{{ route('allProduct') }}">Tous les produits</a></li>
                    @foreach (categories() as $category)
                        <li class="@if (url()->current() == 'http://127.0.0.1:8000/product' . $category->uuid) active @endif"><a
                                href="{{ route('product', [$category->uuid]) }}">{{ $category->name }}</a></li>
                    @endforeach
                    @if (Route::currentRouteName() == 'info')
                        <li class="active"><a href="#">Information</a></li>
                    @endif
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    @yield('content')

    {{-- <!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER --> --}}

    <!-- FOOTER -->
    <footer id="footer">
        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; 2015 -
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Tous les droits reservés | Maximus Telecom <i
                                class="fa fa-heart-o" aria-hidden="true"></i>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>


                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/slick.min.js') }}"></script>
    <script src="{{ asset('dist/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('dist/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#btn-cart-button').on('click', function() {
                // alert('yo');
                $.ajax({
                    url: '{{ route('afficherPanier') }}',
                    method: 'GET',
                    success: function(data) {
                        if (data.cart) {
                            $('#cart-list').empty();
                            var somme = 0;
                            var qte = 0;
                            $.each(data.cart, function(key, item) {
                                $('#cart-list').append(
                                    '<div class="product-widget"> <div class="product-img"> <img src="dist/img/' +
                                    item.product.image.name +
                                    '" alt=""> </div> <div class="product-body"><h3 class="product-name"><a href="#">' +
                                    item.product.name +
                                    '</a></h3><h4 class="product-price"><span class="qty">' +
                                    item.quantity + 'x</span>' + item.product
                                    .price +
                                    ' XAF</h4></div><a href="#" class="btn btn-darkdelete removeProduct" onclick="delteProduct(`' +
                                item.product.uuid + '`)" product-id="' +
                                    item.product.uuid +
                                    '"><i class="fa fa-close"></i></a> </div>'
                                );
                                somme += (item.product.price * item.quantity);
                                qte += item.quantity;
                            });
                            $('#price-cart').text(somme);
                            $('#item-cart').text(qte);
                            $('#qty-carts').text(qte);
                        }
                    }
                });
            });
            $('#searchInput').on('input', function() {
                var keyword = $(this).val();
                $.ajax({
                    url: '{{ route('research') }}',
                    method: 'GET',
                    data: {
                        key: keyword
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#searchResult').empty();
                            $('#searchResult').css('display', 'block');
                            $.each(response, function(index, item) {
                                // console.log(item.uuid);
                                $('#searchResult').append(
                                    '<a href="info' + item.uuid +
                                    '" ><div class="row"><div class="col-lg-2"> <img src="dist/img/' +
                                    item.image.name +
                                    '" height="150%" width="150%"/> </div> <div class="col-lg-10"> <div>' +
                                    item.category.name + ' - ' + item.brand.name +
                                    '</div>' + item.name + '</div>  </div></a><hr>'
                                );
                            });
                        } else {
                            $('#searchResult').empty();
                            $('#searchResult').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        // $('.removeProduct').on('click', function() {
        //         alert('yo')
        //         // e.preventDefault();
        // var index = $(this).data('product-id');
        // console.log(index);
        // $.ajax({
        //     url: '{{ route('removeProductFromCart', '+index+') }}',
        //     method: 'GET',
        //     success: function(data) {
        //         $('#cart-list').empty();
        //         $.each(data.cart, function(key, item) {
        //             $('#cart-list').append(
        //                 '<div class="product-widget"> <div class="product-img"> <img src="dist/img/' +
        //                 item.product.image.name +
        //                 '" alt=""> </div> <div class="product-body"><h3 class="product-name"><a href="#">' +
        //                 item.product.name +
        //                 '</a></h3><h4 class="product-price"><span class="qty">' +
        //                 item
        //                 .quantity + 'x</span>' + item.product.price +
        //                 ' XAF</h4></div><button class="delete removeProduct" product-id="' +
        //                 item.product.uuid +
        //                 '"><i class="fa fa-close"></i></button> </div>'
        //             );
        //         });
        //     }
        // })
        //     });
        //     // alert('yo');
        function calculSomme(produit) {
            var somme = 0;
            produit.forEach(produit => {
                somme += produit.price;
            });
            return somme;
        }

        function delteProduct(index) {
            // alert('yo');
            // var index = $(this).data('product-id');
            console.log(index);
            $.ajax({
                url: '/removeProductFromCart' + index + '',
                method: 'GET',
                // beforeSend:function(data){$('#cart-list').empty();},
                success: function(data) {

                    $.each(data.cart, function(key, item) {
                        $('#cart-list').append(
                            '<div class="product-widget"> <div class="product-img"> <img src="dist/img/' +
                            item.product.image.name +
                            '" alt=""> </div> <div class="product-body"><h3 class="product-name"><a href="#">' +
                            item.product.name +
                            '</a></h3><h4 class="product-price"><span class="qty">' +
                            item.quantity + 'x</span>' + item.product
                            .price +
                            ' XAF</h4></div><a href="#" class="btn btn-darkdelete removeProduct" onclick="delteProduct(`' +
                        item.product.uuid + '`)" product-id="' +
                            item.product.uuid +
                            '"><i class="fa fa-close"></i></a> </div>'
                        );
                        // var somme = 0;
                    });

                }
            })

        }

        function ajouterPanier(index) {
            // alert(index);
            const key = index;
            _token = $("input[type='hidden']").attr('value');
            $.ajax({
                url: '{{ route('ajoutPanier') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token,
                    key
                },
                success: function(data) {
                    console.log(data)
                },
            })
        }
    </script>
    @yield('script')
@csrf

</body>

</html>
