@extends('layouts.admin')

@section('pageName')
  <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection

@section('title')
  Evolution-startup
@endsection

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <a href="{{ route('startup.show', $startupId) }}" class="nav-link">
        <i class="fas fa-undo-alt"></i>
        Retour
      </a>
      <h3 class="card-title"> Ajout évolution startup</h3>
    </div>
    <div>
      <form action="{{ route('add-evo-startup', $startupId) }}" id="evo-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row px-4 pt-2">
          <div class="col-md-6">
              <input type="number" name="startupId" id="startupId" class="form-control" value="{{ $startupId }}" readonly hidden>
              <label for="libelle">Libelle <span class="text-danger">*</span></label>
                <?php
                  use Illuminate\Support\Facades\DB;
                  $associatedIds = DB::table('evolution_startups')
                      ->where('startup_id', $startupId)
                      ->pluck('evolution_id');
                  $evolutions = DB::table('evolutions')
                      ->whereNotIn('id', $associatedIds)
                      ->orderBy('ordre')
                      ->get();
                ?>
                <select class="custom-select @error('libelle') is-invalid @enderror" id="libelle" name="libelle" onchange="updateFields()">
                    <option value="" selected disabled>Choose...</option>
                    @foreach($evolutions as $evolutionOption)
                        <option value="{{ $evolutionOption->id }}"
                                data-ordre="{{ $evolutionOption->ordre }}">
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
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
        <label for="filename">Fiches de description<span class="text-danger">*</span></label>
        <br>
        <div class="input-group increment">
            <input type="file" name="filename[]" class="myfrm form-control @error('filename') is-invalid @enderror">
            <div class="input-group-append">
                <button class="btn btn-outline-primary btn-add" type="button">
                    <i class="fas fa-plus-circle"></i> Ajouter
                </button>
            </div>
        </div>
        <div class="clone d-none">
            <div class="input-group mt-2">
                <input type="file" name="filename[]" class="form-control @error('filename') is-invalid @enderror" >
                <div class="input-group-append">
                    <button class="btn btn-outline-danger btn-remove" type="button">
                        <i class="fas fa-minus-circle"></i> Retirer
                    </button>
                </div>
            </div>
        </div>
        </div>

                  <div class="form-group">
                      <a type="button" class="btn btn-warning" href="{{ route('startup.show', $startupId) }}">
                          <i class="fa fa-ban" aria-hidden="true"></i>
                          Annuler
                      </a>
                      <button type="submit" class="btn btn-success float-right">
                          <i class="fas fa-save"></i>
                         Créer
                      </button>
                  </div>
              </div>
          </div>
      </form>
    </div>
  </div>
@endsection

<script>
      // disable all options except the first
      document.addEventListener('DOMContentLoaded', () => {
        const selectElement = document.getElementById('libelle');

        const options = selectElement.querySelectorAll('option');
        options.forEach((option, index) => {
            if (index !== 1) {
                option.disabled = true;
            }
        });   
    });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ajouter un nouveau champ de fichier
    document.querySelector('.btn-add').addEventListener('click', function() {
        var clone = document.querySelector('.clone').cloneNode(true);
        clone.classList.remove('d-none', 'clone');
        document.querySelector('.increment').after(clone);
    });

    // Supprimer un champ de fichier
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-remove')) {
            e.target.closest('.input-group').remove();
        }
    });

  });

</script>




