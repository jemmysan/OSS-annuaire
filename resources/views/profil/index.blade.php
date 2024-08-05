@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('user.profil')}}">Profils</a>
@endsection
    @section('title')
     Editer
    @endsection
@section('content')
<h2 class="p-2">Gestion profil </h2>

<div class="content">
    <div class="">
        <div class="row" >
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img style="width: 200px;" class="profile-user-img img-fluid img-circle" src="{{ asset('img/avatar.jpg') }}">

                        </div>
                           <h3 class="profile-username text-center" style="text-transform: uppercase">{{ auth()->user()->name }}</h3>
                            <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4> Editer le Profil </h4>
                    </div>

                    <div class="card-body">
                        <div>
                            <div>
                                    <form class="form-horizontal" method="POST" action="{{route('user.postProfil')}}">
                                        @csrf
                                        <div class=" ">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="name"> Nom</label>
                                                    <input id="name" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="email"> Adresse E-mail</label>
                                                    <input id="email" type="email" placeholder="Adresse E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-user-edit">
                                                            Modifier
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
