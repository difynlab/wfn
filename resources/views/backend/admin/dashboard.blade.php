@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page dashboard">
        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <p class="title">Dashboard</p>
                <p class="description">Manage and track operations seamlessly here.</p>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Tenants</p>
                            <p class="value">{{ $total_tenants }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-key"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $tenant_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Landlords</p>
                            <p class="value">{{ $total_landlords }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-house-lock"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $landlord_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-md-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Warehouses</p>
                            <p class="value">{{ $total_warehouses }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-houses"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $warehouse_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
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

        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <div class="box">
                    <p class="box-title">Revenue</p>
                    <p class="box-description">{!! $income_month_percentage !!}</p>
                    <canvas id="revenue-year-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12 col-xl-6 mb-3 mb-md-4 mb-xl-0">
                <div class="box">
                    <p class="box-title">Monthly Registered Users</p>
                    <p class="box-description">{!! $user_month_percentage !!}</p>
                    <canvas id="user-year-chart"></canvas>
                </div>
            </div>

            <div class="col-12 col-xl-6">
                <div class="box">
                    <p class="box-title">Monthly Bookings</p>
                    <p class="box-description">{!! $booking_month_percentage !!}</p>
                    <canvas id="booking-year-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-xl-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="left">
                            <p class="text">Total Pallets</p>
                            <p class="value">{{ $total_pallets }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-boxes"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-xl-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="left">
                            <p class="text">Available Pallets</p>
                            <p class="value">{{ $available_pallets }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3 mb-3 mb-md-0">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="left">
                            <p class="text">Rented Pallets</p>
                            <p class="value">{{ $rented_pallets }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-box"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="left">
                            <p class="text">Occupancy Rate</p>
                            <p class="value">{{ $occupancy_rate }}%</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-percent"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12 col-xl-6 mb-3 mb-md-4 mb-xl-0">
                <div class="box">
                    <p class="box-title">Pallet Distribution</p>
                    <p class="box-description">{!! $pallet_month_percentage !!}</p>
                    <canvas id="pallet-year-chart"></canvas>
                </div>
            </div>

            <div class="col-12 col-xl-6">
                <div class="box">
                    <p class="box-title">Occupancy Rate</p>
                    <p class="box-description">{!! $pallet_month_percentage !!}</p>
                    <canvas id="occupancy-year-chart"></canvas>
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
                                <th scope="col">PALLETS RENTED</th>
                                <th scope="col">NO OF SQ.M RENTED</th>
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
                                        <td>{{ $item->no_of_pallets ?? '-' }}</td>
                                        <td>{{ $item->no_of_square_meters ?? '-' }}</td>
                                        <td>{{ $item->total_rent ? $item->total_rent . ' SAR' : '-' }}</td>
                                        <td>{{ $item->tenancy_date }}</td>
                                        <td>{{ $item->renewal_date }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" style="text-align: center;">No data available in the table</td>
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
        const userYearChart = document.getElementById('user-year-chart');
        new Chart(userYearChart, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Last Year Users',
                        data: @json($last_year_user_data),
                        borderColor: '#FFAE4C',
                        // backgroundColor: '#EBF0FB',
                        borderWidth: 3,
                        fill: false,
                        pointRadius: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Current Year Users',
                        data: @json($current_year_user_data),
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

                                return `Users: ${value.toLocaleString()}`;
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
        const palletYearChart = document.getElementById('pallet-year-chart');
        new Chart(palletYearChart, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Last Year Pallets',
                        data: @json($last_year_pallet_data),
                        // borderColor: '#FFAE4C',
                        backgroundColor: '#FFAE4C',
                        borderWidth: 0,
                        fill: false,
                    },
                    {
                        label: 'Current Year Pallets',
                        data: @json($current_year_pallet_data),
                        // borderColor: '#EF7C7C',
                        backgroundColor: '#EF7C7C',
                        borderWidth: 0,
                        fill: false,
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

                                return `Pallets: ${value.toLocaleString()}`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const occupancyYearChart = document.getElementById('occupancy-year-chart');
        new Chart(occupancyYearChart, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Last Year Pallet Occupancy Rate',
                        data: @json($last_year_pallet_occupancy_data),
                        // borderColor: '#FFAE4C',
                        backgroundColor: '#FFAE4C',
                        borderWidth: 0,
                        fill: false,
                    },
                    {
                        label: 'Current Year Pallet Occupancy Rate',
                        data: @json($current_year_pallet_occupancy_data),
                        // borderColor: '#EF7C7C',
                        backgroundColor: '#EF7C7C',
                        borderWidth: 0,
                        fill: false,
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

                                return `Occupancy Rate: ${value.toLocaleString()}%`;
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
                let url = "{{ route('admin.bookings.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });
        });
    </script>
@endpush