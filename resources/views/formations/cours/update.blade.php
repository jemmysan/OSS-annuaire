

@extends('layouts.admin')

@section('pageName')
    <a href="{{ route('formation.index') }}"> Formation</a>
@endsection
@section('title')
Modification
@endsection


@section('content')
    <h2 class="p-2"> Modifier cours</h2>
    <div class="card" >
        <!-- Content Header (Page header) -->
        
        
        <div class="card-header d-flex justify-content-between align-items-center ">
            <a href="{{ route('formation.index') }}"  class="nav-link">
                <i class="fas fa-undo-alt"></i>
                Retour
            </a>

        </div>
        <div>
           

            <form method="POST" action="{{ route('cours.update', $cours->id) }}">
                @csrf
                <div class="row px-4 pt-2">
                    <div class="col-md-12">
                       

                            <div class="form-group col-md-6">
                                <label for="title">Titre <span class="text-danger">*</span></label>
                                <input type="text" id="title" value="{{ $cours->title }}" name="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="video" >Lien vidéo youtube </label>
                                <input type="link" id="video" name="video" value="{{ $cours->lien_video }}"    class="form-control">


                                
                            </div>


                            <div class="form-group">
                                
                                <textarea id="content" name="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ $cours->content }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a type="button" class="btn btn-warning" href="{{ route('formation.index') }}">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                    Annuler
                                </a>
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fas fa-save"></i>
                                    Modifier
                                </button>
                            </div>
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
 @endsection

 <script type="importmap">
    {
        "imports": 
        {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#content' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
