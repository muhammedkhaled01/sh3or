@extends('admin.layouts.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    <div class="container">
        <h3>إجمالي المبلغ المحصل</h3>
        <div class="card">
            <div class="card-body">
                <h4>إجمالي المبلغ : SAR {{ number_format($totalCollected, 2) }}</h4>

                <!-- Payment Form -->
                <form action="{{ route('admin.process.payment') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">المبلغ</label>
                        <input type="number" name="amount" id="amount" class="form-control"
                            value="{{ $totalCollected }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم حامل البطاقة</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">رقم البطاقة</label>
                        <input type="text" name="number" id="number" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="cvc" class="form-label">رمز الأمان (CVC)</label>
                        <input type="text" name="cvc" id="cvc" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="month" class="form-label">شهر انتهاء الصلاحية</label>
                        <input type="text" name="month" id="month" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">سنة انتهاء الصلاحية</label>
                        <input type="text" name="year" id="year" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">إتمام الدفع</button>
                </form>


            </div>
        </div>
    </div>
@endsection
