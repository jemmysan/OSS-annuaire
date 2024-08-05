@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('permission.index')}}">Permissions</a>
@endsection
@section('title')
    Permissions
@endsection
@section('content')
    <h2 class="p-1">Gestion des permissions</h2>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tableau de Permission</h3>

            <div class="card-tools">
                <a href="{{ route('permission.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Ajouter</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 ">
            <table class="table table-hover">
                <thead>
                <tr>
                   
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($permissions as $key => $permission)
                    <tr>
                        
                        <td>{{ $permission->name }}</td>
                        <td class=" align text-right d-flex flex-wrap"  >
                           <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                            <a type="button" href="{{ route('permission.edit', $permission->id) }}" class="btn btn-sm bg-teal mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                               <form action="{{action('PermissionController@destroy', $permission['id'])}}" method="POST">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" title="delete"  class="btn  bg-danger mx-2">
                                                        <i class="fas fa-trash "></i>

                                                  </button>
                                              </form>
                                          </div>

                        </td>
                    </tr>
                @empty
                    <tr>Pas de résultat</tr>
                @endforelse
                </tbody>
            </table>


        </div>
        <!-- /.card-body -->
    </div>
 {!! $permissions->links() !!}

@endsection
