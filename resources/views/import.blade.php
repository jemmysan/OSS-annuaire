@extends('layouts.admin')
@section('title')
    Import/ export Structure d'accompagnement
@endsection
@section('content')
    <div class="container">
        <div class="card bg-light mt-3">

            <div class="card-body">

                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                    <a class="btn btn-success" href="{{ route('export') }}">Export data</a>
                </form>
            </div>
        </div>
    </div>
@endsection
