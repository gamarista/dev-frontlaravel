<!-- Modal -->
<div class="modal fade" id="changeDriverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Change driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        {{-- {!! Form::hidden('gesiddriver', '', ['class' => 'gesidlabel', 'id' => 'gesiddriver']) !!} --}}
                        {{Form::label('gesiddriver','id', ['class' => 'gesidlabel', 'id' => 'gesiddriver'])}}
                        {{ Form::label('labeldriver', 'Driver', ['class' => 'awesome'])}}
                        {{ Form::select('driver', $drivers,null,['placeholder' => '--Driver--','class' =>
                        'form-control','id' => 'selectdriver']) }}

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-info" id="savechangedriver">Change</button>
            </div>
        </div>
    </div>
</div>
