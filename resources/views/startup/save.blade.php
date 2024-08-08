<form method="POST" action="{{url('startup/'.$startup->id)}}" class="d-flex">
    @csrf

        <select  name="phase" id="phase"  class="form-control bi-align-center ">
            <option selected="selected" disabled>Selectionnez</option>

            <option  value="Contact">Contact</option>
            <option  value="Discussion">Discussion</option>
            <option  value="Pilotage">Pilotage</option>
            <option  value="Deploiement">Deploiement</option>
        </select>
    <input type="submit" class="btn btn-info float-right"  value="Ajouter">
</form>
