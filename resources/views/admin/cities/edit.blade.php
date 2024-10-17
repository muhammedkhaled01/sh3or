@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل المدينة</h3>
    <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
        </div>
        <div class="form-group">
            <label for="path">مساؤ</label>
            <input type="text" class="form-control" id="path" name="path" value="{{ $city->path }}" required>
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
