<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Meeting information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                @if(!empty($data) && count($data) > 0)--}}
{{--                @foreach($data as $p)--}}
                <form>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" readonly class="form-control-plaintext" id="title" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Start</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" readonly class="form-control-plaintext" id="start" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">End</label>
                        <div class="col-sm-10">
                            <input type="text" name="end" readonly class="form-control-plaintext" id="end" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="room" class="col-sm-4 col-form-label">Room</label>
                        <div class="col-sm-10">
                            <input type="text" name="room" readonly class="form-control-plaintext" id="room" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="room" class="col-sm-4 col-form-label">Num. of People</label>
                        <div class="col-sm-10">
                            <input type="text" name="personNum" readonly class="form-control-plaintext" id="personNum" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="requestedBy" class="col-sm-4 col-form-label">Requested by</label>
                        <div class="col-sm-10">
                            <input type="text" name="requestedBy" readonly class="form-control-plaintext" id="requestedBy" style="cursor: default" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" readonly class="form-control-plaintext" id="description "style="cursor: default" disabled>
                        </div>
                    </div>
                </form>
{{--                @endforeach--}}
{{--                @endif--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
