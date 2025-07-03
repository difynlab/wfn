@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page dashboard">
        <div class="row mb-4">
            <div class="col-12">
                <p class="title">Dashboard</p>
                <p class="description">Manage and track operations seamlessly here.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-3">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Warehouses</p>
                            <p class="value">{{ $total_warehouses }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-key"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $warehouse_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-3">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Booked Warehouses</p>
                            <p class="value">{{ $total_bookings }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-house-add"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $booking_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-3">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Pending Requests</p>
                            <p class="value">{{ $total_pending_bookings }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-bezier2"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $pending_booking_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-3">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Income</p>
                            <p class="value">{{ $total_income }} SAR</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $income_month_percentage !!}</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <div class="box">
                    <p class="box-title">Revenue</p>
                    <p class="box-description">{!! $income_month_percentage !!}</p>
                    <canvas id="revenue-year-chart"></canvas>
                </div>
            </div>

            <div class="col-6">
                <div class="box">
                    <p class="box-title">Monthly Bookings</p>
                    <p class="box-description">{!! $booking_month_percentage !!}</p>
                    <canvas id="booking-year-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="box table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">TENANT</th>
                                <th scope="col">WAREHOUSE</th>
                                <th scope="col">PALLET RENTED</th>
                                <th scope="col">TOTAL RENT</th>
                                <th scope="col">TENANCY DATE</th>
                                <th scope="col">RENEWAL DATE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{!! $item->tenant !!}</td>
                                        <td>{!! $item->warehouse !!}</td>
                                        <td>{{ $item->no_of_pallets }}</td>
                                        <td>{{ $item->total_rent }}</td>
                                        <td>{{ $item->tenancy_date }}</td>
                                        <td>{{ $item->renewal_date }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-backend.delete data="booking"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        const revenueYearChart = document.getElementById('revenue-year-chart');
        new Chart(revenueYearChart, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Last Year Revenue',
                        data: @json($last_year_income_data),
                        borderColor: '#A5A3A4',
                        // backgroundColor: '#F6F6F6',
                        borderWidth: 3,
                        fill: false,
                        pointRadius: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Current Year Revenue',
                        data: @json($current_year_income_data),
                        borderColor: '#EF7C7C',
                        // backgroundColor: '#F9D7D7A3',
                        borderWidth: 3,
                        fill: false,
                        pointRadius: 2,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: false,
                    },
                    legend: {
                        position: 'bottom',
                         labels: {
                            color: '#444'
                        }
                    },
                    tooltip: {
                    enabled: true,
                    callbacks: {
                            label: function(context) {
                                const value = context.parsed.y;

                                return `Revenue: ${value.toLocaleString()} SAR`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const bookingYearChart = document.getElementById('booking-year-chart');
        new Chart(bookingYearChart, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Last Year Bookings',
                        data: @json($last_year_booking_data),
                        borderColor: '#FFAE4C',
                        // backgroundColor: '#EBF0FB',
                        borderWidth: 3,
                        fill: false,
                        pointRadius: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Current Year Bookings',
                        data: @json($current_year_booking_data),
                        borderColor: '#EF7C7C',
                        // backgroundColor: '#FFFAEF',
                        borderWidth: 3,
                        fill: false,
                        pointRadius: 2,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                     title: {
                        display: false,
                    },
                    legend: {
                        position: 'bottom',
                         labels: {
                            color: '#444'
                        }
                    },
                    tooltip: {
                    enabled: true,
                    callbacks: {
                            label: function(context) {
                                const value = context.parsed.y;

                                return `Bookings: ${value.toLocaleString()}`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('landlord.bookings.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });
        });
    </script>
@endpush