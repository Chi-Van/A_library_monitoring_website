@extends('backend.layouts.app')
@section('content')

    <section class="content-header">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Class</h3>

                    <div class="box-tools">
                        <a href="{{ route('get.create.class') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                </div>
                <div class="box-header">

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        @if ($classs)
                            @foreach($classs as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->c_name }}</td>
                                    <td>{{ convertDate($class->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('get.update.class', $class->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('get.delete.class', $class->id) }}" class="btn btn-xs btn-info confirm__btn"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-right" >
                    {{ $classs->appends($query = '')->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
