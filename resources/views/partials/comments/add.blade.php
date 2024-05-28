<div class="model fade" id="addCommentForm" tabindex="-1" role="dialog" aria-labelledby="addCommentFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommentFormLabel" > Ajouter un comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="task-comment">Comment</label>
                            <textarea name="comment" id="task-comment" cols="10" rows="5" placeholder="Comment sur la task" class="form-control">{{olf('comment')}}</textarea>
                        </div>
                        <div class="form-group d-none">
                            <label for="task-comment">#</label>
                            <input type="text" class="form-control" id="task-task-id" name="task_id">
                        </div>
                        <div class="form-group" style="display: none">
                            <input type="text" class="form-control" id="task-user-id" name="user_id" value="{{auth()->user()->name}}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info add-comment" >
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-outline-warning close-comments-form" data-dismiss="modal" >
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>
