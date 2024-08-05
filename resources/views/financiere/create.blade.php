
@extends('layouts.admin')
@section('pageName')
    <a href="{{route('financiere.index')}}">  Structure Financiere</a>
@endsection
@section('title')
    Création
@endsection

@section('content')


    <h2 class="p-1">Créer structure financiere </h2>

    <div class="card" >
        <!-- Content Header (Page header) -->
        <div class="card-header">
            <h3 class="card-title">Structure financière </h3>
        </div>

        <form method="POST" action="{{ route('financiere.store') }}">
            @csrf
            <div class="row p-2" style="height: 64dvh">
                <div class="col-md-6" >
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Général</h3>
                            
                        </div>
                        <div class="card-body" style="height: 56dvh; overflow-y : scroll" >
                            <div class="form-group">
                                <label for="nom_structure">Nom de la structure</label>
                                <input type="text" value="{{old('nom_structure')}}"   name="nom_structure" id="nom_structure" class="form-control @error('nom_structure') is-invalid @enderror" >

                                @error('nom_structure')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse E-Mail</label>
                                <input type="email" id="email"  name="email" value="{{old('email')}}"   class="form-control @error('email') is-invalid @enderror" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group" id="d1">
                                <label for="partenariat_orange">Partenariat avec Orange </label>
                                <select id="partenariat_orange" name="partenariat_orange"  class="form-control custom-select @error('partenariat_orange') is-invalid @enderror">
                                    <option selected="selected" >Selectionnez</option>
                                    <option value="oui"  {{ old('partenariat_orange') == "oui"? 'selected' : '' }} >OUI</option>
                                    <option value="non"  {{ old('partenariat_orange') == "non"? 'selected' : '' }} >NON</option>

                                    @error('partenariat_orange')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="nom_prenom_directeur">Directeur </label>
                                <input type="text" id="nom_prenom_directeur" value="{{old('nom_prenom_directeur')}}"   name="nom_prenom_directeur"  class="form-control @error('nom_prenom_directeur') is-invalid @enderror" >

                                @error('nom_prenom_directeur')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="site_web">Site Web</label>
                                <input type="text" id="site_web"  name="site_web"  value="{{old('site_web')}}" class="form-control @error('site_web') is-invalid @enderror">
                                @error('site_web')
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
                <div class="col-md-6">
                    <div class="card card-secondary ">
                        <div class="card-header">
                            <h3 class="card-title">Coordonnées</h3>

                           
                        </div>
                        <div class="card-body" >
                            <div class="form-group">
                                <label for="adresses">Adresse</label>
                                <input type="text" id="adresses" value="{{old('adresses')}}"   name="adresses" class="form-control @error('description') is-invalid @enderror">

                                @error('adresses')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="coordonnee">Tel/Fax</label>
                                <input type="tel" id="coordonnee"  value="{{old('coordonnee')}}" name="coordonnee" class="form-control @error('description') is-invalid @enderror">

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
            <div class="p-2">
                
                    <a href="{{route('financiere.index')}}" class="btn btn-warning"> <i class="fa fa-ban" aria-hidden="true"></i>
                        Annuler</a>
                    <button type="submit" class="btn btn-success float-right "><i class="fas fa-save"></i>  Créer</button>

                
            </div>


            <!-- /.content -->
        </form>

    </div>

@endsection
