@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل المنشأة</h3>
    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم المنشأة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $facility->name }}" required>
        </div>
        <div class="form-group">
            <label for="path">تحميل صورة جديدة</label>
            <input type="file" class="form-control-file" id="path" name="path">
            @if ($facility->path)
                <img src="{{ $facility->path }}" alt="Facility Image" width="100">
            @endif
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
