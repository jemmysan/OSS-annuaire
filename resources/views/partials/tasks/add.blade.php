<div class="modal fade" id="addTaskForm" tabindex="-1" role="dialog" aria-labelledby="addTaskFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskFormLabel"> Nouvelle Tache</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="task-title"> Titre</label>
                                <input type="text" class="form-control" id="task-title" placeholder="Titre" name="titre" value="{{old('titre')}}">
                            </div>
                            <div class="form-group">
                                <label for="task-status"> Status</label>
                                <select class="form-control" id="task-status">
                                    <option value="a_faire"> A FAIRE</option>
                                    <option value="en_cours"> EN COURS</option>
                                    <option value="solder">SOLDER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="task-description"> Description</label>
                                <textarea name="description" id="task-description" cols="15" rows="5" placeholder="Description de la task" class="form-control">
                                    {{old('description')}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="task-user-id"> Description</label>
                                <select multiple class="form-control" name="users[]" id="task-user-id">
                                    @foreach($users as $id => $name)
                                        <option id="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-warning add-task" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <button class="btn btn-outline-warning" type="button">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>
