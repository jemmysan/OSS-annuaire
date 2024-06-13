@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('phase') }}">  Phase</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<div class="card p-4">
    <h2>Gestion des évolutions </h2>
    <br>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                    <!-- <i class="fas fa-landmark"></i> -->
                    <i class="bi bi-graph-up"></i>

                </span>
                <div class="info-box-content">
                    <span class="info-box-text">TOTAL</span>
                    <span class="info-box-number">
                        <?php
                            use Illuminate\Support\Facades\DB;
                            $count = DB::table('phases')->count();
                            echo $count;
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <form action="" method="GET" style="float: right" role="search">
            <div class="input-group">
                <div id="custom-search-input">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="nom" placeholder="Nom Structure" id="nom">
                    </div>
                </div>
                <a href="" class="mt-0">
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
        <a href="" class="btn btn-sm btn-primary mt-2"><i class="fas fa-plus-circle"></i></a>
    </div>
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
                        <h4>b:jh:l</h4>
                    </td>
                    <td>
                        kjh:jhml:
                    </td>
                    <td>
                       trfkhjlgohlk
                    </td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="#" class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewphase"> <i class="fas fa-eye"></i></a>
                            <a href="" class="btn btn-sm bg-teal mx-1"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm  btn-danger mx-1" href="" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Modal view phase -->
                <div class="modal fade" id="viewphase" tabindex="-1" role="dialog" aria-labelledby="viewphase" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Details phase</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="libelle">Libelle</label>
                                <div class="shadow-none p-3  bg-light rounded">
                                    jn!;,%ML§
                                </div>

                            </div>
                            <div class="modal-body">
                                <label for="ordre">Ordre</label>
                                <div class="shadow-none p-3  bg-light rounded">
                                    b!nbcvbvn:b,!n;,fgh
                                </div>
                            </div>
                            
                            <div class="modal-body">
                                <label for="ordre">Description</label>
                                <div class="shadow-lg p-3  bg-body rounded">
                                   jlg::bln
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                            <a href="" class="btn btn-sm bg-teal mx-1"> <i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-secondary mx-1 btn-sm" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <tr>
                    <td colspan="4"><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                </tr>  
                
            </tbody>
        </table>
    </div>
</div>

@endsection
