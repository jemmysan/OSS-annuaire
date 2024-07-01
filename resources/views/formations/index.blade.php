@extends('layouts.admin')
@section('pageName')
    <a href="">  Evolution</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<div class="card p-4">
    <h2>Formations </h2>
    <br>
    <div class="d-flex">
    <div class="w-25 mr-4">
        <h5>Rubriques</h5>
        <ul class="border rounded list-group p-1 overflow-auto nav nav-pills" id="pills-tab" role="tablist" style="min-height: 50vh; max-height: 50vh;">
            @forelse ($rubriques as $index => $rubrique)
                <li class=" nav-item  nav-link ">
                    <a class=" border rounded list-group-item " id="pills-{{$rubrique->id}}-tab" data-toggle="pill" href="#pills-{{$rubrique->id}}" role="tab" aria-selected="true">
                        {{ $rubrique->libelle }}
                    </a>
                </li>
            @empty
                <small>Pas de rubriques</small>
            @endforelse
        </ul>
    </div>

    <div class="w-75 border rounded d-flex-row p-2">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="pl-2">Cours</h5>
            <form class="form-inline mr-1">
                <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <hr>
        <div class="tab-content" id="pills-tabContent">
            
            <div class="tab-pane fade show active" id="pills-{{$rubrique->id}}" role="tabpanel" aria-labelledby="pills-{{$rubrique->id}}-tab">
                    
                    <div class="list-group-item list-group-item-action my-1 border rounded">
                        <div class="d-flex w-100 justify-content-between">
                            <div>
                                <a href="#">
                                    <h5 class="mb-1 p-2 rounded" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                                       onmouseout="this.style.backgroundColor=''; this.style.color='';" style="text-transform: uppercase;">
                                        List group item heading
                                    </h5>
                                </a>
                                <p class="mb-1">Some placeholder content for the rubrique {{ $rubrique->libelle }}.</p>
                                <small>gfghfj</small>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editEvolution"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger mx-1" href="#" onclick="return confirm('Etes-vous sur de vouloir supprimer le cours ?')"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>

</div>

@endsection
