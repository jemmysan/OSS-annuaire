
@can('like', $model)
    <form action="{{ route('like') }}" method="POST">
        @csrf
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input type="hidden" name="id" value="{{ $model->id }}"/>
        <button class="btn btn-light btn-link"><i class="fas fa-heart"></i></button>

        {{ trans_choice('{0} 0|{1} :count |[2,*] :count ', count($model->likes), ['count' => count($model->likes)]) }}

    </form>
@endcan

@can('unlike', $model)
    <form action="{{ route('unlike') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input type="hidden" name="id" value="{{ $model->id }}"/>
        <button class="btn btn-light btn-link"><i class="fas fa-heart-broken " style="color:red;"></i></button>

        {{ trans_choice('{0} 0|{1} :count |[2,*] :count ', count($model->likes), ['count' => count($model->likes)]) }}

    </form>
@endcan
