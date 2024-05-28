@extends('layouts.admin')
@section('title')
    Roles
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Table des Roles </h3>
            <div class="card-tools">
                <a href="{{ route('role.create') }} "  class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>

            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Permission</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role )
                    <tr>
                        <td>
                            {{ $role->id }}
                        </td>
                        <td>
                                <a href="{{route('user.index')}}" >
                                        {{ $role->name }}
                                    </a>
                        </td>


                        <td>
                            <div class="col-2 col-m-3 align-items-stretch  "  style="width: min-content">

                                    @foreach ($role->permissions as $permission )


                                          <button class="btn btn-warning" role="button"><i class="fas fa-shield-alt"></i> {{ $permission->name }}</button>


                                  @endforeach

                            </div>


                        </td>
                         <td>

                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                                 <a type="button" href="{{ route('role.edit', $role->id ) }}" class="btn btn-sm bg-teal"> <i class="fas fa-edit"></i> </a>

                                <form action="{{action('RoleController@destroy', $role['id'])}}" method="POST">
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
    </div>
 {!! $roles->links()  !!}
@endsection
