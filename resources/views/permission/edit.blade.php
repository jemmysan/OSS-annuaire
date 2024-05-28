@extends('layouts.admin')

@section('title')
    Création de permission
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Modifier la permission</h3>
            <div class="card-tools">
                <a href="{{ route('permission.index') }}" class="btn btn-sm bg-teal"><i class="fas fa-shield-alt"></i>Toutes les permissions</a>
            </div>
        </div>


        <form method="POST" action="{{ route('permission.update',$permission->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Permission </label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}"  required>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> </button>
            </div>
        </form>
    </div>
@endsection
