

@extends('layouts.admin')

@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
Evolution-startup
@endsection


@section('content')
    <div class="card" >
        <!-- Content Header (Page header) -->
        
        
        <div class="card-header d-flex justify-content-between align-items-center ">
            <a href="{{ route('startup.show', $startupId  ) }}"  class="nav-link">
                <i class="fas fa-undo-alt"></i>
                Retour
            </a>
            <h3 class="card-title"> Ajout évolution startup</h3>

        </div>
        <div>
<form method="POST" action="{{ route('add-evo-startup'), $startupId }}" enctype="multipart/form-data">
    @csrf
    <div class="row px-4 pt-2">
        <div class="col-md-6">

            <div class="form-group">
                <!-- <label for="startupId">id Startup</label> -->
                <input type="number" name="startupId" id="startupId" class="form-control" value="{{ $startupId }}" readonly hidden>
            </div>
            <label for="libelle">Libelle <span class="text-danger">*</span></label>
            <?php
                use Illuminate\Support\Facades\DB;
                $associatedIds = DB::table('evolution_startups')
                    ->where('startup_id', $startupId)   
                    ->pluck('evolution_id');
                $evolutions = DB::table('evolutions')
                    ->whereNotIn('id', $associatedIds)
                    ->get();
            ?>
            <select class="custom-select @error('libelle') is-invalid @enderror" id="libelle" name="libelle" onchange="updateFields()">
                <option value="" selected disabled>Choose...</option>
                @foreach($evolutions as $evolutionOption)
                    <option value="{{ $evolutionOption->id }}" 
                            data-ordre="{{ $evolutionOption->ordre }}" 
                            data-description="{{ $evolutionOption->description }}">
                        {{ $evolutionOption->libelle }}
                    </option>
                @endforeach
            </select>
            @error('libelle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="ordre">Ordre</label>
                <input type="number" name="ordre" id="ordre" class="form-control @error('ordre') is-invalid @enderror" value="{{ old('ordre') }}" readonly>
                @error('ordre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">
                    
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="filename">Fiche de description <span class="text-danger">*</span></label>
                <br>
                <input type="file" name="filename" id="filename" class="@error('filename') is-invalid @enderror">
                @error('filename')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <a type="button" class="btn btn-warning" href="{{ route('startup.show', $startupId  ) }}">
                    <i class="fa fa-ban" aria-hidden="true"></i>
                    Annuler
                </a>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fas fa-save"></i>
                    Ajouter
                </button>
            </div>
        </div>
    </div>
</form>


   
        </div>
    </div>
@endsection

<script>
     function updateFields()
        {
            var libelle = document.getElementById('libelle');
            var ordre = document.getElementById('ordre');
            var fileInputContainer = document.getElementById('file-input-container');

            var selectedOption = libelle.options[libelle.selectedIndex];
        
            if (selectedOption.value) {
                ordre.value = selectedOption.getAttribute('data-ordre');
                ordre.readOnly = true;
                fileInputContainer.style.display = 'block'; // Show file input
            } else {
                ordre.value = '';
                ordre.readOnly = false;
                fileInputContainer.style.display = 'none'; // Hide file input
            }
        }
</script>