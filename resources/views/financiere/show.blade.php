@extends('layouts.admin')

 @section('pageName')
     <a href="{{route('financiere.index')}}">  Structure Financiere</a>
    @endsection
@section('title')
  Détails
@endsection
@section('content')
    <div>
        <a href="{{ route('financiere.index') }}" class="nav-link ">
            <i class="fas fa-undo-alt"></i>
            Retour
        </a>
    </div>
    <div class="invoice p-3 mb-2">
        <!-- title row -->

        <div class="row">
            <div class="col-10">
                <h4>
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    {{$financiere->nom_structure}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>
                        <i class="fas fa-map-marked"></i>
                        {{$financiere->adresses}}</strong>
                    <br>
                    <i class="fas fa-phone-square-alt"></i>
                    {{$financiere->coordonnee}}
                    <br>
                    <i class="fas fa-at"></i>
                    <a href="mailto:{{$financiere->email}}">
                        {{$financiere->email}}
                    </a>

                </address>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div  class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Description:</p>
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    {{ $financiere->description }}
                </p>

            </div>
            <!-- /.col -->
            <div class="col-6">
{{--                <p class="lead">  Ajouté le: {{$financiere->created_at}}</p>--}}

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                        <tr>
                            <th><i class="fas fa-link"></i> Site Web:</th>

                            <td> <a href="https://{{ $financiere->site_web }}" target="_blank">{{ $financiere->site_web }} </a>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-handshake"></i> Partenariat avec Orange: </th>

                            <td> {{$financiere->partenariat_orange}} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
@endsection
