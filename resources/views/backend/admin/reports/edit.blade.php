@extends('backend.layouts.app')

@section('title', 'Edit Report')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.reports.update', $report) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Report Details</p>
                <p class="description">View or update report details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <label for="user_id" class="form-label label">User<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="user_id" name="user_id" required>
                        <option value="">Select user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $report->user_id) == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="user_id"></x-backend.input-error>
                </div>

                <div class="col-6 mb-4">
                    <label for="warehouse_id" class="form-label label">Warehouse<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="warehouse_id" name="warehouse_id" required>
                        <option value="">Select warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $report->warehouse_id) == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name_en }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="warehouse_id"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <label for="reason" class="form-label label">Reason<span class="asterisk">*</span></label>
                    <textarea class="form-control input-field textarea" name="reason" id="reason" value="{{ old('reason', $report->reason) }}" placeholder="Reason" rows="5" required>{{ old('reason', $report->reason) }}</textarea>
                    <x-backend.input-error field="reason"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$report"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>
@endsection