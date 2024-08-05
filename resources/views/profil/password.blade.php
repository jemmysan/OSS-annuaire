@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('user.profil')}}">Profils</a>
@endsection
    @section('title')
     Password
    @endsection
@section('content')

<div class="content">
    <div class="">
        <div class="row" >
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4> Changer de Mot de passe </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div>
                                    <form class="form-horizontal" method="POST" action="{{route('userGetPassword')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="newpassword"> Entrez votre nouveau mot de passe</label>
                                                    <input id="newpassword" placeholder="Nouveau password" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" required>
                                                    @error('newpassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="newpassword_confirmation"> Confirmez votre nouveau mot de passe</label>
                                                    <input id="newpassword_confirmation" placeholder="Confirmer password"  type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" name="newpassword_confirmation" required>
                                                      @error('newpassword_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-lock">
                                                            Modifier Password
                                                        </i>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
