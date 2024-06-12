
@extends('layouts.admin')
@section('pageName')
    <a href="">Evolution</a>
@endsection
@section('title')
    Création
@endsection

@section('content')



    <div class="card" >
        <!-- Content Header (Page header) -->
        <div class="card-header">
            <h3 class="card-title">Evolution</h3>
        </div>

        <form method="POST" action="{{ route('create-evolution') }}">
            @csrf
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            <div class="form-group">
                                <label for="nom_structure">Libelle</label>
                                <input type="text" value="{{old('libelle')}}"   name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" >

                                @error('libelle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          

                            
                            <div class="form-group">
                                <label for="nom_prenom_directeur">Ordre </label>
                                <input type="number" id="ordre" value="{{old('ordre')}}"   name="ordre"  class="form-control @error('ordre') is-invalid @enderror" >

                                @error('ordre')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label for="description"> Description</label>
                                <textarea id="description" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
               
            </div>
            <div class="row p-2">
                <div class="col-12">
                    <a href=" {{ route('evolution') }} " class="btn btn-warning"> <i class="fa fa-ban" aria-hidden="true"></i>
                        Annuler</a>
                    <button type="submit" class="btn btn-success float-right "><i class="fas fa-save"></i>  Crééer</button>

                </div>
            </div>


            <!-- /.content -->
        </form>

    </div>

@endsection
