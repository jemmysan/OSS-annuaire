@extends('layouts.admin')
@section('pageName')
  
    <a href="{{route('role.index')}}">Rôles</a>
@endsection
@section('title')
    Rôles
@endsection

@section('content')
    <h2 class="p-1">Gestion des rôles</h2>
    <div class="card">

         <div class="card-header">
            <h3 class="card-title text-strong">Table des Roles </h3>
            <div class="card-tools">
                <a href="{{ route('role.create') }} "  class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Ajouter</a>

            </div>
        </div>

        <div class="card-header d-flex justify-content-between">
            <div class="w-25 ">
                <h4 class="mx-4">
                    Roles
                </h4> 
            </div>

            <div class="w-75">
                <h4 class="mx-4">

                    Permissions
                </h4>
            </div>
        </div>

        <div class="card-body  " style="height:60vh; overflow-y : scroll;">
            @forelse ($roles as $role )
                <div class="card card-info d-flex flex-row justify-content-between mx-2 mb-4 p-2">
                    <div class="w-25 d-flex justify-content-center align-items-center" style="height : 21dvh; border-right : 1px solid #E4E6E5">
                        <button class="btn bg-teal m-2" role="button">
                            <a href="{{route('user.index')}}" >
                                {{ $role->name }}
                            </a>
                        </button>
                    </div>

                    <div class="w-75 " >
                        <div class="w-100  d-flex justify-content-end " style="height : 4dvh">
        
                            <div class="d-flex">
                                <a type="button" href="{{ route('role.edit', $role->id ) }}" class="btn btn-sm bg-teal mx-2"> <i class="fas fa-edit"></i> </a>
            
                                    <form action="{{action('RoleController@destroy', $role['id'])}}" method="POST" class="">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" title="delete"  class="btn  bg-danger">
                                                            <i class="fas fa-trash "></i>
            
                                            </button>
                                    </form>
                            </div>
                        </div>
                        <div class=" p-2 mt-2" style="height : 17dvh; overflow-y : scroll">
                            @foreach ($role->permissions as $permission )
                                <button class="btn btn-warning m-2" role="button"><i class="fas fa-shield-alt"></i> {{ $permission->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>  
            @empty
                
            @endforelse
        </div>
    



        <!--<div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr> -->
<!--                    
                    <th>Role</th>
                    <th>Permission</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role )
                    <tr>
                       
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
                         <td class=" d-flex justify-content-center align-items-between">

                            
                                 <a type="button" href="{{ route('role.edit', $role->id ) }}" class="btn btn-sm bg-teal mx-2"> <i class="fas fa-edit"></i> </a>

                                <form action="{{action('RoleController@destroy', $role['id'])}}" method="POST" class="mx-2">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" title="delete"  class="btn  bg-danger">
                                                        <i class="fas fa-trash "></i>

                                        </button>
                                 </form>
                             
                         </td>
                    </tr>
                @empty
                    <tr>
                        <td><i class="fas fa-folder-open"></i> Aucun Enregistrement Trouvé</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div> -->
    </div>
 {!! $roles->links()  !!}
@endsection
