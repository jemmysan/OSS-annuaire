@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('formation.index') }}">  Formation</a>
@endsection
@section('title')
    Cours
@endsection
@section('content')

<div class="card p-4">
    <h2>Formations </h2>
    <br>
    <div class="d-flex">
    <div class="w-25 mr-4">
        <h5>Rubriques</h5>
        <ul class="border rounded list-group-item  p-1 overflow-auto nav nav-pills" id="pills-tab" role="tablist" style="min-height: 50vh; max-height: 50vh;">
            @forelse ($rubriques as $index => $rubrique)
                <li class="nav-item nav-link ">
                    <a class="border rounded list-group-item {{ $index === 0 ? 'active' : '' }} list-group-item-action"  id="pills-{{$rubrique->id}}-tab" data-toggle="pill" href="#pills-{{$rubrique->id}}" role="tab" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
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
            <a class="btn btn-sm btn-primary mt-2" href="{{ route('cours.create') }}">
                <i class="fas fa-plus-circle"></i>
                Ajouter cours
            </a>
        </div>
        <hr>

        <div class="tab-content" id="pills-tabContent">
            @forelse ($rubriques as $index => $rubrique)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="pills-{{$rubrique->id}}" role="tabpanel" aria-labelledby="pills-{{$rubrique->id}}-tab">
                    @forelse ($formations[$rubrique->id] ?? [] as $cours)
                        <div class="list-group-item list-group-item-action my-1 border rounded mb-3">
                            <div >
                                
                                    <div class=" d-flex w-100 justify-content-between">
                                        <a href="{{ route('cours.show', $cours->id) }}" class="w-auto">
                                            <h5 class=" mb-1 p-2 rounded" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                                            onmouseout="this.style.backgroundColor=''; this.style.color='';" style="text-transform: uppercase;">
                                                {{ $cours->title }}
                                            </h5>
                                        </a>
                                        <div class=" w-25 d-flex justify-content-end align-items-center ">
                                            <div>
                                                <a class="btn btn-sm bg-teal mx-1" href="{{ route('cours.show.update',$cours->id)}}"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger mx-1" href="{{ route('cours.delete', $cours->id) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer le cours ?')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="mb-1">{!! substr($cours->content, 0, 50) !!}</div>
                               
                                
                            </div>
                        </div>
                    @empty
                        <div class="list-group ">
                            <p class="text-primary p-2 rounded-3 list-group-item-dark">Pas de cours pour cette rubrique</p>
                        </div>
                    @endforelse
                </div>
            @empty
                <div class="tab-pane fade show active">
                    <p>Pas de contenu à afficher</p>
                </div>
            @endforelse
        </div>
    </div>
</div>



</div>

@endsection
