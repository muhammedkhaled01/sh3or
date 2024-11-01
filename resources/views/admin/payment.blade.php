@extends('admin.layouts.layout')

@section('content')
    <h1>Make a Payment</h1>
    <form action="{{ route('payments.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="reservation_id">Reservation ID:</label>
            <input type="number"  class="form-control" name="reservation_id" id="reservation_id" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text"  class="form-control" name="amount" id="amount" required>
        </div>
        <div class="form-group">

            <label for="currency">Currency:</label>
            <select name="cur"  class="form-control" id="currency">
                <option value="SAR">SAR</option>
                <option value="USD">USD</option>
                <!-- Add other currency options as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="source">Payment Method:</label>
            <select name="source" class="form-control" id="source">
                <option value="card">Credit Card</option>
                <option value="applepay">Apple Pay</option>
                <!-- Add other payment methods as needed -->
            </select>
        </div>







        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>
@endsection
