@extends('layouts.admin')

@section('title')
    Création de permission
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ajouter une nouvelle permission</h3>
            <div class="card-tools">
                <a href="{{ route('permission.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i>Toutes les permissions</a>
            </div>
        </div>

        <form method="POST" action="{{ route('permission.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Permission </label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Nom de la permission">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Créer</button>
            </div>
        </form>
    </div>
@endsection
