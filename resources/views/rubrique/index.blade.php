@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('rubrique.index') }}">  rubrique</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<h2 class="p-1">Gestion des rubriques </h2>
<div class="card p-4">

    
    <div class="card-header">

            <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createrubrique">
                <i class="fas fa-plus-circle"></i>
                Ajouter
            </a>
       
            <form action="{{ route('rubrique.search') }}" method="POST" role="search" style="float: right">
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
    
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <hr>
                <tr>
                    
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rubriques as $key => $rubrique)
                <tr>
                   
                    <td>
                        {{ $rubrique->libelle }}
                    </td>
                    <td>
                        {{ substr($rubrique->description, 0, 50) }} ....
                    </td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewrubrique{{ $rubrique->id }}"> <i class="fas fa-eye"></i></a>
                            <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editrubrique{{ $rubrique->id }}"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger mx-1" href="{{ route('rubrique.delete', $rubrique->id) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
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

<!-- Modals Section -->
@foreach ($rubriques as $rubrique)
    <!-- Modal view rubrique -->
    <div class="modal fade" id="viewrubrique{{ $rubrique->id }}" tabindex="-1" role="dialog" aria-labelledby="viewrubrique" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details rubrique</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="libelle">Libelle</label>
                    <div class="shadow-none p-3 bg-light rounded">{{ $rubrique->libelle }}</div>
                </div>
                <div class="modal-body">
                    <label for="ordre">Ordre</label>
                    <div class="shadow-none p-3 bg-light rounded">{{ $rubrique->ordre }}</div>
                </div>
                <div class="modal-body">
                    <label for="ordre">Description</label>
                    <div class="shadow-lg p-3 bg-body rounded">{{ $rubrique->description }}</div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editrubrique{{ $rubrique->id }}"> <i class="fas fa-edit"></i>
                        Modifier
                    </a>
                    <button type="button" class="btn btn-primary mx-1 btn-sm" data-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit rubrique -->
    <div class="modal fade" id="editrubrique{{ $rubrique->id }}" tabindex="-1" role="dialog" aria-labelledby="editrubrique" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content max-h-full">
                <div class="modal-header">
                    <h5 class="modal-title">Modification rubrique</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('rubrique.update', $rubrique->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="libelle">Libelle</label>
                        <input type="text" name="libelle" value="{{ $rubrique->libelle }}" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                        @error('libelle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="ordre">Ordre</label>
                        <input type="number" name="ordre" value="{{ $rubrique->ordre }}" id="ordre" class="form-control @error('ordre') is-invalid @enderror">
                        @error('ordre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $rubrique->description }}</textarea>
                        @error('description')
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

<!-- Modal create rubrique  -->
<div class="modal fade" id="createrubrique" tabindex="-1" role="dialog" aria-labelledby="createrubrique" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content max-h-full">
            <div class="modal-header">
                <h5 class="modal-title">Création rubrique</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action=" {{ route('rubrique.store') }}">
                @csrf
                <div class="modal-body">
                    <label for="libelle">Libelle</label>
                    <input type="text" value="{{ old('libelle') }}" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                    @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="ordre">Ordre</label>
                    <input type="number" name="ordre" id="ordre" class="form-control @error('ordre') is-invalid @enderror">
                    @error('ordre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-body">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description')
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
