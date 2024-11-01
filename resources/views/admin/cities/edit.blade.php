@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل المدينة</h3>
    <form action="{{ route('admin.cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
        </div>
        <div class="form-group">
            <label for="path">تحميل صورة جديدة</label>
            <input type="file" class="form-control-file" id="path" name="path">
            @if ($city->path)
                <img src="{{ $city->path }}" alt="City Image" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $city->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$city->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">تعديل</button>
    </form>
@endsection
