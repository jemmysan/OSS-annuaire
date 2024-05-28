@extends('layouts.admin')
@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
    Importer
@endsection
@section('content')

    <div class="container mt-5 text-center">
        <form action="{{ route('import-file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-5" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Télécharger le fichier</label>
                </div>
            </div>
            <button class="btn btn-danger">Importer</button>
            <a class="btn btn-primary" href="{{ route('export-file') }}">Exporter</a>
        </form>
    </div>
@endsection
