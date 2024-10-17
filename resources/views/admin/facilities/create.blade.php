@extends('admin.layouts.layout')

@section('content')
    <h3>إضافة منشأة جديدة</h3>
    <form action="{{ route('admin.facilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم المنشأة</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="path">المسار</label>
            <input type="text" class="form-control" id="path" name="path" required>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1">نشط</option>
                <option value="0">غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
@endsection
