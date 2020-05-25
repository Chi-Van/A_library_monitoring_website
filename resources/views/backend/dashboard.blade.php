@extends('backend.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $amountReader > 0 ? $amountReader : 0 }}</h3>

                        <p>Reader</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('get.list.reader')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$totalBook > 0 ? $totalBook : 0}}</h3>

                        <p>Books</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-book"></i>
                    </div>
                    <a href="{{ route('get.list.book') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totalBookLiquidated > 0 ? $totalBookLiquidated : 0 }}</h3>

                        <p>Total Book Liquidated</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-book"></i>
                    </div>
                    <a href="{{ route('get.list.book') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $totalBookBorrowing > 0 ? $totalBookBorrowing : 0 }}</h3>

                        <p>Total Book Borrowing</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('get.list.borrow.book') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="box my-custom-scrollbar" style="height: 300px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">New imported books</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-sm" id="imported_books">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name Book</th>
                                <th>Amount</th>
                                <th>Issue Number</th>
                                <th>Create</th>
                            </tr>
                            @if($newImportBook)
                                @foreach($newImportBook as $key => $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>
                                            <p class="text-space-account">
                                                <span class="content-space" data-toggle="tooltip" title="{{ $book->book !== null ? $book->book->b_name : '' }}">
                                                   {{ $book->book !== null ? $book->book->b_name : '' }}
                                                </span>
                                            </p>
                                        </td>
                                        <td>{{ $book->ib_amount }}</td>
                                        <td>{{ $book->ib_issue_number }}</td>
                                        <td>{{ convertDate($book->created_at) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box my-custom-scrollbar" style="height: 300px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Readers violated</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name Reader</th>
                                <th>Name Book</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Forfeit</th>
                            </tr>
                            @if($readersViolated)
                                @foreach($readersViolated as $key => $reader)
                                    <tr>
                                        <td>{{ $reader->id }}</td>
                                        <td>
                                            <p class="text-space-account">
                                                <span class="content-space" data-toggle="tooltip" title="{{ $reader->reader !== null ? $reader->reader['r_name'] : '' }}">
                                                   {{ $reader->reader !== null ? $reader->reader['r_name'] : '' }}
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-space-account">
                                                <span class="content-space" data-toggle="tooltip" title="{{ $reader->book !== null ? $reader->book->b_name : '' }}">
                                                   {{ $reader->book !== null ? $reader->book->b_name : '' }}
                                                </span>
                                            </p>
                                        </td>
                                        <td>{{ $reader->d_expiry_date }}</td>
                                        <td>{{ STATUS_BORROW[$reader->d_status] }}</td>
                                        <td>{{ number_format($reader->d_forfeit, 0, ',', '.') }}$</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box my-custom-scrollbar" style="height: 300px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Readers Borrowing</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name Reader</th>
                                <th>Name Book</th>
                                <th>Expiry Date</th>
                                <th>Create date</th>
                            </tr>
                            @if($readersBorrowing)
                                @foreach($readersBorrowing as $key => $borrow)
                                    <tr>
                                        <td>{{ $borrow->id }}</td>
                                        <td>
                                            <p class="text-space-account">
                                                <span class="content-space" data-toggle="tooltip" title="{{ $borrow->reader !== null ? $borrow->reader['r_name'] : '' }}">
                                                   {{ $borrow->reader !== null ? $borrow->reader['r_name'] : '' }}
                                                </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-space-account">
                                                <span class="content-space" data-toggle="tooltip" title="{{ $reader->book !== null ? $reader->book->b_name : '' }}">
                                                   {{ $reader->book !== null ? $reader->book->b_name : '' }}
                                                </span>
                                            </p>
                                        </td>
                                        <td>{{ $borrow->d_expiry_date }}</td>
                                        <td>{{ convertDate($book->created_at) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.box -->
    </section>
    <!-- /.content -->

@endsection
@section('script')

@endsection