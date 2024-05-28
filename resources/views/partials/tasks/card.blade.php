<div class="card card-{{$task->id}} mb-4">
    <div class="card-header text-right">
        <span class="badge badge-light justify-content-end">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            {{ $tasks->updated_at }}
        </span>
        <span class="badge badge-{{ App\Models\Task::getTaskClass($task->status) }}justify-content-end">
            <i class="fa fa-exchange" aria-hidden="true"></i>
            <span class="card-status">{{$task->status}}</span>
        </span>
        <span class="badge badge-warning justify-content-end">
            <i class="fa fa-commenting-o" aria-hidden="true"></i>
         {{$task->commentaires->count()}}
        </span>

        <div class="card-body">
            <h5 class="card-title">{{$task->titre}}</h5>
            <p class="card-text">{{$task->description}}</p>
            <p class="card-text">{{$task->user->name}}</p>
        </div>
        <div class="modal-footer text-right">
            <button class="btn btn-sm btn-outline-info edit-task"  data-toggle="modal" data-target="#editTaskForm"
                    data-id="{{ $task->id }}" >
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger delete-task"  data-toggle="modal" data-target="#deleteTaskForm"
                    data-id="{{ $task->id }}" >
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </div>
    </div>

</div>
