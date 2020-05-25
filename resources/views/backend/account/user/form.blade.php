<form role="form" method="post">
    <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label>Name<sup class="title-sup">(*)</sup></label>
            <input type="text" name="name" class="form-control" value="{{old('name', isset($user->name) ? $user->name : '')}}" placeholder="Name">
            <span class="text-danger"><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
        </div>

        @if( !isset($user->password) && empty($user->password))
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label>Password<sup class="title-sup">(*)</sup></label>
                <input type="text" name="password" class="form-control" value="" placeholder="Password">
                <span class="text-danger"><p class="mg-t-5">{{ $errors->first('password') }}</p></span>
            </div>
        @endif

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label>Email <sup class="title-sup">(*)</sup></label>
            <input type="email" name="email" class="form-control" value="{{old('email', isset($user->email) ? $user->email : '')}}" id="exampleInputEmail1" placeholder="email">
            <span class="text-danger"><p class="mg-t-5">{{ $errors->first('email') }}</p></span>
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <label for="exampleInputEmail1">Phone </label>
            <input type="text" name="phone" class="form-control" value="{{old('phone', isset($user->phone) ? $user->phone : '')}}" id="exampleInputEmail1" placeholder="09288.....">
            <span class="text-danger"><p class="mg-t-5">{{ $errors->first('phone') }}</p></span>
        </div>

        <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            <label for="exampleInputEmail1">Role <sup class="title-sup">(*)</sup></label>
            <select name="role" class="form-control">
                <option value="">Select role</option>
                @if($roles)
                    @foreach($roles as $role)
                        <option  {{old('role', isset($listRoleUser->role_id) ? $listRoleUser->role_id : '') == $role->id ? 'selected=selected' : '' }}  value="{{$role->id}}">{{$role->display_name}}</option>
                    @endforeach
                @endif
            </select>
            <span class="text-danger"><p class="mg-t-5">{{ $errors->first('role') }}</p></span>
        </div>

        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label>Status</label>
            <div class="checkbox" style="display: inline">
                <label for="active">
                    <input type="radio" id="active" name="status" {{ isset($user) && $user->status == 1 ? "checked='checked'" : "checked='checked'"  }} value="1"> Active
                </label>
            </div>
            <div class="checkbox" style="display: inline">
                <label for="inactive">
                    <input type="radio" id="inactive" name="status" {{ isset($user) && $user->status == 0 ? "checked='checked'" : ""  }} value="0"> Inactive
                </label>
            </div>
            @if($errors->has('status'))
                <span class="help-block">{{$errors->first('status')}}</span>
            @endif
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save data</button>
        <a href="{{ route('get.list.user') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</a>
    </div>
</form>