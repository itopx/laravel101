@extends('product::layouts.master')

@section('content')
    <div class="tile">
        <div class="tile-title-w-btn">
            <h3 class="title">ข้อมูลรายการ</h3>
            <p>
                <a class="btn btn-primary icon-btn" href="#"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ </a>
                <a class="btn btn-secondary icon-btn" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
            </p>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <th class="text-nowrap text-center">ลำดับที่</th>
                        <th class="text-nowrap text-center">ชื่อสินค้า</th>
                        <th scope="col" class="text-nowrap text-center">สร้างเมื่อ</th>
                        <th scope="col" class="text-nowrap text-center">จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $index => $value)
                            <tr>
                                <td>{{ $lists->firstItem() + $index }}</td>
                                <td>{{ $value->passwordinput }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    Edit | Delete
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile-footer">
            {{ $lists->render() }}
        </div>
    </div>
@endsection
