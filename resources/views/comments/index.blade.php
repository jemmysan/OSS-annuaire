<span class="text-muted"> Commentaires: </span>
<div class="comments">
    @foreach($comments as $comment)
        @include('$partials.comments.comment')
    @endforeach

</div>
