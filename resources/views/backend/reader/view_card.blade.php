
<div class="row default">
    <div class="col-sm-12 default">
        <div class="col-sm-4 default">
            <div class="image_card"
                 style="width: 155px; height: 200px; background-repeat: no-repeat, repeat; background-size: 100% 100%;
                 background-image: url('@if(!empty($reader->r_avatar)) {!! asset('uploads/avatar/'. $reader->r_avatar) !!} @else {!! asset('admin/images/no-image.png') !!} @endif')">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group col-md-12 default">
                <label for="inputEmail3" class="control-label col-sm-4 default">Name : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->r_name }}</label>
            </div>
            <div  class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Department : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->department !== null ? $reader->department->d_name : '' }}</label>
            </div>
            <div class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Class : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->class !== null ? $reader->class->c_name : '' }}</label>
            </div>
            <div class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Code Card : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->r_code_card }}</label>
            </div>
            <div class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Created Date : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->r_card_created_date }}</label>
            </div>
            <div class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Expiry Date : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->r_card_expiry_date }}</label>
            </div>
            <div class="form-group col-md-12 default modal-line-height">
                <label for="inputEmail3" class="control-label col-sm-4 default">Status : </label><label for="inputEmail3" class="control-label col-sm-8 default">{{ $reader->r_card_status == 1 ? 'Active' : 'Inactive' }}</label>
            </div>
        </div>
    </div>
</div>