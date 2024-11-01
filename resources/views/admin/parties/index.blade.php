@extends('admin.layouts.layout')

@section('content')
    <h3>قائمة الحفلات</h3>
    {{-- <a href="{{ route('admin.parties.create') }}" class="btn btn-primary">إضافة حفلة جديدة</a> --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parties as $party)
                <tr>
                    <td>{{ $party->id }}</td>
                    <td>{{ $party->name }}</td>
                    <td>{{ $party->address }}</td>
                    <td>{{ $party->description }}</td>
                    <td>{{ $party->status->value ? 'نشط' : 'غير نشط' }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.parties.edit', $party->id) }}" class="btn btn-warning">تعديل</a> --}}
                        <form action="{{ route('admin.parties.destroy', $party->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $parties->links() }}
@endsection
