@extends('layouts.admin')
@section('pageName')
    <a href="{{route('startup.index')}}"> Annuaire Start-up</a>
@endsection
@section('title')
     Liste
@endsection
@section('content')

<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Lato:700);

    /* common */
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }
    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #2980b9;
    }
    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0,0,0,.1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0,0,0,.2);
        text-transform: uppercase;
        text-align: center;
    }

    /* top left*/
    .ribbon-top-left {
        top: -10px;
        left: -10px;
    }
    .ribbon-top-left::before,
    .ribbon-top-left::after {
        border-top-color: transparent;
        border-left-color: transparent;
    }
    .ribbon-top-left::before {
        top: 0;
        right: 0;
    }
    .ribbon-top-left::after {
        bottom: 0;
        left: 0;
    }
    .ribbon-top-left span {
        right: -25px;
        top: 30px;
        transform: rotate(-45deg);
    }

    .ribbon-top-right span {
        left: -25px;
        top: 30px;
        transform: rotate(45deg);
    }


    .ribbon-bottom-left span {
        right: -25px;
        bottom: 30px;
        transform: rotate(225deg);
    }


    .ribbon-bottom-right span {
        left: -25px;
        bottom: 30px;
        transform: rotate(-225deg);
    }
    div.stars {
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: 'f005';
        color: #e74c3c;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: #e74c3c;
        text-shadow: 0 0 5px #7f8c8d;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: 'f006';
        font-family: FontAwesome;
    }


    .horline > li:not(:last-child):after {
        content: " |";
    }
    .horline > li {
        font-weight: bold;
        color: #ff7e1a;

    }
    body{margin-top:20px;}
    .product-rating {
        line-height: 22px;
    }
    .product-rating i {
        color: #fc0;
        display: inline-block;
        margin-right: 2px;
        font-size: 14px;
    }
    @media screen and (max-width: 1199px) {
        .product-rating {
            margin-bottom: 5px;
            font-size: 15px;
        }
    }
    @media screen and (max-width: 767px) {
        .product-rating i {
            font-size: 13px;
        }
    }
    .boxs {
        position: relative;
        margin-bottom: 30px;
        color: #4d585f;
        background-color: white;
        filter: alpha(opacity=100);
        opacity: 1;
        -webkit-transition: opacity 0.25s ease-out;
        -moz-transition: opacity 0.25s ease-out;
        transition: opacity 0.25s ease-out;
        border-radius: 3px;
        width:300px;
    }
    .project_widget .pw_img {
        position: relative;
        overflow: hidden;
        width:280px;
        height:100%;
    }

    .project_widget .pw_img:before {
        position: absolute;
        top: 0;
        left: -75%;
        z-index: 2;
        display: block;
        content: '';
        width: 50%;
        height: 100%;
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 100%);
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 100%);
        -webkit-transform: skewX(-25deg);
        transform: skewX(-25deg)
    }

    .project_widget .pw_img:hover::before {
        -webkit-animation: shine .75s;
        animation: shine .75s
    }

    @-webkit-keyframes shine {
        100% {
            left: 125%
        }
    }

    @keyframes shine {
        100% {
            left: 125%
        }
    }

    .project_widget .pw_img img {
        border-radius: 3px 3px 0 0
    }

    .project_widget .pw_content .pw_header {
        padding: 20px;
        border-bottom: 1px solid #e6eaee
    }

    .project_widget .pw_content .pw_header h6 {
        font-size: 16px;
        margin: 0
    }

    .project_widget .pw_content .pw_header small {
        font-size: 12px
    }

    .project_widget .pw_content .pw_meta {
        padding: 20px
    }

    .project_widget .pw_content .pw_meta small,
    .project_widget .pw_content .pw_meta span {
        display: block
    }

    .project_widget .pw_content .pw_meta span {
        font-weight: 500
    }

    </style>

