@extends('layouts.default')

@section('content')
    <form action="/orders/{{ $item->id }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <strong>Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Full Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" placeholder="Full Name" class="form-control"
                            value="{{ old('name') ? old('name') : $item->name }}" /><small
                            class="help-block form-text">Please enter the name of the
                            customer</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control"
                            value="{{ old('email') ? old('email') : $item->email }}" /><small
                            class="help-block form-text">Please enter the
                            Email</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Phone Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number"
                            class="form-control"
                            value="{{ old('phone_number') ? old('phone_number') : $item->phone_number }}" /><small
                            class="help-block form-text">Please enter the phone_number in
                            IDR</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="address" id="address" rows="9" placeholder="Address..."
                            class="form-control">{{ old('address') ? old('address') : $item->address }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Order Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="order_status">
                            @foreach (['pending' => 'Pending', 'success' => 'Success', 'failed' => 'Failed'] as $order_status => $order_statusLabel)
                                <option value="{{ $order_status }}"
                                    {{ old('order_status', $item->order_status) == $order_status ? 'selected' : '' }}>
                                    {{ $order_statusLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>
@endsection
