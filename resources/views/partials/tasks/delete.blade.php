<div class="modal fade" id="deleteTaskForm" tabindex="-1" role="dialog" aria-labelledby="deleteTaskFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTaskFormLabel"> Tache</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                        <div class="card-header">
                            êtes-vous sûr de vouloir supprimer?
                        </div>
                        <div class="card-body">
                            <div class="titre">
                                <span class="text-muted"> Titre</span>
                                <span class="card-title"></span>
                            </div>
                            <div class="description">
                                <span class="text-muted"> Description</span>
                                <span class="card-text"></span>
                            </div>
                            <div class="status">
                                <span class="text-muted"> Status: </span>
                                <span class="card-status text-uppercase"></span>
                            </div>
                            <select multiple class="form-control" name="users[]" id="task-user-id">
                                @foreach($users as $id => $name)
                                    <option id="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button class="btn btn-outline-warning delete-task-confirm" type="button">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Supprimer
                </button>
                <button class="btn btn-outline-warning " type="button" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>Quitter
                </button>
            </div>
        </div>
    </div>
</div>
