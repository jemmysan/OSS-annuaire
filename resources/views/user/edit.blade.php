@extends('layouts.admin')

@section('title')
    Modification
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ajouter un utilisateur</h3>
            <div class="card-tools">
                <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i>Toutes les utilisateurs</a>
            </div>
        </div>
        <form method="POST" action="{{ route('user.update',$user->id) }}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required placeholder="Nom de la role">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">E-mail </label>
                    <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password"  id="password" class="form-control @error('password') is-invalid @enderror"  required placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="confirm-password">Confirmer le Password</label>
                    <input type="password" name="confirm-password"  id="confirm-password" class="form-control @error('confirm-password')  is-invalid @enderror"  required placeholder="Confirmez Password">
                    @error('confirm-password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Assigner le role</label>
                    <br/>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                    <br/>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Modifier </button>
            </div>
        </form>


    </div>
@endsection
