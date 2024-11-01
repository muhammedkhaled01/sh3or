@extends('admin.layouts.layout')

@section('content')
    <h3>اضافة مدينة</h3>
    <form action="{{ route('admin.cities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="path">تحميل صورة</label>
            <input type="file" class="form-control-file" id="path" name="path" required>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
@endsection
