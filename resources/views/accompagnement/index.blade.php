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

         <h2>Gestion des structure d'accompagnement </h2>
        <br>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-sitemap"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">
                                <?php
                                    use Illuminate\Support\Facades\DB;
                                    $count = DB::table('accompagnements')->count();
                                    echo $count;
                                ?>
                             </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>    

       
        <div class=" card-header ">
           <div class="w-full d-flex justify-content-between align-items-center">
                <div >
                    {{-- @can('creer_accompagnement')--}}
        
                        <a href="{{  route('accompagnement.create')  }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Ajouter</a>
                    {{-- @endcan--}}
                </div>

                
                    <form action="{{ route('search-accompagnement') }}" method="POST" role="search" style="float: right">
                        @csrf 
                        <!-- Include this line to add the CSRF token -->
                        <div class="input-group d-flex justify-items-center">
                            <div id="custom-search-input ">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="search" placeholder="Nom évolution financière" id="nom">
                                </div>
                            </div>
                            <div class="">
                                <a class="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="submit" title="Refraichir">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                            <br>
                        </div>
                    </form>
                
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
                                        <div class="btn-toolbar " role="toolbar" aria-label="Toolbar with button groups">


                                             @can('modifer_accompagnement')
                                              <a type="button" href="{{ route('accompagnement.edit', $accompagnement->id  ) }}" class="btn bg-teal mx-1"> 
                                                <i class="fas fa-edit "></i></a>
                                            @endcan

                                            @can('supprimer_accompagnement')
                                                     <a class="btn btn-sm  btn-danger mx-1 " href="{{ route('delete-accompagnement',$accompagnement->id ) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> 
                                                        <i class="fa fa-trash m-1"></i>
                                                    </a>
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
