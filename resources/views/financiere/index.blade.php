@extends('layouts.admin')
@section('pageName')
    <a href="{{route('financiere.index')}}">  Structure Financiere</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')



    <h2 class="p-1">Structures financieres </h2>
    <div class="card p-2">
        <br>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-landmark"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">
                                <?php
                                    use Illuminate\Support\Facades\DB;
                                    $count = DB::table('financieres')->count();
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
                    {{--                @can('creer structure')--}}
        
                    <a href="{{ route('financiere.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Ajouter</a>
                    {{--                @endcan--}}
                </div>

                <div>

                <form action="{{ route('financiere.search') }}" method="POST" role="search" style="float: right">
                @csrf <!-- Include this line to add the CSRF token -->
                <div class="input-group bg-color-red">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="search" placeholder="Nom évolution financière" id="nom">
                        </div>
                    </div>
                    <div class="">
                        <a class="mt-1">
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


        </div>
       
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th >Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($financieres as $key => $financiere)

                    <tr>
                        <td >

                        <h5>{{$financiere->nom_structure}}</h5>

                        </td>
                        <td>
                            {{ substr( $financiere->description, 0,  100) }} ....

                        </td>
                        <td >
                            <div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                                @can('voir_financiere')
                                    <a  type="button" href="{{ route('financiere.show', $financiere->id  ) }}" class="btn btn-sm btn-primary mx-1"> <i class="fas fa-eye"></i></a>  
                                @endcan

                                @can('modifier_financiere')
                                    <a href="{{ route('financiere.edit', $financiere->id  ) }}" class="btn btn-sm bg-teal mx-1"> <i class="fas fa-edit"></i></a>
                                @endcan

                                @can('supprimer_financiere')
                                    <a class="btn btn-sm  btn-danger mx-1" href="{{ route('delete-financement', $financiere->id ) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>
                                @endcan
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


    {!! $financieres->links()  !!}

@endsection
