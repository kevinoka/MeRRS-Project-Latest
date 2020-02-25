<div class="modal fade bottom" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog modal-frame modal-bottom" role="document">
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
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" readonly class="form-control" id="title" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-3 col-form-label">Start</label>
                        <div class="col-sm-9">
                            <input type="text" name="start" readonly class="form-control" id="start" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-3 col-form-label">End</label>
                        <div class="col-sm-9">
                            <input type="text" name="end" readonly class="form-control" id="end" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="room" class="col-sm-3 col-form-label">Room</label>
                        <div class="col-sm-9">
                            <input type="text" name="room" readonly class="form-control" id="room" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="room" class="col-sm-3 col-form-label">Person Qty</label>
                        <div class="col-sm-9">
                            <input type="text" name="personNum" readonly class="form-control" id="personNum" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="requestedBy" class="col-sm-3 col-form-label">Req. by</label>
                        <div class="col-sm-9">
                            <input type="text" name="requestedBy" readonly class="form-control" id="requestedBy" style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" readonly class="form-control" id="description "style="cursor: default; color: #2b2b2b; background-color: #ffffff" disabled>
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
