@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('evolution') }}">  Evolution</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')



    <div class="card p-4">
        <h2>Gestion des evolutions </h2>
<br>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-landmark"></i>
</span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">
                              12
                             </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
        <div class="card-header">



            <form action="" method="GET" style="float: right"  role="search">
                <div class="input-group">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="nom" placeholder="Nom Structure" id="nom">
                        </div>
                    </div>
                    <a href="" class=" mt-0">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Rafraichir">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                    </a>

                </div>
            </form>


        </div>
        <div class="card-tools ">
            

            <a href="{{ route('ajout-evolution') }} " class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus-circle"></i></a>
           
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <hr>
                <tr>
                    <th>Ordre</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>

                        <h4>Nom deded</h4>

                        </td>
                        <td>
                            cdcedcdd

                        </td>

                        <td>
                            ejeflkrjmfl

                        </td>
                        <td >
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a href="" class="btn btn-sm bg-teal mx-1"> <i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm  btn-danger mx-1"  onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>

               
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


    

@endsection
