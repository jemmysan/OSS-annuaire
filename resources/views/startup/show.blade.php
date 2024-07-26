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

        
        .custom-active.active {
            color: white !important;
        }

        /************ Progess bar style *******/
        .progress-container {
            position: relative;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 15px;
            margin: 20px 0;
        }

.progress-bar {
    height: 100%;
    background-color: #e0e0e0;
    border-radius: 15px;
}

.step {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: white;
    border: 2px solid #4169E1;
    text-align: center;
    line-height: 30px;
    cursor: pointer;
}

.active-step {
    background-color: #4169E1;
    color: white;
}


/************* fvjffvfvf */
    .evolution-detail {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .filename-container {
        gap: 10px;
    }
    .filename-item {
        flex-basis: calc(33.333% - 10px);
        min-width: 150px;
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
                            <a class="nav-link active custom-active" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-selected="true">Détails</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-active" id="pills-commentaire-tab" data-toggle="pill" href="#pills-commentaire" role="tab" aria-selected="false">Commentaires <span class="badge badge-dark">{{count($startup->commentaires)}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-selected="false">Vidéo</a>
                        </li>

                        @can('edit-statut-startup')
                            <li class="nav-item">
                                <a class="nav-link custom-active" id="pills-phase-tab" data-toggle="pill" href="#pills-phase" role="tab" aria-selected="false">Statut</a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link custom-active" id="pills-phase-tab" data-toggle="pill" href="#pills-financement" role="tab" aria-selected="false">Financement</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link custom-active" id="pills-phase-tab" data-toggle="pill" href="#pills-evolution" role="tab" aria-selected="false" onclick="getStartUpEvolution({{$startup->id}});">Evolution</a>
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

                               <!------------ Evolution-Startup -------->
                               <div id="progress-container" class="progress-container">
                                    <div id="progress-bar" class="progress-bar"></div>
                                </div>
                                <div id="evolution-details-container"></div>
                               
    </div>
    
</div>

        </div>

    </div>

    

       

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
    
    <!------  Progress designing --->
    
    <script>
    async function getStartUpEvolution(id) {
        const progressContainer = document.getElementById('progress-container');
        const progressBar = document.getElementById('progress-bar');
        const detailsContainer = document.getElementById('evolution-details-container');

        if (!progressContainer || !progressBar || !detailsContainer) {
            console.error('Required elements not found in the DOM.');
            return;
        }

        try {
            const response = await fetch(`evolution/${id}`);

            if (!response.ok) {
                throw new Error('Evolutions not found');
            }

            const data = await response.json();
            const { ordre, evolutions } = data;
            console.log(data);

            // Sort the ordre array based on the 'ordre' property
            ordre.sort((a, b) => a.ordre - b.ordre);

            createProgressBar(ordre);
            displayEvolutionDetails(evolutions, ordre[0].id); // Pass the first ordre id to display its details by default
        } catch (error) {
            console.error('Error:', error);
        }

        function createProgressBar(ordres) {
            // Clear previous progress bar
            progressContainer.innerHTML = '';
            progressBar.style.width = `${100 / ordres.length}%`;

            // Create steps
            ordres.forEach((ordre, index) => {
                const stepElement = document.createElement('div');
                stepElement.classList.add('step');
                if (index === 0) {
                    stepElement.classList.add('active-step');
                }
                stepElement.style.left = `${(index * 100) / ordres.length}%`;
                stepElement.innerText = ordre.ordre; // Assuming 'ordre' has 'ordre'
                stepElement.dataset.evolutionId = ordre.id;

                // Click event listener to filter and display elements
                stepElement.addEventListener('click', () => {
                    document.querySelectorAll('.step').forEach(step => step.classList.remove('active-step'));
                    stepElement.classList.add('active-step');
                    filterEvolutionDetails(ordre.id);
                });

                progressContainer.appendChild(stepElement);
            });


        }

        function displayEvolutionDetails(evolutions, defaultEvolutionId = null) {
            detailsContainer.innerHTML = '';

            evolutions.forEach(evolution => {
            const evolutionElement = document.createElement('div');
            evolutionElement.classList.add('evolution-detail');
            evolutionElement.dataset.evolutionId = evolution.evolution_id;
            
            // Créer l'input pour la description
            const descriptionInput = `
                <div class="pb-2  h-[25%]">
                        <div id="${evolution.startup_id}" class="edit-button"  type="button"  class=" btn btn-warning  float-right">
                                        <i class="fas fa-edit "></i>
                        </div>
                </div>
                <br>
                <hr>
                
                <div class="form-group">
                    <label for="description-${evolution.evolution_id}"><strong>Description:</strong></label>
                    <input type="text" id="description-${evolution.evolution_id}" class="form-control description" value="${evolution.description}" readonly>
                </div>
            `;

                        // Créer la div pour les filenames
                        let filenamesHtml = `
                        <div class="form-group">
                        <label><strong>Filenames:</strong></label>
                        <div class="filename-container d-flex flex-wrap">
                        `;

                    // Vérifier si filename est un tableau
                    if (Array.isArray(evolution.filename)) {
                        evolution.filename.forEach(file => {
                            filenamesHtml += `
                                <input type="text" class="form-control filename-item m-1 file-desc" value="${file}" readonly>
                            `;
                        });
                    } else if (typeof evolution.filename === 'string') {
                        // Si c'est une chaîne, on l'affiche directement
                        filenamesHtml += `
                            <input type="text" class="form-control filename-item m-1 file-desc" value="${evolution.filename}" readonly>
                        `;
                    }

                    filenamesHtml += `
                            </div>
                        </div>
                    `;

                    buttonsEditDiscard = `
                        <div class="d-flex justify-content-end ">
                            <div class="w-[25]"> 
                                <div class="btn btn-sm btn-warning text-white font-bolder discard-b">Annuler</div>

                                <div class="btn btn-sm btn-success" >
                                     Enregister
                                </div>
                            </div>
                        </div>
                    `
                    
                    evolutionElement.innerHTML = descriptionInput + filenamesHtml+ buttonsEditDiscard ;
                    detailsContainer.appendChild(evolutionElement);
                });
            // console.log(evolutions);

                if (defaultEvolutionId) {
                    filterEvolutionDetails(defaultEvolutionId);
                }
            }

                function filterEvolutionDetails(evolutionId) {
                    document.querySelectorAll('.evolution-detail').forEach(detail => {
                        detail.style.display = detail.dataset.evolutionId == evolutionId ? 'block' : 'none';
                    });
                }

            
                editButton = getSelector('.edit-button');
                filesDesc = document.querySelectorAll('.file-desc')
                description = getSelector('.description');
                annuler = getSelector('.discard-b');
               
                editButton.addEventListener('click', ()=>{
                    console.log(editButton.id);
                    enableOrDesableReadOnly('desabled',description,filesDesc);
                });

                annuler.addEventListener('click',()=>{
                    enableOrDesableReadOnly('enabled',description,filesDesc);
                })


        }

        
        function getSelector(element) {
            return document.querySelector(element);
        }

        function enableOrDesableReadOnly(value,description,files){
            if(value =='desabled'){
                description.readOnly = false;
                files.forEach(file =>{
                    file.readOnly = false;
                })
            }

            if(value =='enabled'){
                description.readOnly = true;
                files.forEach(file =>{
                    file.readOnly = true;
                }) 
            }
        }

      
            
</script>















        <!-------- Remplir champs formulaire ------>
<!--- <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Handle edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            let index = this.getAttribute('data-index');
            let form = document.querySelector(`#pills-details${parseInt(index) + 1} .evolution-form`);
            let descriptionField = form.querySelector(`#description-${index}`);
            let fileField = form.querySelector(`#files-${index}`);
            let fileList = form.querySelector(`#file-list-${index}`);
            let cancelButton = form.querySelector('.cancel-btn');
            let saveButton = form.querySelector('.save-btn');

            form.style.display = 'block';
            descriptionField.removeAttribute('readonly');
            fileField.removeAttribute('disabled');
            cancelButton.style.display = 'inline-block';
            saveButton.style.display = 'inline-block';

            this.style.display = 'none';
        });
    });

    // Handle cancel button click
    document.querySelectorAll('.cancel-btn').forEach(button => {
        button.addEventListener('click', function() {
            let form = this.closest('form');
            let descriptionField = form.querySelector('textarea');
            let fileField = form.querySelector('input[type="file"]');
            let editButton = form.closest('.work-container').querySelector('.edit-btn');
            let saveButton = form.querySelector('.save-btn');

            form.style.display = 'block';
            descriptionField.setAttribute('readonly', 'readonly');
            fileField.setAttribute('disabled', 'disabled');
            this.style.display = 'none';
            saveButton.style.display = 'none';
            editButton.style.display = 'inline-block';
        });
    });

    // Handle file input change
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            updateFileList(this);
        });
    });

    // Handle remove file button click
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-file')) {
            let index = event.target.getAttribute('data-index');
            let filename = event.target.getAttribute('data-filename');
            let fileList = document.querySelector(`#file-list-${index}`);

            // Remove file item from the list
            let fileItem = event.target.closest('.file-item');
            fileItem.remove();

            // You may also want to send a request to remove the file from the server
            // Example:
            /*
            fetch('/remove-file', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ filename: filename, index: index })
            }).then(response => {
                if (response.ok) {
                    console.log('File removed');
                } else {
                    console.log('Error removing file');
                }
            });
            */
        }
    });
});

function updateFileList(input) {
    let fileList = document.querySelector(`#file-list-${input.getAttribute('data-index')}`);
    let files = input.files;

    // Clear existing list
    fileList.innerHTML = '';

    // Add selected files to the list
    Array.from(files).forEach(file => {
        let fileItem = document.createElement('div');
        fileItem.classList.add('file-item');

        let fileLink = document.createElement('a');
        fileLink.href = URL.createObjectURL(file);
        fileLink.target = '_blank';
        fileLink.textContent = file.name;
        fileItem.appendChild(fileLink);

        let removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'remove-file');
        removeButton.textContent = 'Supprimer';
        removeButton.setAttribute('data-index', input.getAttribute('data-index'));
        removeButton.setAttribute('data-filename', file.name);
        fileItem.appendChild(removeButton);

        fileList.appendChild(fileItem);
    });
}

   </script> -->
@endsection
