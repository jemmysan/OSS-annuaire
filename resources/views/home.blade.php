@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 100%" >
                        <img src="{{asset('img/orangefab.jpg')}}" class="d-block w-100" width="900px" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <a class="btn btn-primary" href="https://www.orangefab.sn" target="_blank">Voir plus</a>

                        </div>
                    </div>
                    <div class="carousel-item" style="height: 100%" >
                        <img src="{{asset('img/startup.png')}}"  width="900px" class="d-block w-100" alt="...">

                    </div>
                    <div class="carousel-item" style="height:100%">
                        <img src="{{asset('img/financiere.png')}}" class="d-block w-100" width="900px" alt="...">

                    </div>
                    <div class="carousel-item" style="height: 100%">
                        <img src="{{asset('img/creation.jpg')}}" class="d-block w-100" width="900px" alt="...">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précedent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
        <br>

        <!-- /.row -->
        <!-- Call to Action Well -->
        <div class="card text-white bg-secondary my-5 py-4 text-center" style="background-image:url({{asset('img/font.png')}}); width: 100% ;color: #d6e9f8">
            <div class="card-body" >
                <p class="text-white m-0">
                    STARTUPS ET STRUCTURES
                </p>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100"  style="background-image:url({{asset('img/fontstart.png')}}); width: 100% ; color: #d6e9f8">
                    <div class="card-body">
                        <h3 class="card-title"> Start-Up :
                        </h3>

                        <p class="card-text" >

                            Les startups aujourd’hui créent de la richesse et sont au centre meme des stratégies économiques de plusieurs organismes internationaux.
                        </p>
                    </div>

                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100" style="background-image:url({{asset('img/fonaccomp.png')}}); width: 100% ;color: #022945" >
                    <div class="card-body">
                        <h2 class="card-title">Structure Accompagnement :
                            </h2>
                        <p class="card-text">
                            Les incubateurs et accélérateurs de startups sont des structures qui proposent généralement un hébergement et un accompagnement de vos projets
                            </p>
                    </div>

                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100" style="background-image:url({{asset('img/fonfinance.png')}}); width: 100% ;color: #d6e9f8">
                    <div class="card-body" >
                        <h2 class="card-title">Structure Financiere </h2>
                        <p class="card-text">
                     Le financement de l’entreprise et le soutien financier à long terme sont les deux piliers importants pour le succès de n’importe quelle start-up.
                        </p>
                    </div>

                </div>
            </div>
            <!-- /.col-md-4 -->

        </div>

        <!-- /.row -->

    </div>



@endsection
