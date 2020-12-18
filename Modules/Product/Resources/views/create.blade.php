@extends('product::layouts.master')

@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="tile">
            <h3 class="tile-title">สร้างรายการใหม่</h3>
            <div class="tile-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>ชื่อสินค้า</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="ระบุชื่อสินค้า" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>หน้าปก</label>
                        <input type="file" name="cover" class="form-control krajee-input @error('cover') is-invalid @enderror" data-msg-placeholder="เลือกไฟล์หน้าปก" accept="image/*">
                        <small class="form-text text-muted">ขนาดรูปภาพที่เหมาะสม 1200 x 630 pixel (กว้าง x สูง) ภาพจะถูก crop อัตโนมัติ</small>
                        @error('cover')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>ราคา</label>
                        <div class="input-group">
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ old('price') }}" placeholder="ระบุราคา">
                            <div class="input-group-append"><span class="input-group-text">฿</span></div>
                        </div>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label>ราคา (ขาย)</label>
                        <div class="input-group">
                            <input class="form-control @error('sale_price') is-invalid @enderror" type="text" name="sale_price" value="{{ old('sale_price') }}" placeholder="ระบุราคา">
                            <div class="input-group-append"><span class="input-group-text">฿</span></div>
                        </div>
                        @error('sale_price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>ลิงค์เชื่อมโยง</label>
                        <input type="text" name="url" class="form-control" value="{{ old('url') }}" placeholder="ระบุลิงค์เชื่อมโยง">
                    </div>
                    <div class="form-group col-md-4">
                        <label>การแสดง (Target)</label>
                        <select name="target" class="form-control">
                            <option value="">-เลือก-</option>
                            <option value="_parent" @if(old('target') == "_parent") selected @endif>_parent (เปิดหน้าต่างที่เป็นหน้าต่างระดับ Parent)</option>
                            <option value="_blank" @if(old('target') == "_blank") selected @endif>_blank (เปิดหน้าต่างใหม่ทุกครั้ง)</option>
                            <option value="_self" @if(old('target') == "_self") selected @endif>_self (เปิดหน้าต่างเดิม)</option>
                            <option value="_top" @if(old('target') == "_top") selected @endif>_top (เปิดหน้าต่างในระดับบนสุด)</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>รายละเอียด</label>
                        <textarea class="form-control" name="detail" id="detail" rows="8" placeholder="ระบุรายละเอียด...">{{ old('details') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="tile-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw"></i>บันทึกข้อมูล</button>
                <button type="reset" class="btn btn-light"><i class="fa fa-times-circle fa-fw"></i>ยกเลิก</button>

                @if (session('message'))
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </form>

@endsection
