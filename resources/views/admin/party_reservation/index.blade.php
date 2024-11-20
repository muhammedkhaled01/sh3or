@extends('admin.layouts.layout')

@section('content')
    <div class="d-flex justify-content-between w-90">
        <h3>قائمة حجوزات الحفلات</h3>
        {{-- <a href="{{ route('admin.party_reservations.create') }}" class="btn btn-primary">إضافة حجز جديد</a> --}}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>رقم الحجز</th>
                <th>الحفلة</th>
                <th>العميل</th>
                <th>البائع</th>
                <th>التاريخ</th>
                <th>الحالة</th>
                <th>السعر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->reservation_number }}</td>
                    <td>{{ $reservation->party->name ?? 'غير متوفر' }}</td>
                    <td>{{ $reservation->customer->name ?? 'غير متوفر' }}</td>
                    <td>{{ $reservation->vendor->name ?? 'غير متوفر' }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->status == 1 ? 'نشط' : 'غير نشط' }}</td>
                    <td>{{ number_format($reservation->price, 2) }} ريال</td>
                    <td>
                        {{-- <a href="{{ route('admin.party_reservations.edit', $reservation->id) }}"
                            class="btn btn-warning">تعديل</a> --}}
                        <form action="{{ route('admin.party_reservations.destroy', $reservation->id) }}" method="POST"
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
