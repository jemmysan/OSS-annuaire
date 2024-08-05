@extends('layouts.admin')
@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
    Importer/Export
@endsection
@section('content')


<h2 class="p-2">Import/Export startup </h2>


<div class="container mt-5 text-center">
    <form action="{{ route('import-file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5" style="max-width: 500px; margin: 0 auto;">
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile" onchange="updateFileName(this)">
                <label class="custom-file-label" for="customFile">
                    @isset($fileName)
                        {{ $fileName }}
                    @else
                        Télécharger le fichier
                    @endisset
                </label>
            </div>
        </div>
        @if ($errors->has('file'))
            <div class="text-danger mt-3">{{ $errors->first('file') }}</div>
        @endif
        @if (session('fileName'))
            <div class="text-success mt-3">Fichier sélectionné : {{ session('fileName') }}</div>
        @endif
        <button class="btn btn-danger">Importer</button>
        <a class="btn btn-primary" href="{{ route('export-file') }}">Exporter</a>
    </form>
</div>


<script>
    function updateFileName(input) {
        const fileName = input.files[0].name;
        const label = input.nextElementSibling;
        label.textContent = fileName;
    }
</script>


@endsection



