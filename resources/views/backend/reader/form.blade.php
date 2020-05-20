<form role="form" method="post" action="" enctype="multipart/form-data">
    <div class="box-body">
        <div class="col-md-6 default">
            <div class="form-group {{ $errors->first('r_name') ? 'has-error' : '' }} ">
                <label for="inputEmail3" class="control-label default">Name<sup class="title-sup">(*)</sup></label>
                <div>
                    <input type="text" maxlength="100" class="form-control"  placeholder="Name" name="r_name" value="{{ old('r_name', isset($reader) ? $reader->r_name : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_name') }}</p></span>
                </div>
            </div>

            <div class="form-group {{ $errors->first('r_gender') ? 'has-error' : '' }}">
                <label for="inputEmail3" class="control-label default">Gender <sup class="title-sup">(*)</sup></label>
                <select name="r_gender" class=" form-control" data-type="r_gender" style="width: 100%">
                    <option value="" >--Select Gender--</option>
                    <option value="1" {{ old('r_gender', isset($reader->r_gender) ? $reader->r_gender : '') == 1 ? "selected='selected'" : "" }}>Male</option>
                    <option value="2" {{ old('r_gender', isset($reader->r_gender) ? $reader->r_gender : '') == 2 ? "selected='selected'" : "" }}>Female</option>
                </select>
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_gender') }}</p></span>
            </div>

            <div class="form-group {{ $errors->first('r_birthday') ? 'has-error' : '' }} ">
                <label for="inputEmail3" class="control-label default">Birthday<sup class="title-sup">(*)</sup></label>
                <div>
                    <input type="date" class="form-control" name="r_birthday" placeholder="Birthday" value="{{ old('r_birthday', isset($reader->r_birthday) ? $reader->r_birthday : '') }}" style="width: 100%">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_birthday') }}</p></span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="control-label default">Department </label>
                <select name="r_department_id" class="form-control input_select2" data-type="status" style="width: 100%">
                    <option value="" >--Select Department--</option>
                    @if (isset($departments))
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('r_department_id', isset($reader->r_department_id) ? $reader->r_department_id : '' ) == $department->id ? "selected='selected'" : "" }}>{{ $department->d_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="control-label default">Class </label>
                <select name="r_class_id"  class="form-control input_select2" data-type="status" style="width: 100%">
                    <option value="" >--Select Class--</option>
                    @if (isset($class))
                        @foreach($class as $value)
                            <option value="{{ $value->id }}" {{ old('r_class_id', isset($reader->r_class_id) ? $reader->r_class_id : '') == $value->id ? "selected='selected'" : "" }}>{{ $value->c_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group {{ $errors->first('r_address') ? 'has-error' : '' }} ">
                <label for="inputEmail3" class="control-label default">Address</label>
                <div>
                    <input type="text" maxlength="100" class="form-control"  placeholder="Address" name="r_address" value="{{ old('r_address', isset($reader) ? $reader->r_address : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_address') }}</p></span>
                </div>
            </div>
            <div class="form-group {{ $errors->first('r_phone') ? 'has-error' : '' }} ">
                <label for="inputEmail3" class="control-label default">Phone </label>
                <div>
                    <input type="text" maxlength="100" class="form-control"  placeholder="Phone" name="r_phone" value="{{ old('r_phone', isset($reader) ? $reader->r_phone : '') }}">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_phone') }}</p></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="control-label default">Status Reader</label>
                <select name="r_status" class=" form-control" data-type="r_status" style="width: 100%">
                    <option value="1" {{ old('r_status', isset($reader->r_status) ? $reader->r_status : '') == 1 ? "selected='selected'" : "" }}>Active</option>
                    <option value="2" {{ old('r_status', isset($reader->r_status) ? $reader->r_status : '') == 2 ? "selected='selected'" : "" }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12 default">
                <label for="inputEmail3">Avatar </label>
                <div class="input-group input-file" name="images">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-choose" type="button">Choose</button>
                        </span>
                    <input type="text" class="form-control"   placeholder='Choose a file...' style="width: 250px;" />
                    <span class="input-group-btn"></span>
                </div>
                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('images') }}</p></span>
                <img src="@if(isset($reader)) {!! asset('uploads/avatar/'. $reader->r_avatar) !!} @else {{ asset('admin/images/no-image.png')  }} @endif" alt="" class="margin-auto-div img-rounded"  id="image_render" style="width: 320px; float: left; height: 195px;">
            </div>

            <div class="form-group col-md-12 default {{ $errors->has('r_code_card') ? 'has-error' : '' }}" style="margin-top: 13px">
                <label for="inputEmail3" class="control-label default col-sm-12">Code Card</label>
                <div class="col-sm-8" style="display: inline-block; padding: 0px;">
                    <input class="form-control random_code" id="random_code" style="width: 320px;" oninput="if(value.length>10)value=value.slice(0,10)" name="r_code_card" value="{{ old('r_code_card', isset($reader) ? $reader->r_code_card : '') }}" type="text" placeholder="Code Card">
                </div>
                <div class="col-sm-4 default" style="display: inline-block;">
                    <button class="btn btn-blue btn-info btn-change btn-change-code" ><i class="fa fa-fw fa-refresh"></i>  Create code</button>
                </div>
                <div class="col-sm-12 default" style="display: inline-block;">
                    @if($errors->has('r_code_card'))
                        <span class="help-block">{{$errors->first('r_code_card')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group col-md-12 default {{ $errors->has('r_card_created_date') ? 'has-error' : '' }}" style="margin-top: 13px">
                <label for="inputEmail3" class="control-label default">Card Created Date</label>
                <div>
                    <input type="date" class="form-control input_created_date" name="r_card_created_date" placeholder="Card Created Date" value="{{ old('r_card_created_date', isset($reader->r_card_created_date) ? $reader->r_card_created_date : '') }}" style="width: 100%">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_card_created_date') }}</p></span>
                </div>
            </div>

            <div class="form-group col-md-12 default  {{ $errors->has('r_card_expiry_date') ? 'has-error' : '' }}" style="margin-top: 6px">
                <label for="inputEmail3" class="control-label default">Card Expiry Date</label>
                <div>
                    <input type="date" class="form-control input_expiry_date" name="r_card_expiry_date" placeholder="Card Expiry Date" value="{{ old('r_card_expiry_date', isset($reader->r_card_expiry_date) ? $reader->r_card_expiry_date : '') }}" style="width: 100%">
                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_card_expiry_date') }}</p></span>
                </div>
            </div>

            <div class="form-group col-md-12 default mg-t-5">
                <label for="inputEmail3" class="control-label default">Status Card</label>
                <select name="r_card_status" class=" form-control" data-type="r_card_status" style="width: 100%">
                    <option value="2" {{ old('r_card_status', isset($reader->r_card_status) ? $reader->r_card_status : '') == 2 ? "selected='selected'" : "" }}>Inactive</option>
                    <option value="1" {{ old('r_card_status', isset($reader->r_card_status) ? $reader->r_card_status : '') == 1 ? "selected='selected'" : "" }}>Active</option>
                </select>
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary" id="btn_save_data"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.reader') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>

@section('script')

    <script>
        $(function() {

            $('#btn_save_data').click(function (event) {
                event.preventDefault();
                var expiry_date = $('.input_expiry_date').val();
                var created_date = $('.input_created_date').val();
                var content = '';
                var flg = true;
                if (created_date !== '' && expiry_date == '') {
                    showMessageAlert('Please select a card expiry date');
                    flg = false;
                }
                if (expiry_date !== '') {
                    if (created_date == '') {
                        created_date = new Date();
                        content = 'Card expiration date must be greater than the current date.';
                    } else {
                        content = 'Card expiration date must be greater than the card creation date.';
                    }
                    expiry_date = new Date(expiry_date);
                    created_date = new  Date(created_date);
                    if (expiry_date.getTime() < created_date.getTime()) {
                        showMessageAlert(content);
                        flg = false;
                    }
                }
                if (flg) $('form').submit();

            });

            function showMessageAlert(message) {
                $.confirm({
                    title: 'Warning ?',
                    content: message,
                    type: 'orange',
                    buttons: {
                        ok: {
                            text: "OK",
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: function(){

                            }
                        },
                    }
                });
            }
        });
    </script>
@endsection