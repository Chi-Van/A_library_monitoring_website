<form role="form" method="post" action="">
    <div class="box-body">
        <div class="form-group {{ $errors->first('at_name') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Name<sup class="title-sup">(*)</sup></label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Name" name="at_name" value="{{ old('at_name', isset($author) ? $author->at_name : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_name') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('at_email') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Email<sup class="title-sup">(*)</sup></label>
            <div>
                <input type="email" maxlength="100" class="form-control"  placeholder="Email" name="at_email" value="{{ old('at_email', isset($author) ? $author->at_email : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_email') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('at_gender') ? 'has-error' : '' }}">
            <label for="inputEmail3" class="control-label default">Gender <sup class="title-sup">(*)</sup></label>
            <select name="at_gender" class=" form-control" data-type="r_gender" style="width: 100%">
                <option value="" >--Select Gender--</option>
                <option value="1" {{ old('at_gender', isset($author->at_gender) ? $author->at_gender : '') == 1 ? "selected='selected'" : "" }}>Male</option>
                <option value="2" {{ old('at_gender', isset($author->at_gender) ? $author->at_gender : '') == 2 ? "selected='selected'" : "" }}>Female</option>
            </select>
            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_gender') }}</p></span>
        </div>
        <div class="form-group {{ $errors->first('at_birthday') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Birthday</label>
            <div>
                <input type="text" class="form-control input_date_birthday" name="at_birthday" placeholder="Birthday" value="{{ old('at_birthday', isset($author->at_birthday) ? $author->at_birthday : '') }}" style="width: 100%">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_birthday') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('at_phone') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Phone</label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Phone" name="at_phone" value="{{ old('at_phone', isset($author) ? $author->at_phone : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_phone') }}</p></span>
            </div>
        </div>
        <div class="form-group {{ $errors->first('at_address') ? 'has-error' : '' }} ">
            <label for="inputEmail3" class="control-label default">Address</label>
            <div>
                <input type="text" maxlength="100" class="form-control"  placeholder="Address" name="at_address" value="{{ old('at_address', isset($author) ? $author->at_address : '') }}">
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('at_address') }}</p></span>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="control-label default">Status </label>
            <select name="at_status" class=" form-control" data-type="r_status" style="width: 100%">
                <option value="1" {{ old('at_status', isset($author->at_status) ? $author->at_status : '') == 1 ? "selected='selected'" : "" }}>Active</option>
                <option value="2" {{ old('at_status', isset($author->at_status) ? $author->at_status : '') == 2 ? "selected='selected'" : "" }}>Inactive</option>
            </select>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.author') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>

@section('script')
    {{--daterangepicker--}}
    <script src="{{ asset('admin/theme/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin/theme/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/theme/plugins/daterangepicker/daterangepicker.css') }}">

    <script>
        $(function() {

            $('.input_date_birthday').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1987,
            }, function(start, end, label) {
                var years = moment().diff(start, 'years');
            });
        });
    </script>
@endsection