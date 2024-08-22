@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('indicateur.index') }}">  Indicateur</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<h2 class="p-1">Gestion des indicateurs </h2>
<div class="card p-4">
        @php
            $mesures = DB::table('unite_mesures')->get();
            
        @endphp
        
    <div class="card-header">
        <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createindicateur">
                <i class="fas fa-plus-circle"></i>
                Ajouter
            </a>
            <form action="{{ route('indicateur.search') }}" method="POST" role="search" style="float: right">
                @csrf <!-- Include this line to add the CSRF token -->
                <div class="input-group bg-color-red">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="search" placeholder="Libelle indicateur" id="nom">
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
                    <th>Unité de mesure</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($indicateurs as $key => $indicateur)
                <tr>
                   
                    <td>
                        {{ $indicateur->libelle }}
                    </td>

                    <td>
                        @php
                            $uniteMesure =  $mesures->where('id',$indicateur->mesure_id)->first()
                        @endphp
                        @if ($uniteMesure)
                            {{
                                $uniteMesure->libelle 
                            }} <span>({{$uniteMesure->symbole}})</span>
                            
                        @else
                            <span>Unité non précise</span>
                        @endif
                    </td>
                    <td>
                        {{ substr($indicateur->description, 0, 40) }} ....
                    </td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewindicateur{{ $indicateur->id }}"> <i class="fas fa-eye"></i></a>
                            <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editindicateur{{ $indicateur->id }}"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger mx-1" href="{{ route('indicateur.delete', $indicateur->id) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
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
{!! $indicateurs->links() !!}
<!-- Modals Section -->
@foreach ($indicateurs as $indicateur)
    <!-- Modal view indicateur -->
    <div class="modal fade" id="viewindicateur{{ $indicateur->id }}" tabindex="-1" role="dialog" aria-labelledby="viewindicateur" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details indicateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="libelle">Libelle</label>
                    <div class="shadow-none p-3 bg-light rounded">{{ $indicateur->libelle }}</div>
                </div>
                <div class="modal-body">
                    <label for="mesure">Unité de mesure</label>
                    <div class="shadow-none p-3 bg-light rounded">
                       
                        @if ($uniteMesure)
                                {{
                                    $uniteMesure->libelle 
                                }} <span>({{$uniteMesure->symbole}})</span>
                                
                            @else
                                <span>Unité non précise</span>
                            @endif
                    </div>
                </div>
                <div class="modal-body">
                    <label for="ordre">Description</label>
                    <div class="shadow-lg p-3 bg-body rounded">{{ $indicateur->description }}</div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editindicateur{{ $indicateur->id }}"> <i class="fas fa-edit"></i>
                        Modifier
                    </a>
                    <button type="button" class="btn btn-primary mx-1 btn-sm" data-dismiss="modal">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit indicateur -->
    <div class="modal fade" id="editindicateur{{ $indicateur->id }}" tabindex="-1" role="dialog" aria-labelledby="editindicateur" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content max-h-full">
                <div class="modal-header">
                    <h5 class="modal-title">Modification indicateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('indicateur.update', $indicateur->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="libelle">Libelle</label>
                        <input type="text" name="libelle" value="{{ $indicateur->libelle }}" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                        @error('libelle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <label for="mesure_id">Unité de mesure</label>
                        <select class="custom-select @error('mesure_id') is-invalid @enderror" id="mesure_id" name="mesure_id">
                            <option value="" selected disabled>Choose...</option>
                            @foreach($mesures as $mesure)
                                <option value="{{ $mesure->id }}" 
                                    {{ old('mesure_id', $indicateur->mesure_id) == $mesure->id ? 'selected' : '' }}>
                                    {{ $mesure->libelle }}<span>&nbsp; ({{ $mesure->symbole }})</span>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $indicateur->description }}</textarea>
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

<!-- Modal create indicateur  -->
<div class="modal fade" id="createindicateur" tabindex="-1" role="dialog" aria-labelledby="createindicateur" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content max-h-full">
            <div class="modal-header">
                <h5 class="modal-title">Création indicateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('indicateur.store') }}">
                @csrf
                <div class="modal-body">
                    <label for="nom_structure">Libelle</label>
                    <input type="text" value="{{ old('libelle') }}" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror">
                    @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-body">
                    
                    <label for="mesure_id">Unité de mesure</label>
                    <select class="custom-select @error('mesure_id') is-invalid @enderror" id="mesure_id" name="mesure_id">
                        <option value="" selected disabled>Choose...</option>
                        @foreach($mesures as $mesure)
                            <option value="{{ $mesure->id }}" {{ old('mesure') == $mesure->id ? 'selected' : '' }}>
                                {{ $mesure->libelle }}
                            </option>
                        @endforeach
                    </select>
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
