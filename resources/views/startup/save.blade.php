<form method="POST" action="{{url('startup/'.$startup->id)}}" class="d-flex">
    @csrf

            @php
                $statuts = DB::table('statuts')->get();
            @endphp
            <select  name="phase" id="phase"  class="form-control bi-align-center ">
                <option selected="selected" disabled>Selectionnez</option>
                @foreach ($statuts as $statut )
                    <option  value="{{$statut->libelle}}">{{$statut->libelle}}</option>  
                @endforeach
                
            </select>
    <input type="submit" class="btn btn-info float-right"  value="Ajouter">
</form>
