@extends('layouts.admin')

@section('title')
    Utilisateurs
@endsection
@section('content')
    <div class="card">

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number">
                                <?php
                            use App\Models\User;use Illuminate\Support\Facades\DB;use Spatie\Permission\Models\Role;
                            $count = DB::table('users')->count();
                            echo $count;
                            ?>
                             </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Administrateur</span>
                        <span class="info-box-number">
                                <?php

                            $count = DB::table('roles')
                                ->select('count(*)')
                                ->where('name', 'Administrateur')
                                ->count();
                            echo $count;
                            ?>
                            </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-house-user"></i></span>

                    <div class="info-box-content" style="width:auto ">
                        <span class="info-box-text"> INTERNE</span>
                        <span class="info-box-number">
                                <?php
                            $count = DB::table('roles')
                                ->select('count(*)')
                                ->where('name', 'like','Interne%')
                                ->count();
                            echo $count;
                            ?>
                            </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">EXTERNE</span>
                        <span class="info-box-number">
                                <?php
                            $count = DB::table('roles')
                                ->select('count(*)')
                                ->where('name','like', 'Externe%')
                                ->count();
                            echo $count;
                            ?>
                            </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="card-header">
            <h3 class="card-title">Gestion des utilisateurs</h3>

            <div class="card-tools">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>
            </div>

            <form action="{{ route('user.index') }}" method="GET" role="search">

                    <div class="input-group">

                     <input type="text" class="col-md-5" style="float: right" name="nom" placeholder="Nom  de l'utilisateur" id="nom">

                        <a href="{{ route('user.index') }}" class=" mt-2">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Rafraichir">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($data as $key => $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                  <a href="{{route('role.index')}}"><label class="badge badge-success">{{ $v }}</label></a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                             <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <a  type="button" href="{{ route('user.show', $user->id ) }}" class="btn bg-teal"> <i class="fas fa-eye"></i></a>
                                <a href="{{ route('user.edit', $user->id  ) }}" class="btn btn-primary"> <i class="fas fa-edit"></i></a>

                                 <form action="{{action('UserController@destroy', $user['id'])}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" title="delete"  class="btn  bg-danger">
                                                        <i class="fas fa-trash "></i>

                                        </button>
                                 </form>
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
        {!! $data->links() !!}

@endsection
