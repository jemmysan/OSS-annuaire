

@extends('layouts.admin')

@section('pageName')
    <a href="{{ route('formation.index') }}"> Formation</a>
@endsection
@section('title')
Cours
@endsection


@section('content')
    <div class="card" >
        <!-- Content Header (Page header) -->
        
        
        <div class="card-header d-flex justify-content-between align-items-center ">
            <a href="{{ route('formation.index') }}"  class="nav-link">
                <i class="fas fa-undo-alt"></i>
                Retour
            </a>
            <!-- <h3 class="card-title"> Modifier cours</h3> -->

        </div>
        <div>
           

            <form method="POST" action="{{ route('cours.update', $cours->id) }}">
                @csrf
                <div class="row px-4 pt-2">
                    <div class="col-md-12">
                       

                            <div class="form-group col-md-6">
                                <label for="title">Titre <span class="text-danger">*</span></label>
                                <input type="text" id="title" value="{{ $cours->title }}" name="title" class="form-control @error('title') is-invalid @enderror" readOnly>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <p class="" readOnly>
                                    <?php
                                    echo $cours->content;
                                    ?>
                                 <!-- {!! html_entity_decode($cours->content) !!} -->
                                </p>
                                <!-- <textarea id="content" name="content" rows="10" class="form-control @error('content') is-invalid @enderror" readOnly desabled>
                                    {!! html_entity_decode($cours->content) !!}
                                </textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>

                            
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
 @endsection


