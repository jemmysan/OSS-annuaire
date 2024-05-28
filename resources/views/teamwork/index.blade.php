
@extends('layouts.admin')
@section('title')
    Liste des équipes
@endsection
@section('content')
{{--    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de l'équipe</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->name}}</td>
                                    <td>
                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            <span class="label label-success">Chef d'équipe</span>
                                        @else
                                            <span class="label label-primary">Membres</span>
                                        @endif
                                    </td>
                                    <td >
                                        @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                            <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-default">
                                                <i class="fa fa-sign-in"></i> Switch
                                            </a>
                                        @else
                                            <span class="label label-default">Equipe actuelle</span>
                                        @endif

                                        <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-default">
                                            <i class="fa fa-users"></i> Membres
                                        </a>

                                        @if(auth()->user()->isOwnerOfTeam($team))

                                            <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-default" type="button">
                                                <i class="fa fa-pencil"></i> Editer
                                            </a>

                                            <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>Supprimer </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Equipes</h3>

                <form action="{{ route('teams.index') }}" method="GET" role="search">

                    <div class="input-group">

                        <input type="text" class="col-md-5"  name="nom" placeholder="Nom d'équipe" id="nom">
                        <a href="{{ route('teams.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
                <div class="card-tools">
                    <a  class="pull-right btn btn-default btn-sm" href="{{route('teams.create')}}">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>


                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>

                        <th style="width: 20%">
                            Nom de l'équipe
                        </th>
                        <th style="width: 30%">
                            Membres
                        </th>

                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td>
                            @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-default">
                                    <i class="fa fa-sign-in"></i>Changer
                                </a>
                            @else
                                <span class="label label-default">Equipe actuelle</span>
                            @endif


                                <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-default">
                                    <i class="fa fa-users"></i> Membres
                                </a>

                        </td>

                        <td class="project-state">
                            <span class="badge badge-success">
                                @if(auth()->user()->isOwnerOfTeam($team))
                                    <span class="label label-success">Chef d'équipe</span>
                                @else
                                    <span class="label label-primary">Membres</span>
                                @endif
                            </span>
                        </td>
                        <td class="project-actions text-right">

                            @if(auth()->user()->isOwnerOfTeam($team))

                                <a type="button" href="{{route('teams.edit', $team)}}" class="btn bg-teal" >
                                    <i class="fas fa-edit-"></i> Editer
                                </a>

                                <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>Supprimer </button>
                                </form>
                            @endif

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
        <!-- /.card -->


@endsection
