Vous avez été invité à rejoindre l'équipe {{$team->name}}.<br>
Merci de cliquer sur ce lien: <a href="{{route('teams.accept_invite', $invite->accept_token)}}">{{route('teams.accept_invite', $invite->accept_token)}}</a>
