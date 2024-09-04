@extends('layouts.admin')
@section('retour')
<button class="btn btn-sm " style="background : white; border : 1px solid #D3D3D3">                
    <i class="bi bi-arrow-left-circle-fill text-gray"></i>
        <a class="text-gray" href="{{route('startup-indicateurs.index')}}">Retour</a>
</button>
@endsection
@section('pageName')
    <a href="">  Startup-Indicateur</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<h2 class="p-1">Indicateur de la startup</h2>
<div class="card p-4">
        
        
    <div class="d-flex justify-content-between">
        <h2>{{$indicateurs['nom_startup']}}</h2>
        <!-- <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createstartupIndicateur">
                <i class="fas fa-plus-circle"></i>
                Ajouter
        </a> -->
        <div  class=" d-flex justify-content-between align-items-center" style="float: right; width : 15%">
            <span class="mx-2"> Filtrer </span>
            <select class="custom-select @error('mesure_id') is-invalid @enderror" id="mesure_id" name="mesure_id" >
                <option value="" selected disabled>Choose...</option>            
            </select>
               
        </div>
    </div>
  
    <div class="card-body table-responsive p-0">
        <br>
        <br>
        <table class="table table-hover w-75">
           
            <tbody>
                @foreach ($indicateurs['indicateurs'] as $indicateur )
                    
                    <tr style="padding : 5px">
                    
                        <td>
                            {{ $indicateur['libelle']}}
                        </td>

                        <td>
                           <span style="border-left : 2px solid black;border-bottom : 2px solid black;border-right : 2px solid black;
                            padding-left :  10px ;
                            padding-left :  15px ; 
                            padding-bottom :  15px ;
                            padding-right :  10px ;
                            margin-top : 10px">{{ $indicateur['value']}}</span>  <span>{{ $indicateur['unite_mesure']}}</span>
                        </td>
                        

                        <td>
                            <!-- <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editrubrique"> <i class="fas fa-edit"></i></a> -->
                            <a class="btn btn-sm btn-danger mx-1" href="" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                        </td>
                    
                        
                    </tr>
                @endforeach         
            </tbody>
        </table>
    </div>
</div>


@endsection
