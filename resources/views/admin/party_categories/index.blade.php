@extends('admin.layouts.layout')

@section('content')
    <div class="d-flex justify-content-between w-90">

        <h3>قائمة الفئات</h3>
        <a href="{{ route('admin.party_categories.create') }}" class="btn btn-primary">إضافة فئة جديدة</a>
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
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->path }}</td>
                    <td>{{ $category->status ? 'نشط' : 'غير نشط' }}</td>
                    <td>
                        <a href="{{ route('admin.party_categories.edit', $category->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('admin.party_categories.destroy', $category->id) }}" method="POST"
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
