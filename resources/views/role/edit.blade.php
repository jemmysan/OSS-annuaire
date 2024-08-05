@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('role.index')}}">Rôles</a>
@endsection
@section('title')
    Modification
@endsection
@section('content')
    <h2 class="p-1">Modifier rôle</h2>

    <div class="card card-primary" style="height: 75vh;">
        <div class="card-header">
           
            <div class="card-tools">
                <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> Toutes les roles</a>
            </div>
        </div>
        <form method="POST" action="{{ route('role.update',$role->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nom du role</label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" required placeholder="Nom de la role">
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
                    <div class="card card-info p-4" style="height:42dvh; overflow-y: scroll;">

                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card-footer mt-2">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Ajouter</button>
            </div>
        </form>


    </div>
@endsection
