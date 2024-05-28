
    <a class="btn btn-xs btn-primary" href="{{ route('$crudRoutePart . '.show.', $row->id) }}">
    </a>
    <a class="btn btn-xs btn-info" href="{{ route(' $crudRoutePart . '.edit.', $row->id) }}">
    </a>
    <form action="{{ route( $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger">
    </form>
