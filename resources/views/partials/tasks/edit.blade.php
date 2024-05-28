<div class="modal fade" id="editTaskForm" tabindex="-1" role="dialog" aria-labelledby="editTaskFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskFormLabel"> Modifier la tache </h5>
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
                                <input type="text" class="form-control" id="task-title" placeholder="Titre" name="titre" value="{{olf('titre')}}">
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
                                <label for="task-user"> Assigner à </label>
                                <select multiple class="form-control" name="users[]" id="task-user-id">
                                    @foreach($users as $id => $name)
                                        <option id="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="text-right">
                    <button type="button" class="btn btn-outline-secondary add-comments-form" data-toggle="modal" data-target="addCommentForm" >
                        <i class="fa fa-plus" aria-hidden="true"></i> Ajouter commentaire
                    </button>
                </div>
                <div id="task-comments"></div>
            </div>
            <div class="modal-footer">
                <button   type="button" class="btn btn-outline-warning edit-task-save" >
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Enregistrer
                </button>
                <button  type="button" class="btn btn-outline-warning " data-dismiss="modal" >
                    <i class="fa fa-times" aria-hidden="true"></i>Fermer
                </button>
            </div>
        </div>
    </div>
</div>
