

@extends('layouts.admin')
@section('retour')
<button class="btn btn-sm " style="background : white; border : 1px solid #D3D3D3">                
    <i class="bi bi-arrow-left-circle-fill text-gray"></i>
        <a class="text-gray" href="{{route('formation.index')}}">Retour</a>
</button>
@endsection
@section('pageName')

    <a href="{{ route('formation.index') }}"> Formation</a>
@endsection
@section('title')
Voir-cours
@endsection


@section('content')
    <h2 class="p-1">Voir cours</h2>
    <div class="card" >
        <!-- Content Header (Page header) -->
        
        
          
        <div>
           

            <form method="POST" action="{{ route('cours.update', $cours->id) }}">
                @csrf
                <div class="row px-4 pt-2 ">
                    <div class="col-md-12  mb-2">
                       

                            <div class="form-group  ">
                                <label for="title">Titre <span class="text-danger">*</span></label>
                                <div class="d-flex justify-content-between">

                                    <div class="w-auto">

                                        <input type="text" id="title" value="{{ $cours->title }}" name="title" class="form-control @error('title') is-invalid @enderror" readOnly>
                                    </div>

                                    <div class=" md-col-20 d-flex justify-content-between align-items-center ">
                                        <!-- <a href="{{ $cours->lien_video }}" class="nav-link">
                                            <i class="fas fa-video"> Lien vidéo youtube</i>
                                           
                                
                                        </a> -->
                                        <div  class="nav-link bg-blue m-2 cours" style="border-radius : 5px">
                                            <i class="bi bi-book"></i>
                                        </div>
                                        <div  class="nav-link bg-blue video" style="border-radius : 5px">
                                            <i class="fas fa-video video"> Vidéo cours</i>
                                        </div>
                                    </div>
                                </div>
    

                            </div>

                            <div class="form-group " >
                                <div class="cours-content">

                                    <p class="" readOnly >
                                    {!! $cours->content !!}
                                    </p>
                                </div>
                                <iframe class="frame-video" style="width:100%; height:80dvh" src="{{ $cours->lien_video }}" frameborder="0" title="Youtube cours"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media" allowfullscreen>
                                </iframe>
                                
                            </div>

                            
                       
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>


       const viewVid = document.querySelector('.video');
       const cours = document.querySelector('.cours');

       const frameVid = document.querySelector('.frame-video');
       const coursContent = document.querySelector('.cours-content');

       frameVid.style.display = 'none';

            viewVid.addEventListener('click', () => {
                frameVid.style.display = 'block';
                coursContent.style.display = 'none';
                
            });

            cours.addEventListener('click', () => {
                coursContent.style.display = 'block';
                frameVid.style.display = 'none';
            });
        
    </script>
 @endsection



