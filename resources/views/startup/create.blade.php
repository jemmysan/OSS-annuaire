@extends('layouts.admin')
@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
    Création
@endsection
@section('content')


    <style>
        .bs-example{
            margin: 50px;
        }
        .bs-example a{
            font-size: 22px;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>

    <div class="card p-2" >
        <!-- Content Header (Page header) -->
        <div class="card-header">
            <h3 class="card-title"> Nouvelle Start-Up</h3>
        </div>

        <form class="pt-2" method="POST" action="{{ route('store-startup') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">


{{--                données generale--}}

                <div class="col-md-6 ">
                    <div class="card card-primary collapsed-card ">
                        <div class="card-header">

                            <h3 class="card-title">Général</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" >

{{--                            nomstartup--}}

                            <div class="form-group">
                                <label for="nom_startup">Nom start-up <span class="text-danger">*</span></label>
                                <input type="text"  name="nom_startup" value="{{ old('nom_startup')}}"  id="nom_startup" class="form-control @error('nom_startup') is-invalid @enderror" >
                                @error('nom_startup')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>

{{--                            date creation--}}

                            <div class="form-group">
                                <label for="date_creation">Date de création <span class="text-danger">*</span></label>
                                <input type="date"  name="date_creation" value="{{ old('date_creation')}}"  id="date_creation" class="form-control @error('date_creation') is-invalid @enderror" >

                                @error('date_creation')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>

{{--                            statut juridique--}}

                            <div class="form-group">
                                <label for="statut">Statut <span class="text-danger">*</span></label>
                                <select id="statut" name="statut"  class="form-control custom-select @error('statut') is-invalid @enderror">
                                    <option selected="selected">Sélectionnez</option>
                                    <option value="SA"  {{ old('statut') == "SA"? 'selected' : '' }} >SA</option>
                                    <option value="SARL" {{ old('statut') == "SARL"? 'selected' : '' }} >SARL</option>
                                    <option value="SAS" {{ old('statut') == "SAS"? 'selected' : '' }}>SAS</option>

                                    @error('statut')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror
                                </select>
                            </div>
{{--secteur d'activite--}}



                            <div class="col-xs-12 form-group">



                            {!! Form::label('secteur', 'Secteurs d\'activité', ['class' => 'control-label']) !!}
<!--                                <button type="button" class="btn btn-primary btn-xs" id="selectbtn-secteur">
                                    Tout Selectionner                                        </button>
                                <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-secteur">
                                    Tout Déselectionner
                                </button>-->

                                {!! Form::select('secteur[]', $secteurs, old('secteur'), ['class' => 'js-example-placeholder-multiple js-states form-control ', 'id' => 'selectall-secteur']) !!}

                                    <p class="help-block"></p>
                                @if($errors->has('secteur'))
                                    <p class="help-block">
                                        {{ $errors->first('secteur') }}
                                    </p>
                                @endif
                            </div>

{{--                            tags--}}


                            <div class="col-xs-12 form-group">

                                {!! Form::label('tag', 'Tags', ['class' => 'control-label']) !!}
                               {{-- <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag">
                                    Tout Selectionner                                        </button>
                                <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag">
                                    Tout Déselectionner
                                </button>--}}
                                <span @popper(Appuyer sur Shift pour selectionner plusieurs!)> <i class="fas fa-info-circle text-danger" ></i></span>
                                {!! Form::select('tag[]', $tags, old('tag'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-tag' ]) !!}
                                <p class="help-block"></p>
                                @if($errors->has('tag'))
                                    <p class="help-block">
                                        {{ $errors->first('tag') }}
                                    </p>
                                @endif
                            </div>




{{--                            partenariat orange--}}

                            <div class="form-group">
                                <label for="partenariat_orange">Partenariat avec Orange <span class="text-danger">*</span></label>
                                <select id="partenariat_orange" name="partenariat_orange" onchange="PartOrange();" class="form-control custom-select @error('partenariat_orange') is-invalid @enderror">
                                    <option selected="selected" >Selectionnez</option>
                                    <option value="oui"  {{ old('partenariat_orange') == "oui"? 'selected' : '' }} >OUI</option>
                                    <option value="non"  {{ old('partenariat_orange') == "non"? 'selected' : '' }} >NON</option>
                                    @error('partenariat_orange')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror
                                </select>
                                  <br>
                                  <br>

                                <div class="form-group" id="leve" style="display: none">
                                    <label for="leve_fond">Levée de fonds <span class="text-danger">*</span></label>
                                    <select id="leve_fond" name="leve_fond" onchange="LFond();" class="form-control custom-select @error('leve_fond') is-invalid @enderror">
                                        <option selected="selected" >Selectionnez</option>
                                        <option value="oui"  {{ old('leve_fond') == "oui"? 'selected' : '' }} >OUI</option>
                                        <option value="non"  {{ old('leve_fond') == "non"? 'selected' : '' }} >NON</option>
                                        @error('leve_fond')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </select>
                                </div>

                                    <div class="form-group" id="form" style="display: none">
                                        <label>Levée de fonds <span class="text-danger">*</span></label>

                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{old('montant_fonds')}}" id="montant_fonds" placeholder="Montant" name="montant_fonds">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" value="{{old('date_leve_fond')}}" id="date_leve_fond" name="date_leve_fond">
                                        </div>
                                    </div>

                            </div>

{{--                            autre partenariat--}}

                            <div class="form-group">
                                <label for="autre_part">Autre partenariat:<span class="text-danger">*</span></label>
                                <select id="autre_part" name="autre_part"  class="form-control custom-select @error('autre_part') is-invalid @enderror">
                                    <option selected="selected" >Selectionnez</option>
                                    <option value="oui"  {{ old('autre_part') == "oui"? 'selected' : '' }} >OUI</option>
                                    <option value="non"  {{ old('autre_part') == "non"? 'selected' : '' }} >NON</option>
                                    @error('autre_part')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror
                                </select>

                                <br>
                                <br>
                            </div>


{{--                            fondateur--}}

                            <div class="form-group">
                                <label for="ceo_co_fondateur">Ceo/co Fondateur <span class="text-danger">*</span> </label>
                                <input type="text" id="ceo_co_fondateur"  value="{{ old('ceo_co_fondateur')}}"  name="ceo_co_fondateur"  class="form-control @error('ceo_co_fondateur') is-invalid @enderror" >

                                @error('ceo_co_fondateur')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>

{{--                            site web--}}

                            <div class="form-group">
                                <label for="site_web">Site Web</label>
                                <input type="text" id="site_web"  name="site_web" value="{{ old('site_web')}}" class="form-control">
                            </div>

{{--                            description--}}

                            <div class="form-group">
                                <label for="description"> Description <span class="text-danger">*</span></label>
                                <textarea id="description" name="description"  class="form-control @error('description') is-invalid @enderror" rows="4">
                                        {{ old('description')}}</textarea>
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

{{--                Coordonnées--}}

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
                        <div class="card-body">

{{--                            email--}}

                            <div class="form-group">
                                <label for="email">E-Mail <span class="text-danger">*</span></label>
                                <input type="email" id="email" value="{{ old('email')}}"  name="email" class="form-control @error('email') is-invalid @enderror" >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>

{{--                            localisation--}}

                            <div class="form-group">
                                <label for="adresses">Localisation <span class="text-danger">*</span></label>
                                <input type="text" id="adresses"   value="{{ old('adresses')}}"  name="adresses" class="form-control @error('description') is-invalid @enderror">

                                @error('adresses')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>


{{--                            telephone--}}

                            <div class="form-group">


                                <label for="coordonnee">Tél Fixe /Mobile <span class="text-danger">*</span></label>
                                <input type="text" id="coordonnee" name="coordonnee"   value="{{ old('coordonnee')}}" class="form-control @error('coordonnee') is-invalid @enderror" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="">
                                @error('coordonnee')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>

{{--                            auteur--}}

                            <div class="form-group" style="display: none"  >
                                <input id="user_id"  name="user_id"  value=" {{auth()->user()->name }}"  class="form-control @error('user_id') is-invalid @enderror" >
                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>

{{--                            referent--}}

                            <div class="form-group">
                                <label for="referent">Referent <span class="text-danger">*</span></label>
                                <input id="referent"  name="referent"  value=" {{ old('referent')}}"  class="form-control @error('referent') is-invalid @enderror" >


                                @error('referent')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>



{{--                medias--}}

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Médias</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

{{--                            fiche--}}

                            <div class="form-group">
                                <label for="filename"> Fiche de présentation <span class="text-danger">*</span></label>
                                <input type="file"  name="filename"  id="filename" class=" @error('filename') is-invalid @enderror">

                                @error('filename')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>

{{--                            logo--}}

                            <div class="form-group">
                                <label for="logo">Logo <span class="text-danger">*</span></label>
                                <input type="file"  name="logo"   id="logo" class=" @error('logo') is-invalid @enderror"  value="{{old('logo')}}">

                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>

{{--                            lien--}}

                            <div class="form-group">
                                <label for="video" >Lien vidéo <span class="text-danger">*</span></label>
                                <input type="link" id="video" name="video" value="{{ old('video')}}"    class="form-control @error('video') is-invalid @enderror">


                                @error('video')
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('startup.index')}}" class="btn btn-secondary"> <i class="fa fa-ban" aria-hidden="true"></i>
                        Annuler</a>

                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>  Créer </button>

                </div>
            </div>
            <!-- /.content -->
        </form>

    </div>

    @include('popper::assets')

@endsection

<script type="text/javascript">
    function PartOrange(){
        var form = document.getElementById('leve');
        var selectO= document.getElementById('partenariat_orange');



        if (selectO.value === "oui"){
            form.setAttribute('style','display: block');
        }

        else
        {
            form.setAttribute('style','display: none');
        }
    }
    function LFond(){
        var formulaire = document.getElementById('form');
        var montO = document.getElementById('montant_fonds');
        var dateO= document.getElementById('date_leve_fond');
        var select1= document.getElementById('leve_fond');



        if (select1.value === "oui" ){
            formulaire.setAttribute('style','display: block');
        }

        else
        {
            formulaire.setAttribute('style','display: none');

        }
    }



</script>
<!--
<script>
    $("#selectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","selected");
        $("#selectall-tag").trigger("change");
    });
    $("#deselectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","");
        $("#selectall-tag").trigger("change");
    });

    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<script>
    $(document).ready(function(){
        $('#secteur').CreateMultiCheckBox
        ({   width: '230px',
             height:'250px',
            defaultText : 'Selectionez votre secteur d\'activité ',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px'
        });

        $('#secteur_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"{{ route('startup.store') }}",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#secteur option:selected').each(function(){
                        $(this).prop('selected', false);
                    });
                    $('#secteur').multiselect('refresh');
                    alert(data['success']);
                }
            });
        });
    });
</script>
-->

