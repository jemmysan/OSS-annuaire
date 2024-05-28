  <blockquote class="blockquote-footer">

                <p class="mb-0" > <b>{{$comment->user->name}}</b></p>
                <p class="mb-0"> {{$comment->comment}}</p>
                <footer class="blockquote-footer">
                    <b>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</b> </footer>
                     </blockquote>
            <hr>
