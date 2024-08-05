@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('formation.index') }}">Formation</a>
@endsection
@section('title')
    Cours
@endsection
@section('content')

<h2 class="p-1">Gestion des formations</h2>
<div class="card p-4">
    <br>
    <div class="d-flex">
        <div class="w-25 mr-4">
            <h5>Rubriques</h5>
            <ul class="border rounded list-group-item p-1 overflow-auto nav nav-pills" id="rubriques-list" style="min-height: 50vh; max-height: 50vh;">
                @forelse ($rubriques as $index => $rubrique)
                    <li class="nav-item nav-link" >
                        <a id="rubrique-{{ $rubrique->id }}" class="border rounded list-group-item  list-group-item-action" 
                           role="tab" data-rubrique-id="{{ $rubrique->id }}">
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

            <div id="rubrique-cours" >
                <div class="  border-radius-2 d-flex justify-content-center align-items-center" style="background :rgba(179, 229, 252, 0.2); color : blue; border-radiux:20px">
                    <h6>
    
                        Sélectionnez une rubrique pour afficher les cours.
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const formations = @json($formations);

    document.addEventListener('DOMContentLoaded', function() {
        const rubriquesList = document.getElementById('rubriques-list');
        const rubriqueLinks = rubriquesList.querySelectorAll('a');

        rubriqueLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove 'active' class from all rubriques
                rubriqueLinks.forEach(rubriqueLink => rubriqueLink.classList.remove('active'));

                // Add 'active' class to the clicked rubrique
                this.classList.add('active');

                // Get rubrique ID
                const rubriqueId = this.getAttribute('data-rubrique-id');
                getRubriqueId(rubriqueId);
            });
        });
    });

    function getRubriqueId(id) {
        const coursesContainer = document.getElementById('rubrique-cours');
        coursesContainer.innerHTML = '';

        if (!formations[id] || formations[id].length === 0) {
            coursesContainer.innerHTML = '<div class="list-group"><p class="text-primary p-2 rounded-3 list-group-item-dark">Pas de cours pour cette rubrique</p></div>';
            return;
        }

        formations[id].forEach(cours => {
            const courseElement = document.createElement('div');
            courseElement.classList.add('list-group-item', 'list-group-item-action', 'my-1', 'border', 'rounded', 'mb-3');
            courseElement.innerHTML = `
                <div>
                    <div class="d-flex w-100 justify-content-between">
                        <a href="cours/show/${cours.id}" class="w-auto">
                            <h5 class="mb-1 p-2 rounded" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';" onmouseout="this.style.backgroundColor=''; this.style.color='';" style="text-transform: uppercase;">
                                ${cours.title}
                            </h5>
                        </a>
                        <div class="w-25 d-flex justify-content-end align-items-center">
                            <div>
                                <a class="btn btn-sm bg-teal mx-1" href="cours/update/${cours.id}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger mx-1" href="cours/delete/${cours.id}" onclick="return confirm('Etes-vous sur de vouloir supprimer le cours ?')"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">${cours.content.substring(0, 50)}</div>
                </div>
            `;
            coursesContainer.appendChild(courseElement);
        });
    }
</script>

@endsection
