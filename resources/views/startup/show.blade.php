@extends('layouts.admin')
@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
  {{$startup->nom_startup}}
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/@icon/entypo@1.0.3/entypo.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

    <style type="text/css">



        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }
        .display-comment .display-comment {
        margin-left: 40px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #673AB7;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #673AB7;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #311B92
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            border: none;
            position: relative
        }



        .left-profile-card .user-profile {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: auto;
            margin-bottom: 20px;
        }

        .left-profile-card h3 {
            font-size: 18px;
            margin-bottom: 0;
            font-weight: 700;
        }

        .left-profile-card p {
            margin-bottom: 5px;
        }



        .discussion-info {
            margin-bottom: 30px;
        }

        .discussion-info .discussion-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .discussion-list li {
            margin-bottom: 5px;
        }

        .discussion-info h3 {
            margin-bottom: 10px;
        }

        .discussion-info p {
            margin-bottom: 5px;
            font-size: 14px;
        }





        .skill h3 {
            margin-bottom: 15px;
        }

        .skill p {
            margin-bottom: 5px;
        }


        .right-profile-card .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #5658db;
            font-weight: bold;
        }

        .right-profile-card .nav>li {
            float: left;
            margin-right: 10px;
        }

        .right-profile-card .nav-pills .nav-link {
            border-radius: 26px;
        }

        .right-profile-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .right-profile-card h4 {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .right-profile-card i {
            font-size: 15px;
            margin-right: 10px;
        }

        .right-profile-card .work-container {
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            padding: 10px;
        }



        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-time>span {
            display: block;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-time>span:first-child {
            font-size: 15px;
            font-weight: bold;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-time>span:last-child {
            font-size: 12px;
        }





        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label h2,
        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label p {
            color: #737881;
            font-size: 12px;
            margin: 0;
            line-height: 1.428571429;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label p+p {
            margin-top: 15px;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label h2 a {
            color: #303641;
        }

        .commentaire-centered .commentaire-entry .commentaire-entry-inner .commentaire-label h2 span {
            -webkit-opacity: .6;
            -moz-opacity: .6;
            opacity: .6;
            -ms-filter: alpha(opacity=60);
            filter: alpha(opacity=60);
        }

          
</style>


      <!-- Default box -->
<div class="card card-solid">
    <div class="container">
        <a href="{{ route('startup.index') }}" class="nav-link">
            <i class="fas fa-undo-alt"></i>
            Retour
        </a>

        <div class="row">


            <div class="col-md-3">
                <div class="card left-profile-card">
                    <div class="card-body">
                        @can('editer_startup')
                            <a  type="button" href="{{route('startup.edit', $startup->id )}}" class="btn btn-warning mx-auto float-right">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        <div class="text-center">
                            <img src="{{asset('img/'.$startup->logo)}}" alt="" class="user-profile">

                            <h3> {{$startup->nom_startup}}</h3>

                            <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-share-alt-square"></i>
                            </button>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Partager le lien</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                    {{--       <form action="{{ route('share',$startup->id) }}" method="POST">--}}
                                       <form action="#" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                                                            <div class="form-group" >
                                                        <input type="hidden" name="from" class="form-control" value="{{auth()->user()}}">
                                                        <input type="email" name="send" class="form-control" placeholder="Entrer l'email destinataire">
                                                        @error('email')
                                                <span class="text-danger"> {{ $message }} </span>
                                                        @enderror
                                                <p  name="messages" class="text-muted">
                                                <?php
                                            $url = "http://";
                                            $url.= $_SERVER['HTTP_HOST'];
                                            $url.= $_SERVER['REQUEST_URI'];
                                            $message = "Hello, </br>";
                                            $message.= " Merci de consulter ce lien qui pourrait vous intéresser :";
                                            $message.= " <b><a href='$url' target='_blank' > Cliquez-ici !</a></b>";
                                            $message.= " <br><br>";
                                            echo $message ."NB : Ceci est un robot.
                                                            <br><br> Pour des informations supplementaires, merci de contacter <br> adminecostart@orange-sonatel.com";
                                            ?>
                                                </p>
                                        @error('messages')
                                                <span class="text-danger"> {{ $message }} </span>
                                                        @enderror

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success">Envoyer</button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>

                        <div class="discussion-info">
                            <h3>Informations</h3>

                            <ul class="discussion-list">

                                <li> <i class="fas fa-link"></i>
                                    <span>
                                               Phase: <span class="badge badge-dark">

                                             @if(isset($startup->phase->phase))
                                               <p style="text-transform: capitalize">{{$startup->phase->phase}}</p>
                                            @else
                                                <p> </p>
                                            @endif

                                             </span>
                                    </span>
                                </li>
                                <li><i class="fas fa-map-marker-alt "></i><span style="align-content:center "> {{$startup->adresses}}</span></li>
                                <li> <i class="fas fa-mail-bulk" style="color: #0c63e4"></i><span> <a href="mailto: {{$startup->email}}">{{$startup->email}}</a></span></li>
                                <li><i class="fas fa-mobile "></i><span> {{$startup->coordonnee}}</span></li>
                               <span class="badge badge-pill">Secteur(s):</span>  <li>  @foreach ($startup->secteur as $secteur)
                                        <i class="fas fa-volume-down">{{ $secteur->secteur }}</i> <br>
                                         @endforeach
                                </li>

                            </ul>

                        </div>
                        <div class="discussion-info">
                            <h3>Vote</h3>
                            @include('like', ['model' => $startup])

                        </div>


                    </div>
                </div>


            </div>

            <div class="col-lg-9">

                <div class="card right-profile-card">
                    <div class="card-header p-0 pt-1">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-selected="true">Détails</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-commentaire-tab" data-toggle="pill" href="#pills-commentaire" role="tab" aria-selected="false">Commentaires <span class="badge badge-dark">{{count($startup->commentaires)}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-selected="false">Vidéo</a>
                            </li>
                            @can('edit-statut-startup')
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-phase-tab" data-toggle="pill" href="#pills-phase" role="tab" aria-selected="false">Statut</a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a class="nav-link" id="pills-phase-tab" data-toggle="pill" href="#pills-financement" role="tab" aria-selected="false">Financement</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-phase-tab" data-toggle="pill" href="#pills-evolution" role="tab" aria-selected="false">Evolution</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <!-------- details ---------->
                            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                                <div class="table-responsive">
                                    <table class="table">

                                        <tbody>

                                            <tr>
                                                <th style="width:50% ">Statut juridique:</th>
                                                <td> {{$startup->statut}} </td>
                                            </tr>
                                            <tr>
                                                <th> Ceo/co Fondateur: </th>
                                                <td>{{$startup->ceo_co_fondateur}}</td>
                                            </tr>
                                            <tr>
                                                <th> <i class="fas fa-link"></i> Site Web: </th>
                                                <td> <a href="https://{{$startup->site_web}}" target="_blank">
                                                        {{$startup->site_web}}
                                                    </a> </td>
                                            </tr>
                                            <tr>
                                                <th> <i class="fas fa-handshake"></i> Partenariat avec: </th>
                                                <td>
                                                    <div>
                                                        <ul>
                                                            @if($startup->partenariat_orange == "oui" )

                                                                <li>Orange</li>

                                                            @endif
                                                            @foreach($startup->financements as $finance)
                                                            <li>{{$finance->nom}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th> <i class="fas fa-calendar"></i> Date de création: </th>
                                                <td> {{$startup->date_creation}} </td>
                                            </tr>

                                            <tr>
                                                <th style="width:50% " >Référents:  </th>
                                                <td> {{$startup->referent}} -</td>
                                            </tr>

                                            <tr>
                                                <th style="width:50% " > <i class="fas fa-paperclip"></i>Piece Jointe:  </th>
                                                <td >

                                                    <a href="{{asset('fichier/'.$startup->filename)}}" class="btn-link text-secondary" target="_self"><i class="far fa-fw fa-file"></i> {{$startup->filename}}</a>

                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-------- description ---------->
                            <div class="tab-pane fade" id="pills-description" role="tabpanel">
                                <div class="work-container">
                                    {{$startup->description}}
                                     </div>

                            </div>

                            <!-------- commentaire ---------->
                            <div class="tab-pane fade" id="pills-commentaire" role="tabpanel">


                                <div class="card md-4">
                                        <div class="comments">
                                            @if($startup->commentaires)
                                                @foreach($startup->commentaires as $comment)
                                                  @include('comment',compact('comment'))
                                                @endforeach
                                            @else
                                                <p class="alert alert-danger">Aucun commentaire</p>
                                            @endif
                                        </div>
                                </div>
                                    <div class="card mt-5">
                                        <h5 class="card-header"> Ajouter un commentaire
                                        </h5>
                                        <div class="card-body">

                                            <form method="POST" action="{{route('commentaire.add')}}">
                                                 @csrf
                                                <input type="hidden" name="startup_id" value="{{$startup->id}}" />
                                                <textarea name="comment" value="{{ old('comment')}}" class="form-control">
                                                </textarea>
                                                <input type="submit" class="btn btn-info float-right startupCommentaire" value="Commenter">
                                            </form>
                                        </div>
                                    </div>

                            </div>

                            <!-------- video ---------->
                            <div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                                <div class="embed-responsive embed-responsive-16by9 z-depth-1">
                                    <iframe width="356" height="200" src="{{$startup->video}}" frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>

                            <!-------- details ---------->
                            <div class="tab-pane fade" id="pills-phase" role="tabpanel" aria-labelledby="pills-phase-tab">
                                           <div class="col-auto">

                                                   @include('startup.save')

                                           </div>

                            </div>

                            <!-------- financement ---------->
                            <div class="tab-pane fade" id="pills-financement" role="tabpanel" aria-labelledby="pills-financement-tab">

                                <h2>
                                    <b>Registre des Partenariats
                                        @can('ajout_partenariat')  
                                            <a type="button" onclick="Open();"  data-toggle="tooltip" data-original-title="Ajouter">
                                                <i class="fas fa-plus-circle">
                                                </i>
                                            </a>
                                        @endcan
                                    </b>
                                </h2>

                                <form method="POST" action="{{route('financement.add')}}" id="registrer" style="display: none">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nom" name="nom">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Montant" name="montant">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control"  name="date">
                                        </div>
                                        <div class="col">
                                            <input type="hidden" name="startup_id" value="{{ $startup->id }}" />
                                        </div>
                                        <div class="col">
                                            <input type="submit" class="btn btn-info float-right startupFinancement"  value="Ajouter">
                                        </div>
                                    </div>
                                </form>

                                <div class="card-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Par</th>
                                                    <th>Montant</th>
                                                    <th>Date</th>
                                                </tr>

                                            </thead>
                                           <tbody>
                                            @if($startup->partenariat_orange == "oui" && $startup->leve_fond == "oui")
                                                <td>
                                                    <span class="badge bg-gradient-info">Orange </span>
                                                </td>
                                                <td><span class="badge bg-gradient-info">{{$startup->montant_fonds}}  Fr CFA</span></td>
                                                <td> {{$startup->date_leve_fond}}
                                                </td>

                                                @endif
                                            @if($startup->financements)
                                                @foreach($startup->financements as $finance)
                                                    <tr>

                                                        <td>
                                                            <span class="badge bg-gradient-info">{{$finance->nom}} </span>
                                                        </td>
                                                        <td><span class="badge bg-gradient-info">{{$finance->montant}} Fr CFA</span></td>
                                                        <td> {{$finance->date}}
                                                        </td>
                                                    </tr>


                                                @endforeach

                                            @else

                                                <tr>
                                                    <td><i class="fas fa-folder-open"></i> Aucun Financement Trouvé</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                            </div>
                            

                            <!----- pills evolution links --->
                            <div class="tab-pane fade" id="pills-evolution" role="tabpanel" aria-labelledby="pills-evolution-tab">
                                <?php
                                    use Illuminate\Support\Facades\DB;
                                ?>
                                <div class="d-flex justify-content-between align-items-center ">
                                    
                                    <div class="d-fex  justify-content-center align-items-start">
                                        <h3 class="pt-3">
                                            Phases d'évolution
                                        </h3>
                                    </div>

                                    <a class="btn btn-sm btn-primary" href="{{ route('view-evo-startup', $startup->id) }}" >
                                        <i class="fas fa-plus-circle"></i>
                                        Ajouter
                                    </a>
                                </div>
                                <hr>
                               <!------------ reglage -------->
                               <div class="px-4">
                                    @php
                                        $associatedIds = DB::table('evolution_startups')
                                            ->where('startup_id', $startup->id)
                                            ->pluck('evolution_id');
                                            $evolutions = DB::table('evolutions')
                                            ->select('id', 'ordre', 'libelle', 'description')
                                            ->whereIn('id', $associatedIds)
                                            ->get();

                                    @endphp

                                    <div class="position-relative m-4 nav nav-pills position-relative my-4 bg-primary" id="pills-tab" role="tablist">
                                        <div class="progress" style="height: 1px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{ count($evolutions) > 0 ? 100 / count($evolutions) : 0 }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @foreach($evolutions as $index => $evolution)
                                            @php
                                                $leftPercentage = ($index / count($evolutions)) * 75;
                                            @endphp
                                            <button type="button" class=" position-absolute top-0 translate-middle btn btn-sm btn-primary rounded-pill circle-btn" style="left: {{ $leftPercentage }}%;" id="pills-details{{ $index + 1 }}-tab" data-toggle="pill" href="#pills-details{{ $index + 1 }}" role="tab" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">{{ $evolution->ordre }}</button>
                                        @endforeach
                                    </div>

                                </div>


    <div class="card-body">
        

        <div class="tab-content" id="pills-tabContent">
           

        @foreach($evolutions as $index => $evolution)
    <div class="tab-pane fade show {{ $index === 0 ? 'active' : '' }}" id="pills-details{{ $index + 1 }}" role="tabpanel" aria-labelledby="pills-details{{ $index + 1 }}-tab">
        <div class="work-container">
            @php
                $associatedEvo = DB::table('evolution_startups')
                                ->where('evolution_id', $evolution->id)
                                ->where('startup_id', $startup->id)
                                ->first();
            @endphp
            <div class="d-flex justify-content-end">
                <button class="btn btn-sm bg-warning mx-1 edit-btn" data-index="{{ $index }}">
                    <i class="fas fa-edit"></i>
                </button>
            </div>                         
            <form method="POST" action="{{ route('evolution.update', $associatedEvo->id) }}" enctype="multipart/form-data" class="evolution-form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="description-{{ $index }}">Description phase de la startup</label>
                    <textarea id="description-{{ $index }}" name="description" class="form-control" readonly>{{ $associatedEvo->description }}</textarea>
                </div>
                <div class="modal-body">
                    <label for="filename-{{ $index }}">Fichier de description</label>
                    <input type="file" id="filename-{{ $index }}" name="filename" class="form-control-file" disabled>
                    <a href="{{ url('fichier/' . $associatedEvo->filename) }}">{{ $associatedEvo->filename }}</a>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-warning cancel-btn" style="display: none;">
                        <i class="fa fa-ban"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-success save-btn" style="display: none;">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach



        </div>
    </div>
    
</div>

        </div>

    </div>

    

        <!-- Modal add evolution for startup -->
        <!-- <div class="modal fade" id="addEvolutionForStartup" tabindex="-1" role="dialog" aria-labelledby="addEvolutionForStartup" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content max-h-full">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajout évolution startup</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form method="POST" action="{{ route('add-evo-startup', $startup->id ) }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="leve_fond">Libelle <span class="text-danger">*</span></label>
                                <?php
                                    $associatedIds = DB::table('evolution_startups')
                                        ->where('startup_id', $startup->id)
                                        ->pluck('evolution_id');
                                    $evolutions = DB::table('evolutions')
                                        ->whereNotIn('id', $associatedIds)
                                        ->get();
                                ?>
                                
                                <select class="form-control custom-select @error('libelle') is-invalid @enderror" id="libelle" name="libelle" onchange="updateFields()">
                                    <option value="" selected disabled>Choose...</option>
                                    @foreach($evolutions as $evolutionOption)
                                        <option value="{{ $evolutionOption->id }}" 
                                                data-ordre="{{ $evolutionOption->ordre }}" 
                                                data-description="{{ $evolutionOption->description }}">
                                            {{ $evolutionOption->libelle }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="modal-body">
                                <label for="ordre">Ordre</label>
                                <input type="number" name="ordre" id="ordre" class="form-control @error('ordre') is-invalid @enderror" value="{{ old('ordre') }}" readOnly>
                                @error('ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="modal-body">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" readOnly>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        

                            <div class="modal-body">
                                <button class="btn btn-warning" data-dismiss="modal">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                    Annuler
                                </button>
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i>
                                    Ajouter
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
        </div> -->

</div>

    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

    <script>
        function  Open() {
                var x = document.getElementById("registrer");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }

        }

    </script>

    <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>

        <!-------- Remplir champs formulaire ------>
    <script>
        function updateFields()
        {
            var libelle = document.getElementById('libelle');
            var ordre = document.getElementById('ordre');
            var description = document.getElementById('description');
            var fileInputContainer = document.getElementById('file-input-container');

            var selectedOption = libelle.options[libelle.selectedIndex];
        
            if (selectedOption.value) {
                ordre.value = selectedOption.getAttribute('data-ordre');
                description.value = selectedOption.getAttribute('data-description');
                ordre.readOnly = true;
                description.readOnly = true;
                fileInputContainer.style.display = 'block'; // Show file input
            } else {
                ordre.value = '';
                description.value = '';
                ordre.readOnly = false;
                description.readOnly = false;
                fileInputContainer.style.display = 'none'; // Hide file input
            }
        }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('file-input-container').style.display = 'none'; // Initially hide the file input
    });

    function updateFileName(input) {
        const fileName = input.files[0].name;
        const label = input.nextElementSibling;
        label.textContent = fileName;
    }

/*********** Modifier evolution startups *******/

document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll('.edit-btn');
    var cancelButtons = document.querySelectorAll('.cancel-btn');
    var saveButtons = document.querySelectorAll('.save-btn');

    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var index = this.getAttribute('data-index');
            var form = document.querySelector(`#pills-details${parseInt(index) + 1} .evolution-form`);
            var descriptionField = form.querySelector(`#description-${index}`);
            var fileField = form.querySelector(`#filename-${index}`);
            var cancelButton = form.querySelector('.cancel-btn');
            var saveButton = form.querySelector('.save-btn');

            // Show the fields and buttons for editing
            form.style.display = 'block';
            descriptionField.removeAttribute('readonly');
            fileField.removeAttribute('disabled');
            cancelButton.style.display = 'inline-block';
            saveButton.style.display = 'inline-block';

            // Hide the edit button
            this.style.display = 'none';
        });
    });

    cancelButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var form = this.closest('form');
            var descriptionField = form.querySelector('textarea');
            var fileField = form.querySelector('input[type="file"]');
            var editButton = form.closest('.work-container').querySelector('.edit-btn');
            var saveButton = form.querySelector('.save-btn');

            // Hide the fields and buttons for editing
            form.style.display = 'block';
            descriptionField.setAttribute('readonly', 'readonly');
            fileField.setAttribute('disabled', 'disabled');
            this.style.display = 'none';
            saveButton.style.display = 'none';

            // Show the edit button
            editButton.style.display = 'inline-block';
        });
    });
});


   </script>
@endsection
