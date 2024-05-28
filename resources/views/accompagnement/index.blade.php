@extends('layouts.admin')

@section('pageName')
    <a href="{{route('accompagnement.index')}}">  Structure d'accompagnement</a>
@endsection
@section('title')
Liste
@endsection
@section('content')

    <div class="card">
         <div class="card-body" >

                <form action="{{ route('accompagnement.index') }}" method="GET" role="search">

                    <div class="input-group">

                     <input type="text" class="col-md-5"  name="nom" placeholder="Nom Structure" id="nom">
                        <a href="{{ route('accompagnement.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>

        <div class="card-header">
            <h3 class="card-title">Tableau des structures d'accompagnements</h3>

            <div class="card-tools">
                @can('creer_accompagnement')
                <a href="{{ route('accompagnement.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>
                @endcan
{{--                    <a class="btn btn-sm btn-warning" href="{{ route('export') }}"> <i class="fas fa-file-csv"></i></a>--}}

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">

            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead class=" table table-head-fixed text-nowrap">
                    <tr>
                        <th>Nom de la structure</th>
                        <th>Description</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                        @if($data->count())
                            @foreach($data as $key => $accompagnement)
                                  @if(auth()->user()->id == $accompagnement->user_id)

                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td> <i class="right fas fa-angle-left"></i> &nbsp &nbsp &nbsp {{ $accompagnement->nom_structure }}</td>

                                    <td class="text-truncate" style="max-width: 500px;">
                                           {{$accompagnement->description}}
                                    </td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">


                                             @can('editer_accompagnement')
                                              <a type="button" href="{{ route('accompagnement.edit', $accompagnement->id  ) }}" class="btn bg-teal"> <i class="fas fa-edit"></i></a>
                                            @endcan

                                            @can('supprimer_accompagnement')
                                                     <a class="btn btn-sm  btn-danger" href="delete/{{$accompagnement->id }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>


                                                     </form>
                                            @endcan
                                             </div>
                                     </td>



                                    </tr>

                                <tr class="expandable-body d-none">

                                    <td colspan="5">
                                        <p style="display: none;">
                                           <strong>Site web :</strong>
                                            <a href="https://{{ $accompagnement->site_web }}" target="_blank">{{ $accompagnement->site_web }} </a>
                                            <br>
                                            <strong>Directeur: </strong>{{ $accompagnement->nom_prenom_directeur }}
                                            <br> <strong>Partenariat avec Orange: </strong>{{ $accompagnement->partenariat_orange }}
                                            <br>
                                            <strong> Adresse E-mail :</strong><a href="mailto:{{$accompagnement->email}}">
                                                {{$accompagnement->email}}
                                            </a>
                                            <br>
                                            <strong>Adresse:  </strong>{{ $accompagnement->adresses }}
                                            <br>
                                            <strong>Tel Fixe/Mobile:</strong> {{ $accompagnement->coordonnee }}
                                            <br>
                                            <strong>Description : </strong>{{ $accompagnement->description }}
                                        </div>
                                            <br>
                                            <strong>Référents:</strong>
                                            {{ $accompagnement->user->name }}


                                    </p>
                                    </td>

                                </tr>
                                @endif
                            @endforeach
                            @else
                                <tr>
                                    <td><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                                </tr>
                            @endif
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    </div>
    {!! $data->links()  !!}



@endsection
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
</script>
