<form role="form" method="post" action="">
    <div class="box-body">
        <div class="form-group {{ $errors->first('pc_name') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Name<sup class="title-sup">(*)</sup></label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Name" name="pc_name" value="{{ old('pc_name', isset($publishingCompany) ? $publishingCompany->pc_name : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('pc_name') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('pc_email') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Email<sup class="title-sup">(*)</sup></label>
            <div>
                <input type="email" maxlength="100" class="form-control"  placeholder="Email" name="pc_email" value="{{ old('pc_email', isset($publishingCompany) ? $publishingCompany->pc_email : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('pc_email') }}</p></span>
            </div>
        </div>

        <div class="form-group {{ $errors->first('pc_phone') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Phone</label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Phone" name="pc_phone" value="{{ old('pc_phone', isset($publishingCompany) ? $publishingCompany->pc_phone : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('pc_phone') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('pc_address') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Address</label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Address" name="pc_address" value="{{ old('pc_address', isset($publishingCompany) ? $publishingCompany->pc_address : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('pc_address') }}</p></span>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="control-label default">Status </label>
            <select name="pc_status" class=" form-control" data-type="r_status" style="width: 100%">
                <option value="1" {{ old('pc_status', isset($publishingCompany->pc_status) ? $publishingCompany->pc_status : '') == 1 ? "selected='selected'" : "" }}>Active</option>
                <option value="2" {{ old('pc_status', isset($publishingCompany->pc_status) ? $publishingCompany->pc_status : '') == 2 ? "selected='selected'" : "" }}>Inactive</option>
            </select>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.publishing_company') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>
