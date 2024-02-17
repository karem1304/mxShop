@extends('Admin.Layout.body')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Accueil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.products',[$product->category->uuid]) }}">Categorie {{ $product->category->name }}</a> </li>
                            <li class="breadcrumb-item active"> Produit {{ $product->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-inner">
                                @php
                                    $j = 0;
                                @endphp
                                @foreach ($product->images()->get() as $image)
                                    <div class="carousel-item @if($j == 0) active @endif">
                                        <a href="{{ route('admin.products.deleteUpload',[$image->uuid]) }}" class="text-center" style="margin-left:50% "><i class="fas fa-trash-alt text-danger"></i></a>
                                        
                                        <img src="{{ asset('dist/img/' . $image->name) }}" class="d-block w-100"
                                            alt="Image 1">
                                    </div>
                                    @php
                                        $j++;
                                    @endphp
                                @endforeach
                                <a href="#carouselExampleIndicators" role="button" data-slide="prev"
                                    class="carousel-control-prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#carouselExampleIndicators" role="button" data-slide="next"
                                    class="carousel-control-next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <ol class="carousel-indicators">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($product->images()->get() as $image)
                                        <li class="active" data-target="#carouselExampleIndicators"
                                            data-slide-to="{{ $i }}">
                                            <img src="{{ asset('dist/img/' . $image->name) }}" class="d-block w-100"
                                                alt="Image 1">
                                            @php
                                                $i++;
                                            @endphp
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h1>Information Du produit</h1>
                                </div>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 mt-1 h3">Nom:</div>
                                    <div class="col-lg-4 mt-1 h4">{{ $product->name }}</div>
                                    <div class="col-lg-2 mt-1 h3">Prix:</div>
                                    <div class="col-lg-4 mt-1 h4">{{ format($product->price) }}</div>
                                    <div class="col-lg-2 mt-1 h3">Marque:</div>
                                    <div class="col-lg-4 mt-1 h4">{{ $product->brand->name }}</div>
                                    <div class="col-lg-2 mt-1 h3">Categorie:</div>
                                    <div class="col-lg-4 mt-1 h4">{{ $product->category->name }}</div>
                                    <div class="col-lg-12 h3 mt-1 text-center">Description:</div>
                                    <div class="col-lg-12 h4 mt-1">{{ $product->description }}</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Ajoutez d'autres images</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.products.upload', [$product->uuid]) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="file" name="image" id="image" class="form-control">
                                    <input type="submit" value="Upload" class="mt-3 btn btn-success float-right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