<div class="container">
          <h1>Annuaire des Start-up</h1>
                <div class="col-md-2" style="margin-left: 10px">


                    <div class="sticky-top mb-5" >
                        <div  style=" display: inline-block;">

                            <?php
                            use App\Models\Phase;
                            use App\Models\Startup;
                            use Illuminate\Support\Facades\DB;
                            $con = mysqli_connect("localhost","root","","projet");
                            $tag_query= "SELECT count(tags) FROM startups ";
                            $tag_query_run=mysqli_query($con,$tag_query);


                            ?>

                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-rocket"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">TOTAL</span>
                                    <span class="info-box-number">
                                    <?php
                                        $count = DB::table('startups')->count();
                                        echo $count;
                                        ?>
                                 </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">En Contact</span>
                                    <span class="info-box-number">
                                    <?php
                                        $count = Phase::select(DB::raw("count(phase)" ))
                                            ->where('phase', 'contact')
                                            ->count();
                                        echo $count;
                                        ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-house-user"></i></span>

                                <div class="info-box-content" style="width:auto ">
                                    <span class="info-box-text"> Discussion</span>
                                    <span class="info-box-number">
                                    <?php
                                        $count = Phase::select(DB::raw("count(phase)" ))
                                            ->where('phase', 'discussion')
                                            ->count();
                                        echo $count;
                                        ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pilotage</span>
                                    <span class="info-box-number">
                                    <?php
                                        $count = Phase::select(DB::raw("count(phase)" ))
                                            ->where('phase', 'pilotage')
                                            ->count();
                                        echo $count;
                                        ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Déploiement</span>
                                    <span class="info-box-number">
                                    <?php
                                        $count = Phase::select(DB::raw("count(phase)" ))
                                            ->where('phase', 'deploiement')
                                            ->count();
                                        echo $count;
                                        ?>
                                </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>

    <form action="{{ route('startup.index') }}" method="GET" role="search" style="float: right">

        <div class="input-group">
            <div id="custom-search-input">
                <div class="col-sm-12">
                    <input type="text" class="form-control"   name="nom" placeholder="Nom Start-Up" id="nom">
                </div>
            </div>

            <a href="{{ route('startup.index') }}" class=" mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refraichir">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
            </a>
        </div>
    </form>

                <div class="card-tools">
                    @can('creer_startup')

                        <a  @popper( Créer une nouvelle startup!) href="{{ route('startup.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>
                    @endcan
                        <a @popper( Importer \ Export un fichier CSV!) href="{{url('/import-export')}}" class="btn btn-sm btn-info ">
                            <i class="fas fa-file-import expo"></i> / <i class="fas fa-file-export"></i>
                        </a>

                </div>

                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-4">

                                @if($startups->count()  )

                                    @foreach($startups as $key => $startup)
                                    <div class="col">
                                    <div class="card shadow-sm">
                                        <div class="pw_img">
                                            <img class="img-responsive"  style="width:280px;height:230px; " src="{{asset('img/'.$startup->logo)}}" alt="LOGO">
                                        </div>
                                        <div class="ribbon ribbon-top-left"><span>
                                              @if(isset($startup->phase->phase))

                                                    {{$startup->phase->phase}}
                                                @else
                                                    <b> Aucun phase</b>
                                                @endif

                                                  </span>
                                        </div>
                                        <div class="card-body">
                                            <div class="pw_content" >


                                                <div class="pw_header">

                                                    <h6>{{ $startup->nom_startup }}
                                                        <i class="far fa-comments"> {{count($startup->commentaires)}}</i>
                                                    </h6>

                                                    <div class="devsite-thumbs">
                                                        @include('like', ['model' => $startup])
                                                    </div>
                                                    <i class="fas fa-phone-square"></i><small class="text-muted"> {{ $startup->coordonnee }}  <br>
                                                        <i class="fas fa-map-pin" style="color: #ff0000; size: 20px"></i> {{ $startup->adresses }} <br>
                                                        <i class="fas fa-mail-bulk" style="color: #0c63e4"></i> {{ $startup->email }}</small>
                                                </div>

                                                <div class="pw_meta">



                                                         @foreach ($startup->secteur as $secteur)
                                                        <span class="badge badge-primary">
                                                         <i class="fas fa-bookmark"> {{$secteur->secteur }}</i> <br>
                                                         </span>
                                                                 @endforeach

                                                </div>
                                                <br>
                                                <div class="line" style=" border-top: 1px solid black;
">
                                                                                                    @foreach ($startup->tag as $singleTag)
                                                        <span class="badge badge-info">#{{ $singleTag->name }}</span> <br>
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a  type="button" href="{{ route('startup.show', $startup->id  ) }}" class="btn btn-sm btn-primary"> <i class="fas fa-eye"></i></a>

                                                    @can('editer_startup')
                                                        <a href="{{ route('startup.edit', $startup->id  ) }}" class="btn btn-sm bg-teal"> <i class="fas fa-edit"></i></a>
                                                    @endcan

                                                    @can('supprimer_startup')
                                                        <a class="btn btn-sm  btn-danger" href="delete/{{$startup->id }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>

                                                    @endcan
                                                </div>
                                                <small class="text-muted">{{ $startup->date_creation }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                                    </tr>
                                @endif
                        </div>
                    </div>
                </div>


</div>

<script>
    var shareModal = document.getElementById('shareModal')
    shareModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var destinataire = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = shareModal.querySelector('.modal-title')
        var modalBodyInput = shareModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + destinataire
        modalBodyInput.value = destinataire
    })
</script>
@include('popper::assets')

   {!! $startups->links() !!}
@endsection




