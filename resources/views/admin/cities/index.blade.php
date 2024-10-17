@extends('admin.layouts.layout')

@section('content')
    <div class="d-flex justify-content-between w-90">
        <h3>قائمة المدن</h3>
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">اضافة مدينة جديدة</a>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>مسار</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->path }}</td>
                    <td>{{ $city->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
