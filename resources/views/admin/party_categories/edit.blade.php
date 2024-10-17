@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل الفئة</h3>
    <form action="{{ route('admin.party_categories.update', $partyCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">اسم الفئة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $partyCategory->name }}" required>
        </div>
        <div class="form-group">
            <label for="path">المسار</label>
            <input type="text" class="form-control" id="path" name="path" value="{{ $partyCategory->path }}"
                required>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $partyCategory->status ? 'selected' : '' }}>نشط</option>
                <option value="0" {{ !$partyCategory->status ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">تحديث</button>
    </form>
@endsection
