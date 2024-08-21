@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('mesure.index') }}">  Unité-mesure</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<h2 class="p-1">Gestion des mesures </h2>
<div class="card p-4">

    
    <div class="card-header">

            <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createmesure">
                <i class="fas fa-plus-circle"></i>
                Ajouter
            </a>
       
            <form action="{{ route('mesure.search')}}" method="POST" role="search" style="float: right">
                @csrf <!-- Include this line to add the CSRF token -->
                <div class="input-group bg-color-red">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="search" placeholder="Libelle unité de mesure" id="nom">
                        </div>
                    </div>
                    <div class="">
                        <a class="mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="submit" title="Refraichir">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                    <br>
                </div>
            </form>
    </div>
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <hr>
                <tr>
                    <th>Libelle</th>
                    <th>Symbole</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mesures as $mesure )
                    <tr>
                    
                        
                        <td>
                            {{$mesure->libelle}}
                        </td>
                        <td>
                            {{$mesure->symbole}}

                        </td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <!-- <a class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewmesure{{$mesure->id}}"> <i class="fas fa-eye"></i></a> -->
                                <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editmesure{{$mesure->id}}"> <i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger mx-1" href="{{ route('mesure.delete',$mesure->id)}}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    
                    <tr>
                        <td colspan="4"><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                    </tr>
                @endforelse
                
                
            </tbody>
        </table>
    </div>
</div>
{!! $mesures->links() !!}

<!-- Modals Section -->
@foreach ($mesures as $mesure)
    
    <!-- Modal view mesure -->
    <div class="modal fade" id="viewmesure{{$mesure->id}}" tabindex="-1" role="dialog" aria-labelledby="viewmesure" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details mesure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="libelle">Libelle</label>
                    <div class="shadow-none p-3 bg-light rounded">{{$mesure->libelle}}</div>
                </div>
                <div class="modal-body">
                    <label for="symbole">symbole</label>
                    <div class="shadow-none p-3 bg-light rounded">{{$mesure->symbole}}</div>
                </div>
            
                <div class="modal-footer">
                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editmesure{{$mesure->id}}"> <i class="fas fa-edit"></i>
                        Modifier
                    </a>
                    <button type="button" class="btn btn-primary mx-1 btn-sm" data-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit mesure -->
    <div class="modal fade" id="editmesure{{$mesure->id}}" tabindex="-1" role="dialog" aria-labelledby="editmesure" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content max-h-full">
                <div class="modal-header">
                    <h5 class="modal-title">Modification mesure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('mesure.update',$mesure->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="libelle">Libelle</label>
                        <input type="text" name="libelle" value="{{$mesure->libelle}}" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                        @error('libelle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="symbole">symbole</label>
                        <input type="text" name="symbole" value="{{$mesure->symbole}}" id="symbole" class="form-control @error('symbole') is-invalid @enderror">
                        @error('symbole')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="modal-body">
                        <button class="btn btn-warning" data-dismiss="modal">
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            Annuler
                        </button>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fas fa-save"></i>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


<!-- Modal create mesure  -->
<div class="modal fade" id="createmesure" tabindex="-1" role="dialog" aria-labelledby="createmesure" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content max-h-full">
            <div class="modal-header">
                <h5 class="modal-title">Création mesure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('mesure.store') }} ">
                @csrf
                <div class="modal-body">
                    <label for="libelle">Libelle</label>
                    <input type="text" value="" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                    @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="symbole">Symbole</label>
                    <input type="text" value="" name="symbole" id="symbole" class="form-control @error('symbole') is-invalid @enderror">
                    @error('symbole')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                
               
                <div class="modal-body">
                    <button class="btn btn-warning" data-dismiss="modal">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fas fa-save"></i>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
