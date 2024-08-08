@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('secteur.index') }}">  Secteur</a>
@endsection
@section('title')
    Secteurs
@endsection
@section('content')

<h2 class="p-1">Gestion des secteurs </h2>
<div class="card p-4">

    
    <div class="card-header">

            <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createphase">
                <i class="fas fa-plus-circle"></i>
                Ajouter
            </a>
       
            <form action="{{ route('secteur.search')}}" method="POST" role="search" style="float: right">
                @csrf <!-- Include this line to add the CSRF token -->
                <div class="input-group bg-color-red">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="search" placeholder="Nom Start-Up" id="nom">
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
    
    <div class="card-body table-responsive p-0 h-50dvh" >
        <table class="table table-hover">
            <thead>
                <hr>
                <tr>
                    <th>Libelle</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody class="" style="overflow-y : scroll" >
                @forelse ($secteurs as $secteur )
                    <tr>
                    

                        <td>
                            {{$secteur->secteur}}
                        </td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewphase{{$secteur->id}}"> <i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editphase{{$secteur->id}}"> <i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger mx-1" href="{{ route('secteur.delete',$secteur->id ) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
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
{!! $secteurs->links() !!}

<!-- Modals Section -->
@foreach ($secteurs as $secteur)
    
    <!-- Modal view phase -->
    <div class="modal fade" id="viewphase{{$secteur->id}}" tabindex="-1" role="dialog" aria-labelledby="viewphase" aria-hidden="true">
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
                    <div class="shadow-none p-3 bg-light rounded">{{$secteur->secteur}}</div>
                </div>
               
            
                <div class="modal-footer">
                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editphase"> <i class="fas fa-edit"></i>
                        Modifier
                    </a>
                    <button type="button" class="btn btn-primary mx-1 btn-sm" data-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit phase -->
    <div class="modal fade" id="editphase{{$secteur->id}}" tabindex="-1" role="dialog" aria-labelledby="editphase" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content max-h-full">
                <div class="modal-header">
                    <h5 class="modal-title">Modification phase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('secteur.update',$secteur->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="libelle">Libelle</label>
                        <input type="text" name="secteur" value="{{$secteur->secteur}}" id="secteur" class="form-control @error('secteur') is-invalid @enderror">
                        @error('secteur')
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


<!-- Modal create phase  -->
<div class="modal fade" id="createphase" tabindex="-1" role="dialog" aria-labelledby="createphase" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content max-h-full">
            <div class="modal-header">
                <h5 class="modal-title">Création phase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('secteur.store') }} ">
                @csrf
                <div class="modal-body">
                    <label for="secteur">Libelle</label>
                    <input type="text" value="" name="secteur" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                    @error('libelle')
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
