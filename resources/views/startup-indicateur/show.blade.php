@extends('layouts.admin')
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
        <h2>Karaange</h2>
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
                <tr>
                   
                    <td>
                        Indicateur A
                    </td>

                    
                    <td>
                        15 (%)
                    </td>

                    <td>
                        <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editrubrique"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger mx-1" href="" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                        
                    </td>
                   
                    
                </tr>

                <tr>
                   
                <td>
                        Indicateur B
                    </td>

                    
                    <td>
                        15 (m)
                    </td>

                    <td>
                        <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editrubrique"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger mx-1" href="" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                        
                    </td>
                   
                </tr>
             
            </tbody>
        </table>
    </div>
</div>


@endsection
