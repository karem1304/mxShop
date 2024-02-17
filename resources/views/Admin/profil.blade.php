@extends('Admin.Layout.body')
@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item active">Profile</li>
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
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <ul class="alert alert-danger alert-dismissable">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if (session()->has('success'))
                            <ul class="alert alert-success alert-dismissable">
                                {{-- @foreach ($errors->all() as $error) --}}
                                <li>{{ session()->get('success') }}</li>
                                {{-- @endforeach --}}
                            </ul>
                        @endif
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h1>Informations Personnelles</h1>
                                </div>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" method="POST"
                                    action="{{ route('admin.updateProfile') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">Nom</label>
                                                <input required type="text" class="form-control" id="name"
                                                    name="name" placeholder="Entrer le nom"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input required name="email" id="email" type="email"
                                                    class="form-control" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary float-right" type="submit"><i
                                            class="fas fa-save spin spinner"></i> Sauvegader</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.updatepassword') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="lastPassword">Ancien mot de passe</label>
                                            <input required type="password" class="form-control" id="lastPassword"
                                                name="lastPassword" placeholder="Entrer le nom">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="password">Nouveau mot de passe</label>
                                            <input required name="password" id="password" type="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="passwordConfirm">Confirmer le nouveau mot de passe</label>
                                            <input required name="passwordConfirm" id="passwordConfirm" type="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary float-right" type="submit"><i
                                            class="fas fa-save spin spinner"></i> Sauvegader</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
