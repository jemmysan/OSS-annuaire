@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('startup-indicateurs.index') }}">  Startup-Indicateur</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<h2 class="p-1">Suivi des startups</h2>
<div class="card p-4">
        
        
    <div class="card-header d-flex justify-content-between">
        <form method="POST" action="{{ route('startup-indicateurs.searchStartup') }}"  role="search"  style="width : 92%">
                @csrf <!-- Include this line to add the CSRF token -->
                <div class="input-group bg-color-red">
                    <div id="custom-search-input" style="width : 16%">
                        <div class="">
                            <input type="text" class="form-control" name="search" placeholder="Search" id="nom">
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
        <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createstartupIndicateur">
                <i class="fas fa-plus-circle"></i>
                Ajouter
        </a>
        
    </div>
  
    <div class="card-body table-responsive p-0">
       
        <table class="table table-hover" style="--bs-table-hover-color: #fff; --bs-table-hover-bg: #007bff;">
            <thead>
                <hr>
                
                <tr>
                    <th>Start-up</th>
                    <th>Indicateur</th>
                    <th>&nbsp;</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($startupIndicateurs as $indicateur)
                <tr onclick="window.location.href='{{ route('startup-indicateurs.show',$indicateur['startup_id']) }}'" style="cursor: pointer;">
                    
                    <td>
                            
                                {{$indicateur['nom_startup']}}
                            
                    </td>
    
                            
                            <td>
                                {{$indicateur['libelle_indicateur']}}
                                
                            </td>
                            <td style="border-bottom :  2px solid; display : flex; justify-content : center">
                                {{$indicateur['value']}} <span style='padding-left : 10px'>  {{$indicateur['symbole_mesure']}} </span>
                                
                            </td>
    
                            <td>
                                {{$indicateur['date']}}
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


<!-- Modal create indicateur startup  -->
<div class="modal fade" id="createstartupIndicateur" tabindex="-1" role="dialog" aria-labelledby="createstartupIndicateur" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content max-h-full">
            <div class="modal-header">
                <h5 class="modal-title">Ajout indicateur startup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('startup-indicateurs.add') }}">
                @csrf
                <div class="modal-body">
                    <label for="startup_id">Startup</label>
                    <select class="custom-select @error('startup_id') is-invalid @enderror" id="startup_id" name="startup_id">
                        <option value="" selected disabled>Choose...</option>
                        @foreach($startups as $startup)
                            <option value="{{ $startup['id'] }}" >
                                {{ $startup['nom'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('startup')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-body">
                    
                    <label for="indicateur_id">Indicateur</label>
                    <select class="custom-select @error('indicateur_id') is-invalid @enderror" id="indicateur_id" name="indicateur_id">
                        <option value="" selected disabled>Choose...</option>
                        @foreach($indicateurs as $indicateur)
                            <option value="{{ $indicateur->id }}" >
                                {{ $indicateur->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('indicateur_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <div class="modal-body">
                    <label for="value">Valeur</label>
                    <input type="number" value="{{ old('value') }}" name="value" id="value" class="form-control @error('value') is-invalid @enderror">
                    @error('value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="date">Valeur</label>
                    <input type="date" value="{{ old('date') }}" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
                    @error('date')
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
