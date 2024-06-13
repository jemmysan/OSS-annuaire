@extends('layouts.admin')
@section('pageName')
    <a href="{{ route('evolution') }}">  Evolution</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<div class="card p-4">
    <h2>Gestion des évolutions </h2>
    <br>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                    <!-- <i class="fas fa-landmark"></i> -->
                    <i class="bi bi-graph-up"></i>

                </span>
                <div class="info-box-content">
                    <span class="info-box-text">TOTAL</span>
                    <span class="info-box-number">
                        <?php
                            use Illuminate\Support\Facades\DB;
                            $count = DB::table('evolutions')->count();
                            echo $count;
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <form action="" method="GET" style="float: right" role="search">
            <div class="input-group">
                <div id="custom-search-input">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="nom" placeholder="Nom Structure" id="nom">
                    </div>
                </div>
                <a href="" class="mt-0">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" title="Rafraichir">
                            <span class="fas fa-sync-alt"></span>
                        </button>
                    </span>
                </a>
            </div>
        </form>
    </div>
    <div class="card-tools ">
        <a class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#createEvolution">
            <i class="fas fa-plus-circle"></i>
            Ajouter
        </a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <hr>
                <tr>
                    <th>Ordre</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($evolutions as $key=> $evolution ) 
                <tr>
                    <td>
                        <h4>{{ $evolution->ordre }}</h4>
                    </td>
                    <td>
                        {{ $evolution->libelle }}
                    </td>
                    <td>
                        {{ substr( $evolution->description, 0,  50) }} ....
                    </td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a class="btn btn-sm bg-primary mx-1" data-toggle="modal" data-target="#viewEvolution{{ $evolution->id }}"> <i class="fas fa-eye"></i></a>
                            <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editEvolution{{ $evolution->id }}"> <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm  btn-danger mx-1" href="{{ route('delete-evolution',$evolution->id ) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                     
                        <!-- Modal create evolution -->
                        <div class="modal fade" id="createEvolution" tabindex="-1" role="dialog" aria-labelledby="createEvolution" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content max-h-full">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ajout évolution</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action=" {{ route('create-evolution') }} ">
                                        @csrf
                                            <div class="modal-body">
                                                <label for="nom_structure">Libelle</label>
                                                <input type="text" value="{{old('libelle')}}"   name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" >

                                                @error('libelle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="modal-body">
                                                <label for="ordre">Ordre</label>
                                                <input type="number"  name="ordre" id="ordre" class="form-control @error('ordre') is-invalid @enderror" >

                                                @error('ordre')
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            

                                            <div class="modal-body">
                                                <label for="description"> Description</label>
                                                <textarea id="description" name="description"  class="form-control @error('description') is-invalid @enderror" rows="4"> </textarea>                                
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="modal-body">
                                                <button  class="btn btn-warning" data-dismiss="modal"> 
                                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                                </button>
                                                <button type="submit" class="btn btn-success float-right "><i class="fas fa-save"></i> </button>
                                            </div>
                                        </div>
                                    
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <!---------------------------->

                        <!-- Modal view evolution -->
                        <div class="modal fade" id="viewEvolution{{ $evolution->id }}" tabindex="-1" role="dialog" aria-labelledby="viewEvolution" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Details Evolution</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="libelle">Libelle</label>
                                        <div class="shadow-none p-3  bg-light rounded">{{ $evolution->libelle }}</div>

                                    </div>
                                    <div class="modal-body">
                                        <label for="ordre">Ordre</label>
                                        <div class="shadow-none p-3  bg-light rounded">{{ $evolution->ordre }}</div>
                                        <!-- <input type="text" class="form-control" id="ordre" value="{{ $evolution->ordre }}" readOnly> -->
                                    </div>
                                    
                                    <div class="modal-body">
                                        <label for="ordre">Description</label>
                                        <div class="shadow-lg p-3  bg-body rounded">
                                            {{ $evolution->description }}
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editEvolution{{ $evolution->id }}"> <i class="fas fa-edit"></i>
                                            Modifier
                                        </a> 
                                        <button type="button" class="btn btn-primary mx-1 btn-sm" data-dismiss="modal">
                                            Fermer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ------------------- -->


                        <!-- Modal edit evolution -->
                        <div class="modal fade" id="editEvolution{{ $evolution->id }}" tabindex="-1" role="dialog" aria-labelledby="editEvolution" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content max-h-full">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier évolution</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action=" {{ route('update-evolution',$evolution->id) }}">
                                        @csrf
                                        @method('PUT')
                                            <div class="modal-body">
                                                <label for="libelle">Libelle</label>
                                                <input type="text"  name="libelle"  value="{{$evolution->libelle}}" id="libelle" class="form-control @error('libelle') is-invalid @enderror" >

                                                @error('libelle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="modal-body">
                                                <label for="ordre">Ordre</label>
                                                <input type="number"  name="ordre"  value="{{$evolution->ordre}}" id="ordre" class="form-control @error('ordre') is-invalid @enderror" >

                                                @error('ordre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div class="modal-body">
                                                <label for="description"> Description</label>
                                                <textarea id="description" name="description"  class="form-control @error('description') is-invalid @enderror" rows="4">
                                                    {{$evolution->description}}
                                                </textarea>                                
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="modal-body">
                                                <button  class="btn btn-warning" data-dismiss="modal"> 
                                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                                    Annuler
                                                </button>
                                                <button type="submit" class="btn btn-success float-right "><i class="fas fa-save"></i>
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                @empty
                <tr>
                    <td colspan="4"><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                </tr>  
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection