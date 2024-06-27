@extends('layouts.admin')
@section('pageName')
    <a href="">  Evolution</a>
@endsection
@section('title')
    Liste
@endsection
@section('content')

<div class="card p-4">
    <h2>Formations </h2>
    <br>
    <div class="d-flex">
        <div class="w-25  mr-4">
        <h5>Rubriques </h5>
            <!-- <div class="min-h-50 max-h-75 border rounded list-group p-1 overflow-auto"  id="list-tab" role="tablist"> -->
            <div class="border rounded list-group p-1 overflow-auto" id="list-tab" role="tablist" style="min-height: 50vh; max-height: 50vh;">
                <a class="list-group-item list-group-item-action my-1 border rounded active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
                <a class="list-group-item list-group-item-action my-1 border rounded" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                <a class="list-group-item list-group-item-action my-1 border rounded" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                <a class="list-group-item list-group-item-action my-1 border rounded" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                <a class="list-group-item list-group-item-action my-1 border rounded" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
               
            </div>
        </div>

        <div class="w-75 border rounded d-flex-row p-2">

            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="pl-2">Cours </h5>
                <form class="form-inline mr-1">
                    <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                    <!-- <button class="btn btn-outline-primary my-1 my-sm-0" type="submit">Search</button> -->
                </form>
            </div>
           <hr>
            <div class="tab-content" id="nav-tabContent">
                <div class=" rounded list-group p-1 overflow-auto" id="list-tab" role="tablist" style="min-height: 50vh; max-height: 50vh;">
                    <div class="list-group-item list-group-item-action my-1 border rounded " id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">
                        <div class="d-flex w-100 justify-content-between">
                            <div class="">
                                <a href="">
                                <h5 data-bs-toggle="list" class="mb-1 p-2 rounded"  onmouseover="this.style.backgroundColor='#007bff'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.color='';" style="text-transform: uppercase;">List group item heading</h5></a>
                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small>
                            </div>
                            <div class="d-flex justify-content-center align-items-center ">
                                <div>

                                    <a class="btn btn-sm bg-teal mx-1" data-toggle="modal" data-target="#editEvolution"> <i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger mx-1" href="" onclick="return confirm('Etes-vous sur de vouloir supprimer le cours ?')"> <i class="fa fa-trash"></i></a>

                                </div>
                            </div>
                        </div>
                        
                    </div>     
                </div>
            
        </div>
    </div>
    <!-- <div class="d-flex">
        <div class="w-25 list-group mr-4">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                The current link item
            </a>
            <a href="#" class="list-group-item list-group-item-action">A second link item</a>
            <a href="#" class="list-group-item list-group-item-action">A third link item</a>
            <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
            <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
        </div>

        <div class="w-75 list-group ">
            ejfezkfjnjd
         </div>
    </div>
    -->
</div>


@endsection
