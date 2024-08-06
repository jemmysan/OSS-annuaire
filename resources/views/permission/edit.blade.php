@extends('layouts.admin')
@section('retour')
<button class="btn btn-sm " style="background : white; border : 1px solid #D3D3D3">                
    <i class="bi bi-arrow-left-circle-fill text-gray"></i>
        <a class="text-gray" href="{{route('permission.index')}}">Retour</a>
</button>
@endsection
@section('pageName')
  
    <a href="{{route('permission.index')}}">Permissions</a>
@endsection
@section('title')
    Modifier permission
@endsection
@section('content')
   <h2 class="p-2"> Modifier permission </h2>
    <div class="card card-primary">
        <div class="card-header">
            
            <div class="card-tools">
                <a href="{{ route('permission.index') }}" class="btn btn-sm bg-teal"><i class="fas fa-shield-alt"></i> Toutes les permissions</a>
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
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Modifier </button>
            </div>
        </form>
    </div>
@endsection
