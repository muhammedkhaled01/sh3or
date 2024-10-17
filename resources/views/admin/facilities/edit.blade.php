@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل المنشأة</h3>
    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم المنشأة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $facility->name }}" required>
        </div>
        <div class="form-group">
            <label for="path">المسار</label>
            <input type="text" class="form-control" id="path" name="path" value="{{ $facility->path }}" required>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $facility->status ? 'selected' : '' }}>نشط</option>
                <option value="0" {{ !$facility->status ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">تحديث</button>
    </form>
@endsection
