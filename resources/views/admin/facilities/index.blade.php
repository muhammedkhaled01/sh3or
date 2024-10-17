@extends('admin.layouts.layout')

@section('content')
    <div class="d-flex justify-content-between w-90">

        <h3>قائمة المنشآت</h3>
        <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">إضافة منشأة جديدة</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>المسار</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
                <tr>
                    <td>{{ $facility->id }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->path }}</td>
                    <td>{{ $facility->status ? 'نشط' : 'غير نشط' }}</td>
                    <td>
                        <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST"
                            style="display:inline;">
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
