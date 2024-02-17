@extends('Admin.Layout.body')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
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
                            <li class="breadcrumb-item active">Categorie {{ $category->name }}</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des produits</h3>
                                <h3 class="text-right"><button class="btn btn-primary btn-sm text-right pb-2"
                                        data-toggle="modal" data-target="#addProduct"> <i
                                            class="fas fa-plus mr-2 pt-1"></i>Ajouter</button></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description(s)</th>
                                            <th>Prix</th>
                                            <th>Ancien Prix</th>
                                            <th>Marque</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td style="word-wrap: break-word; width: 30%">{{ $product->description }}
                                                </td>
                                                <td>{{ format($product->price) }}</td>
                                                <td class="text-danger" style="text-decoration: line-through">
                                                    {{ format($product->firstPrice) }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>
                                                    <a href="#" class="text-success mr-3 ml-3 editProduct"
                                                        data-uuid="{{ $product->uuid }}" data-toggle="modal"
                                                        data-target="#editProduct"> <i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.products.info',[$product->uuid]) }}" class="text-info mr-1 ml-1"> <i class="fas fa-eye"></i></a>
                                                    <a href="#"
                                                        action="/admin.products.delt{{ $product->uuid }}/{{ $id }}"
                                                        class="text-danger ml-3 deletChamp"
                                                        name="produit {{ $product->name }}">
                                                        <i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProduct">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une produit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Nom du produit</label>
                                    <input required type="text" class="form-control" id="name" name="name"
                                        placeholder="Entrer le nom">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">Prix du produit</label>
                                    <input required name="price" id="price" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstPrice">Prix promotion du produit</label>
                                    <input required name="firstPrice" id="firstPrice" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstPrice">Marque du produit</label>
                                    <select name="brand_id" id="brand_id" class="form-control select2bs4">
                                        <option value="{{ null }}">{{ null }}</option>
                                        @foreach (brands() as $brand)
                                            <option value="{{ $brand->uuid }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description du produit</label>
                                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnAddProduct">Ajouter</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="editProduct">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier une produit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">Nom du produit</label>
                                    <input required type="text" class="form-control" id="nameUpdate"
                                        name="nameUpdate" placeholder="Entrer le nom">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">Prix du produit</label>
                                    <input required name="priceUpdate" id="priceUpdate" type="number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstPrice">Prix promotion du produit</label>
                                    <input required name="firstPriceUpdate" id="firstPriceUpdate" type="number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description du produit</label>
                                    <textarea name="descriptionUpdate" id="descriptionUpdate" cols="10" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <input type="text" id="ProductId" hidden disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUpdateProduct">Ajouter</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            //Initialize Select2 Elements
            $('#btnAddProduct').on('click', function(e) {
                var formData = {
                    'name': $('#name').val(),
                    'description': $('#description').val(),
                    'price': $('#price').val(),
                    'firstPrice': $('#firstPrice').val(),
                    'brand_id': $('#brand_id').val(),
                    'category_id': '{{ $id }}',
                };
                _token = $('input[type="hidden"]').attr('value');
                console.log(formData, _token);
                $.ajax({
                    url: 'admin.products.add{{ $id }}',
                    method: 'POST',
                    data: {
                        _token,
                        formData
                    },
                    success: function(data) {
                        console.log(data);
                        alert('Le produit a été ajouté');
                        location.reload();
                    },
                })
            })
            $('.deletChamp').on('click', function() {
                name = $(this).attr("name");
                confirmation = confirm("Voulez-vous continuer la suppression de la " + name + " ?");
                if (confirmation) {
                    action = $(this).attr("action");
                    // alert(action);
                    $.ajax({
                        url: '' + action + '',
                        method: 'GET',
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            });
            $('.editProduct').on('click', function() {
                id = $(this).attr('data-uuid');
                $('#ProductId').val(id);
                $.ajax({
                    url: 'admin.products.edit/' + id,
                    method: 'GET',
                    success: function(data) {
                        $('#nameUpdate').val(data.name);
                        $('#descriptionUpdate').val(data.description);
                        $('#priceUpdate').val(data.price);
                        $('#firstPriceUpdate').val(data.firstPrice);
                        $('#brand_idUpdate').val(data.brand_id);
                        console.log(data);
                    }
                })
            });
            $('#btnUpdateProduct').on('click', function() {
                var formData = {
                    'name': $('#nameUpdate').val(),
                    'description': $('#descriptionUpdate').val(),
                    'price': $('#priceUpdate').val(),
                    'firstPrice': $('#firstPriceUpdate').val(),
                };
                _token = $('input[type="hidden"]').attr('value');
                id = $('#ProductId').val();
                // alert(id);
                $.ajax({
                    url: 'admin.products.edit/' + id,
                    method: 'POST',
                    data: {
                        formData,
                        _token
                    },
                    success: function(data) {
                        alert('Le produit a été modifié');
                        location.reload();
                    }
                })
            })
        });
    </script>
@endsection
