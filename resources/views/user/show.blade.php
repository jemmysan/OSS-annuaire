@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('user.index')}}">Utilisateurs</a>
@endsection
@section('title')
    Détails
@endsection
@section('content')
    <h2 class="p-2">Détails utilisateur</h2>
    <div class="card card-primary col-6 pt-1 " style="align-content: center">
        <div class="card-header ">
            <h3 class="card-title">Détails</h3>
            <div class="card-tools">
                <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> Tous les utilisateurs</a>
            </div>
        </div>


            <div class="card-body">
               <p>
                <label for="name">Nom</label>
                    {{ $user->name }}
               </p>
                <p>
                    <label for="email">E-mail </label>
                    {{ $user->email }}
                </p>
                <p>
                    <label>Assigner le role</label>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </p>
            </div>
    </div>
@endsection
