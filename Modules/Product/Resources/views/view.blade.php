@extends('product::layouts.master')

@section('content')
    <form action="{{ route('product.update', $result->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="tile">
            <h3 class="tile-title">ดูรายการ #{{ $result->code }}</h3>
            <div class="tile-body">
                <table class="table table-bordered w-50">
                    <tr>
                        <td class="text-nowrap">ภาพหน้าปก</td>
                        <td><img src="{{ $result->cover }}" height="250"></td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">ชื่อสินค้า</td>
                        <td>{{ $result->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">ราคา</td>
                        <td>฿{{ number_format($result->price, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">ราคา (ขาย)</td>
                        <td>฿{{ number_format($result->sale_price, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="text-nowrap">รายละเอียด</td>
                        <td>{{ $result->detail }}</td>
                    </tr>
                </table>
            </div>
            <div class="tile-footer">

            </div>
        </div>
    </form>

@endsection
