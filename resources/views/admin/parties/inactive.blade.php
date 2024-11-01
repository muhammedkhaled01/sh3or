@extends('admin.layouts.layout')

@section('content')
    <h3>الحفلات الغير مفعلة</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>العنوان</th>
                <th>الوصف</th>
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
                    <td>
                        <form action="{{ route('admin.parties.activate', $party->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">تفعيل</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $parties->links() }}
@endsection
