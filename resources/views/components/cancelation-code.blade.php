<!-- Modal -->
<div class="modal fade" id="cancellationTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Reason For Cancellation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    {{Form::label('gesid','id', ['class' => 'gesidlabel', 'id' => 'gesid'])}}
                    {{ Form::label('labelcancellationreason', 'Reason', ['class' => 'awesome'])}}
                    {{ Form::select('cancellationcode', $cancellation,null,['placeholder' => '--Reason--','class' => 'form-control','id' => 'selectcancellationcode']) }}
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="savetripcancellation">Save</button>
        </div>
      </div>
    </div>
  </div>