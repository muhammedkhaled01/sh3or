@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Discount Card -->
            {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Discount Rate</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $discount->discount ?? 0 }}%
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-tag text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Price After Discount Card -->
            {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Price After Discount</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($priceAfterDiscount, 2) }} ريال
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Form to Update Discount -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="discount">Update Discount Rate (%)</label>
                                <input type="number" name="discount" id="discount" class="form-control" min="0"
                                    max="100" step="0.01" value="{{ $discount->discount ?? 0 }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update Discount</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
