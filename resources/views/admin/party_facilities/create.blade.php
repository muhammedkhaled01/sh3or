@extends('admin.layouts.layout')

@section('content')

    <h3>إضافة منشأة جديدة للحفلة</h3>
    <form action="{{ route('admin.party_facilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="party_id">الحفلة</label>
            <select class="form-control" id="party_id" name="party_id" required>
                <option value="">اختر الحفلة</option>
                @foreach ($parties as $party)
                    <option value="{{ $party->id }}">{{ $party->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="facility_id">المنشأة</label>
            <input type="number" class="form-control" id="facility_id" name="facility_id" required>
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
