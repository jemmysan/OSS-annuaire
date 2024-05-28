@extends('layouts.admin')

@section('title')
    Création de role
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ajouter une nouvelle role</h3>
            <div class="card-tools">
                <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i>Toutes les roles</a>
            </div>
        </div>
        <form method="POST" action="{{ route('role.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nom du role</label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Nom de la role">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Assigner les Permissions</label>
                    <br/>
                    @foreach($permission as $value)
                        <label>
                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Crééer</button>
            </div>
        </form>


    </div>
@endsection
