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
                        <li>Panier</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <div class="section">
        <!-- container -->
        <div class="container" style="margin-right: 2.3rem;">
            <!-- Order Details -->
            <div class="col-md-6 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Mon Panier <i class="fa fa-shopping-cart"></i></h3>
                    {{-- julio --}}
                </div>
                <div class="order-summary">

                    <div class="order-col">
                        <div><strong>Qté - PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        @php
                            $somme = 0;
                        @endphp
                        @foreach ($cart as $product)
                            <div class="order-col">
                                {{-- {{ dd($product['quantity']) }} --}}
                                <div>{{ $product['quantity'] }} - {{ $product['product']->name }}</div>
                                <div>{{ format(($product['quantity'] * $product['product']->price)) }}</div>
                                @php
                                    $somme += ($product['quantity'] * $product['product']->price);
                                @endphp
                            </div>                        
                        @endforeach
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">{{ format($somme) }}</strong></div>
                    </div>
                </div>
                <a href="#" class="primary-btn order-submit"><i class="fa fa-whatsapp"></i> Commandez</a>
            </div>
            <!-- /Order Details -->
        </div>
    </div>
@endsection
