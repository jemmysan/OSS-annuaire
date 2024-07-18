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

            <div class="form-group ">
              <label for="description_files">Fiches de description <span class="text-danger">*</span></label>
              <br>
              <input type="file" name="description_files[]" id="description_files" multiple class="@error('description_files') is-invalid @enderror" onchange="handleFileSelection()">
              <div class="border border-1  mt-2" style="max-height: 200px; overflow-y: auto;">
    
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

  // Clear existing previews on every file selection
  previewContainer.innerHTML = "";
  previewContainer.style.display = 'flex';
  previewContainer.style.flexDirection = 'col';
  previewContainer.style.flexWrap = 'wrap'; // Enable wrapping of elements
  previewContainer.style.overflow = 'hidden'; // Hide overflow

  const files = fileInput.files;

  if (!files.length) {
    return; // No files selected, exit the function
  }

  for (let i = 0; i < files.length; i++) {
    const file = files[i];

    // Create a preview item for each file
    const previewItem = document.createElement('div');
    previewItem.classList.add('file-preview-item');
    previewItem.style.border = '1px solid #ddd'; // Add border
    previewItem.style.backgroundColor = '#f9f9f9'; // Add background color
    previewItem.style.margin = '5px'; // Add margin
    previewItem.style.paddingLeft = '5px'; // Add margin

    
    previewItem.style.display = 'flex'; // Use flexbox for layout
    previewItem.style.alignItems = 'center'; // Center items vertically
    previewItem.style.width = 'auto'; // Set width to auto

    // Create a file name element
    const fileNameElement = document.createElement('span');
    fileNameElement.innerText = file.name;
    previewItem.appendChild(fileNameElement);

    // Create a remove button
    const removeButton = document.createElement('button');
    removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'ml-2');
    removeButton.innerText = 'X';
    removeButton.dataset.index = i; // Store file index for removal
    removeButton.addEventListener('click', handleFileRemove); // Attach remove event listener
    previewItem.appendChild(removeButton);

    // Handle file preview if it's an image
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('img-thumbnail', 'mb-2');
        img.style.width = '100px'; // Set image width
        img.style.marginRight = '10px'; // Add margin to the right
        previewItem.insertBefore(img, fileNameElement); // Insert image before filename
      };
      reader.readAsDataURL(file);
    }

    previewContainer.appendChild(previewItem);
  }
}

function handleFileRemove(event) {
  const fileInput = document.getElementById('description_files');
  const previewContainer = document.getElementById('file-preview-container');
  const index = parseInt(event.target.dataset.index); // Get file index from button data

  // Remove the preview item from the DOM
  previewContainer.removeChild(previewContainer.children[index]);

  // Create a new DataTransfer object to hold the remaining files
  const dt = new DataTransfer();
  for (let i = 0; i < fileInput.files.length; i++) {
    if (i !== index) {
      dt.items.add(fileInput.files[i]);
    }
  }

  // Update the file input's files with the new FileList
  fileInput.files = dt.files;
}

document.getElementById('description_files').addEventListener('change', handleFileSelection);

</script>
