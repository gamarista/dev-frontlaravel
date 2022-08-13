<!-- Modal -->
<div class="modal fade" id="sendmessagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> Send message </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    {{Form::label('gesidmessage','id', ['class' => 'gesidlabel', 'id' => 'gesidmessage'])}}
                    {{ Form::label('messagealbel', 'Message', ['class' => 'awesome'])}}
                    {{ Form::text('message','',['class' => 'form-control','id' => 'messagetrip']) }}
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="savemessage">Save</button>
        </div>
      </div>
    </div>
  </div>