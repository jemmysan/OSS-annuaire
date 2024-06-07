@extends('layouts.admin')
@section('pageName')
    <a href="{{route('financiere.index')}}">  Structure Financiere</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')



    <div class="card">
        <h2>Gestion des structure financieres </h2>
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
                            use Illuminate\Support\Facades\DB;$count = DB::table('financieres')->count();
                            echo $count;
                            ?>
                             </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
        <div class="card-header">



            <form action="{{ route('financiere.index') }}" method="GET" style="float: right"  role="search">
                <div class="input-group">
                    <div id="custom-search-input">
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="nom" placeholder="Nom Structure" id="nom">
                        </div>
                    </div>

                    <a href="{{ route('financiere.index') }}" class=" mt-2">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Rafraichir">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                    </a>
                </div>
            </form>


        </div>
        <div class="card-tools">
            {{--                @can('creer structure')--}}

            <a href="{{ route('financiere.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>
            {{--                @endcan--}}
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($financieres as $key => $financiere)

                    <tr>
                        <td>

                        <h4>{{$financiere->nom_structure}}</h4>

                        </td>
                        <td>
                            {{ substr( $financiere->description, 0,  100) }} ....

                        </td>
                        <td >
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a  type="button" href="{{ route('financiere.show', $financiere->id  ) }}" class="btn btn-sm btn-primary"> <i class="fas fa-eye"></i></a>

                                @can('modifier_financiere')
                                    <a href="{{ route('financiere.edit', $financiere->id  ) }}" class="btn btn-sm bg-teal"> <i class="fas fa-edit"></i></a>
                                @endcan

                                @can('supprimer_financiere')

                                    <a class="btn btn-sm  btn-danger" href="{{ route('delete-financement', $financiere->id ) }}" onclick="return confirm('Etes-vous sur de vouloir supprimer?')"> <i class="fa fa-trash"></i></a>

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
