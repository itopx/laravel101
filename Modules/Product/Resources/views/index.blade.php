@extends('product::layouts.master')

@section('content')
    <div class="tile">
        <div class="tile-title-w-btn">
            <h3 class="title">ข้อมูลรายการ</h3>
            <p>
                <a class="btn btn-primary icon-btn" href="{{ route('product.create') }}"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ </a>
                <a class="btn btn-secondary icon-btn" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
            </p>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <th class="text-nowrap text-center">ลำดับที่</th>
                        <th class="text-nowrap text-center">รหัสสินค้า</th>
                        <th class="text-nowrap text-center">ชื่อสินค้า</th>
                        <th class="text-nowrap text-center">฿ราคา</th>
                        <th class="text-nowrap text-center">฿ราคา (<span class="text-danger">ขาย</span>)</th>
                        <th class="text-nowrap text-center">สร้างเมื่อ</th>
                        <th class="text-nowrap text-center">ปรับปรุงเมื่อ</th>
                        <th class="text-nowrap text-center">จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $index => $value)
                        <tr>
                            <th scope="row" width="1">{{ $lists->firstItem() + $index }}</td>
                            <td scope="row" width="1">{{ $value->code }}</td>
                            <td>{{ $value->name }}</td>
                            <td width="130" class="text-center">{{ number_format($value->price,2) }}</td>
                            <td width="130" class="text-center">{{ number_format($value->sale_price,2) }}</td>
                            <td width="100" class="text-nowrap">{{ $value->created_at }}</td>
                            <td width="100" class="text-nowrap">{{ $value->updated_at }}</td>
                            <td width="1" class="text-nowrap">
                                <form method="POST" action="#">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-sm btn-outline-warning" target="_blank" href="#"> ดูเพิ่มเติม</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('product.edit', $value->id) }}"> แก้ไข</a>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">ยกเลิก</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile-footer">
            {{ $lists->links() }}
        </div>
    </div>
@endsection
