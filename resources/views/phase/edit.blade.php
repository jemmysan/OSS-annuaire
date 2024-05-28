

<form method="POST" action="{{url('startup/'.$startup->id)}}">
    @csrf
    @method("PUT")
    <select  name="phase" id="phase"  class="form-control custom-select">
        <option  value="Contact"   @if($startup->phase->phase =="Contact") selected @endif   >Contact</option>
        <option  value="Discussion"   @if($startup->phase->phase =="Discussion") selected @endif  >Discussion</option>
        <option  value="Pilotage"    @if($startup->phase->phase =="Pilotage") selected @endif   >Pilotage</option>
        <option  value="Deploiement"   @if($startup->phase->phase =="Deploiement") selected @endif  >Deploiement</option>
    </select>
    <input type="submit" class="btn btn-info float-right"  value="Modifier">
</form>

