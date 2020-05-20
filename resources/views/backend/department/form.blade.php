<form role="form" method="post" action="">
    <div class="box-body">
        <div class="form-group {{ $errors->first('d_name') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Name<sup class="title-sup">(*)</sup></label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Name" name="d_name" value="{{ old('d_name', isset($department) ? $department->d_name : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('d_name') }}</p></span>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.department') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>