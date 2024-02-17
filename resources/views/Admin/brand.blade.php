@extends('Admin.Layout.body')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                            <li class="breadcrumb-item active">Marques</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des Marques</h3>
                                <h3 class="text-right"><button class="btn btn-primary btn-sm text-right pb-2"
                                    data-toggle="modal" data-target="#addBrand"> <i
                                        class="fas fa-plus mr-2 pt-1"></i>Ajouter</button></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th class="text-center">Nombre de produit</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($brands as $brand)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    {{ $brand->name }}
                                                </td>
                                                <td class="text-center">@php $count = App\Models\Product::where('brand_id',$brand->id)->count(); @endphp {{ $count }}</td>
                                                <td class="text-center">
                                                    <a href="#" class="text-success mr-3 editBrand"
                                                        data-uuid="{{ $brand->uuid }}" data-toggle="modal"
                                                        data-target="#editBrand"> <i class="fas fa-edit"></i></a>
                                                    <a href="#" action="/admins.brands.delete{{ $brand->uuid }}"
                                                        class="text-danger ml-3 deleteChamp" name=" marque {{ $brand->name }}">
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
    <div class="modal fade" id="addBrand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une marque</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom de la marque</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Entrer le nom">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnAddBrand">Ajouter</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="editBrand">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier une marque</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="nameUpdate">Nom de la marque</label>
                            <input type="text" class="form-control" id="nameUpdate" name="name">
                            <input type="text" id="BrandID" disabled hidden>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUpdateBrand">Ajouter</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
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
            $('#btnAddBrand').on('click', function() {
                // alert('yo');
                name = $('#name').val();
                _token = $("input[type='hidden']").attr('value');
                console.log([name, _token]);
                $.ajax({
                    url: "{{ route('admin.brands.add') }}",
                    method: 'POST',
                    data: {
                        name,
                        _token
                    },
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                })
            });
            $('.editBrand').on('click',function(){
                id= $(this).attr("data-uuid");
                // alert(id);
                $('#BrandID').val(id);
                $.ajax({
                    url:'admins.brands.edit'+id,
                    dataType:'JSON',
                    method:'GET',
                    success:function(data){
                        $('#nameUpdate').val(data.name);
                    }
                })
            })
            $('#btnUpdateBrand').on('click',function(){
                id=$('#BrandID').val();
                name = $('#nameUpdate').val();
                _token = $("input[type='hidden']").attr('value');
                $.ajax({
                    url:'admins.brands.edit'+id,
                    dataType:'JSON',
                    method:'POST',
                    data:{name,_token},
                    success:function(data){
                        alert("La categorie a été modifié");
                        location.reload();
                    }
                })
            })
        });
    </script>
@endsection
