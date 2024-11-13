@extends('admin.layouts.layout')

@section('content')
    <h3>تعديل منشأة الحفلة</h3>
    <form action="{{ route('admin.party_facilities.update', $partyFacility->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="party_id">الحفلة</label>
            <select class="form-control" id="party_id" name="party_id" required>
                <option value="">اختر الحفلة</option>
                @foreach ($parties as $party)
                    <option value="{{ $party->id }}" {{ $partyFacility->party_id == $party->id ? 'selected' : '' }}>
                        {{ $party->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="facility_id">المنشأة</label>

            <select class="form-control" id="facility_id" name="facility_id" required>
                <option value="">اختر الحفلة</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}"
                        {{ $partyFacility->facility_id == $facility->id ? 'selected' : '' }}>
                        {{ $facility->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $partyFacility->status ? 'selected' : '' }}>نشط</option>
                <option value="0" {{ !$partyFacility->status ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">تحديث</button>
    </form>
@endsection
