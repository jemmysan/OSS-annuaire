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
      <form method="POST" action="{{ route('add-evo-startup', $startupId) }}" enctype="multipart/form-data" id="evo-form">
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
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description_files">Fiches de description<span class="text-danger">*</span></label>
            <br>
            <input type="file" name="description_files[]" id="description_files" multiple class="@error('description_files') is-invalid @enderror" onchange="handleFileSelection()">
            <div class="border border-1 mt-2" style="max-height: 200px;">
                <div id="file-preview-container"></div>
            </div>
        </div>

        <div class="form-group">
            <a type="button" class="btn btn-warning" href="{{ route('startup.show', $startupId) }}">
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
    document.addEventListener('DOMContentLoaded', () => {
        const selectElement = document.getElementById('libelle');

        // Initial setup: disable all options except the first
        const options = selectElement.querySelectorAll('option');
        options.forEach((option, index) => {
            if (index !== 1) {
                option.disabled = true;
            }
        });

        // Function to handle the change event
        
    });
</script>




<script>
  let selectedFiles = [];

  function updateFields() {
    var libelle = document.getElementById('libelle');
    var ordre = document.getElementById('ordre');

    var selectedOption = libelle.options[libelle.selectedIndex];

    if (selectedOption.value) {
      ordre.value = selectedOption.getAttribute('data-ordre');
      ordre.readOnly = true;
    } else {
      ordre.value = '';
      ordre.readOnly = false;
    }
  }

  function handleFileSelection() {
    const fileInput = document.getElementById('description_files');
    const previewContainer = document.getElementById('file-preview-container');

    // Add newly selected files to the list
    for (let i = 0; i < fileInput.files.length; i++) {
      selectedFiles.push(fileInput.files[i]);
    }

    // Clear existing previews
    previewContainer.innerHTML = "";
    previewContainer.style.display = 'flex';
    previewContainer.style.flexDirection = 'row';
    previewContainer.style.flexWrap = 'wrap';
    previewContainer.style.overflowY = 'scroll'; // Enable vertical scroll
    previewContainer.style.maxHeight = '200px'; // Set maximum height to 300px


    // Create preview items for all selected files
    selectedFiles.forEach((file, index) => {
      const previewItem = document.createElement('div');
      previewItem.classList.add('file-preview-item');
      previewItem.style.border = '1px solid #ddd';
      previewItem.style.backgroundColor = '#f9f9f9';
      previewItem.style.margin = '5px';
      previewItem.style.padding = '5px';
      previewItem.style.display = 'flex';
      previewItem.style.alignItems = 'center';
      previewItem.style.width = 'auto';

      // Create a file name element
      const fileNameElement = document.createElement('span');
      fileNameElement.innerText = file.name;
      previewItem.appendChild(fileNameElement);

      // Create a remove button
      const removeButton = document.createElement('button');
      removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'ml-2');
      removeButton.innerText = 'X';
      removeButton.dataset.index = index;
      removeButton.addEventListener('click', handleFileRemove);
      previewItem.appendChild(removeButton);

      // Handle file preview if it's an image
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          img.classList.add('img-thumbnail', 'mb-2');
          img.style.width = '100px';
          img.style.marginRight = '10px';
          previewItem.insertBefore(img, fileNameElement);
        };
        reader.readAsDataURL(file);
      }

      previewContainer.appendChild(previewItem);
    });

    // Clear the file input value to allow re-selecting the same file
    fileInput.value = '';
  }

  function handleFileRemove(event) {
    const index = parseInt(event.target.dataset.index);

    // Remove the file from the list
    selectedFiles.splice(index, 1);

    // Refresh the preview container
    handleFileSelection();
  }

  document.getElementById('description_files').addEventListener('change', handleFileSelection);

  // Before form submission, append all selected files to a new FormData object
  document.getElementById('evo-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(this); // Create FormData from the form

    // Append files that were selected but not in the form data
    selectedFiles.forEach((file) => {
        formData.append('description_files[]', file);
    });

    // Submit the form using Fetch API
    fetch(this.action, {
        method: 'POST',
        body: formData,
    }).then(response => {
        if (response.ok) {
            window.location.href = '{{ route('startup.show', $startupId) }}';
        } else {
            alert('Error submitting the form');
        }
    }).catch(error => {
        alert('Error: ' + error.message);
    });
});

</script>
