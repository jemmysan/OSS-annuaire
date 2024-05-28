@extends('layouts.admin')

@section('title')
    Création de role
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Détails</h3>
            <div class="card-tools">
                <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i>Toutes les roles</a>
            </div>
        </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nom du role</label>
                    <br>
                    {{ $role->name }}
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Permissions</label>
                    <br/>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <button class="btn btn-warning" role="button"><i class="fas fa-shield-alt"></i> {{ $v->name }}</button>
                        @endforeach
                    @endif
                </div>
            </div>




    </div>
@endsection
