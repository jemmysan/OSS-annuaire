
@extends('layouts.admin')
@section('pageName')
    <a href="{{route('accompagnement.index')}}">  Structure d'accompagnement</a>
@endsection
@section('title')
Création
@endsection

@section('content')


    <div class="card" >
        <!-- Content Header (Page header) -->
        <div class="card-header">
            <h3 class="card-title"> Creation d'une structure d'accompagnement</h3>

            <div class="card-tools">
                <a href="{{ route('accompagnement.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>
            </div>
        </div>

        <form method="POST" action="{{ route('accompagnement.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Général</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            <div class="form-group">
                                <label for="nom_structure">Nom de la structure</label>
                                <input type="text"  name="nom_structure" id="nom_structure" class="form-control @error('nom_structure') is-invalid @enderror" >

                                @error('nom_structure')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse E-Mail</label>
                                <input type="email" id="email"  name="email"  class="form-control @error('email') is-invalid @enderror" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="partenariat_orange">Partenariat avec Orange </label>
                                <select id="partenariat_orange" name="partenariat_orange" class="form-control custom-select @error('partenariat_orange') is-invalid @enderror">
                                    <option selected="selected" >Selectionnez</option>
                                    <option value="oui" >OUI</option>
                                    <option value="non">NON</option>
                                    @error('partenariat_orange')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="nom_prenom_directeur">Directeur </label>
                                <input type="text" id="nom_prenom_directeur"  name="nom_prenom_directeur"  class="form-control @error('nom_prenom_directeur') is-invalid @enderror" >

                                @error('nom_prenom_directeur')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="site_web">Site Web</label>
                                <input type="text" id="site_web"  name="site_web" class="form-control @error('site_web') is-invalid @enderror">
                                @error('site_web')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="description"> Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
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
                <div class="col-md-6">
                    <div class="card card-secondary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Coordonnées</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            <div class="form-group">
                                <label for="adresses">Adresse</label>
                                <input type="text" id="adresses"   name="adresses" class="form-control @error('description') is-invalid @enderror">

                                @error('adresses')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="coordonnee">Tel/Fax</label>
                                <input type="tel" id="coordonnee" name="coordonnee" class="form-control @error('description') is-invalid @enderror">

                                @error('coordonnee')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{route('accompagnement.index')}}" class="btn btn-sm btn-secondary"> <i class="fa fa-ban" aria-hidden="true"></i>
                        </a>
                    <button type="submit" class="btn btn-sm btn-success float-right "><i class="fas fa-save"></i> </button>

                </div>
            </div>


            <!-- /.content -->
        </form>

    </div>
@endsection
