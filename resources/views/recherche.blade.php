<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <style>
        .old {
            color: #ff0000;

        }
        .middleaged {
            color: #22ff00;

        }
        .mid{
            color: #00d0ff;

        }
        .young {
            color: #045d1c;

        }
    </style>
</head>

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        @include('partials.menu_bar')
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
        <a href="#" class="brand-link">
            <img src="{{asset('img/icone.png')}}" alt="Start-Up Logo" class="brand-image img-circle elevation-1" style="opacity: .8">

            <span class="brand-text  font-weight-light">Annuaire Start-up</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <!-- renvoie au profil de l'utilisateur -->
                <div class="info">
                    <a href="#" class="d-brand-link">{{auth()->user()->name}}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                @include('partials.nav')
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Recherche</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recherche</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="startup" class="table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>Start-up</th>
                                        <th>Description</th>
                                        <th>Phase</th>
                                        <th>Tags</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($items as $item)
                                    <tr>
                                        <td>{{$item->nom_startup}}</td>
                                        <td class="text-truncate" style="max-width: 500px;">
                                            {{$item->description}}
                                        </td>
                                        <td id="phase" style="text-transform: capitalize" >
                                                    @if($item->phase->phase === "contact")
                                                        <b class="old">{{$item->phase->phase}}</b>
                                                    @elseif($item->phase->phase === "discussion")
                                                        <b class="middleaged">{{$item->phase->phase}}</b>
                                                    @elseif($item->phase->phase === "pilotage")
                                                        <b class="mid">{{$item->phase->phase}}</b>
                                                    @elseif($item->phase->phase === "deploiement")
                                                        <b class="young">{{$item->phase->phase}}</b>
                                                    @endif



                                        </td>
                                        <td>

                                            @foreach ($item->tag as $singleTag)

                                                <span class="badge badge-info">#{{ $singleTag->name }} <br> </span>
                                            @endforeach
                                        </td>
                                        <td><a  type="button" href="{{ route('startup.show', $item->id  ) }}" class="btn btn-sm btn-primary"> <i class="fas fa-eye"></i></a>
                                        </td>


                                    </tr>
                                    @empty
                                        <tr>
                                            <td><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                                        </tr>

                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Start-up</th>
                                        <th>Description</th>
                                        <th>Phase</th>
                                        <th>Tags</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright © 2020-2021 <a href="https://sonatel.sn">Sonatel.sn</a>.</strong> All rights reserved.

        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <!-- Default to the left -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#startup").DataTable({

            "lengthChange": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#startup_wrapper .col-md-6:eq(0)');


    });
</script>
@if(config('app.locale') == 'fr')

<script>
    (($, DataTable) => {
        $.extend(true, DataTable.defaults, {
            language: {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage des éléments _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            }
        });
    })(jQuery, jQuery.fn.dataTable);
</script>
@endif
</body>
</html>
