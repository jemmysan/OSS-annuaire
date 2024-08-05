@extends('layouts.admin')
@section('pageName')
    <a href="{{route('user.index')}}"> Utilisateurs</a>
@endsection
@section('title')
    Création
@endsection
@section('content')
    <h2 class="p-2">Ajout utilisateur</h2>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Nouvelle utilisateur</h3>
            <div class="card-tools">
                <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> Tous les roles</a>
            </div>
        </div>

        <div class="card-body" style="margin-top: 25px">
            <div class="">
                <form action="{{ route('user.store') }}" method="POST" role="form" class="php-email-form pb-4">

                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nom</label>
                            <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" required placeholder="Nom">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" name="email"  id="email" class="form-control @error('email') is-invalid @enderror"  required placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password"  id="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirm-password">Confirmer le Password</label>
                        <input type="password" name="confirm-password"  id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror"  required placeholder="Confirmez Password">
                        @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Assigner le role</label>
                        <br/>
                        {!! Form::select('roles[]', $role,[], array('class' => 'form-control select','multiple')) !!}

                        <br/>

                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ajouter</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        $(".select").select2({
            maximumSelectionLength: 4
        });
    </script>
@endsection
