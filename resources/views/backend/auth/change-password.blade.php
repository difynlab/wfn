@extends('frontend.layouts.app')

@section('title', 'Change Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')
    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">


            <div class="col-12 col-lg-8 main-content ps-lg-5">

                <div class="change-password-container">
                    <div class="text-centered mb-4">
                        <h1 class="fs-31 mb-3" style="font-weight: 500; line-height: 46.5px; color: #0e0e0e;">{{ $student_dashboard_contents->change_password_title }}</h1>
                        <p class="fs-20" style="font-weight: 400; line-height: 30px; color: #505050;">{{ $student_dashboard_contents->change_password_sub_title }}</p>
                    </div>

                    <div class="password-rules-container my-4">
                        <h5>{{ $student_dashboard_contents->change_password_rule_title }}</h5>
                        <div class="password-rules-list flex-column flex-md-row">
                            <div class="password-rule-item">
                                <span class="rule-title">{{ $student_dashboard_contents->change_password_rule_1_title }}</span>
                                <span class="rule-desc">{{ $student_dashboard_contents->change_password_rule_1_description }}</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">{{ $student_dashboard_contents->change_password_rule_2_title }}</span>
                                <span class="rule-desc">{{ $student_dashboard_contents->change_password_rule_2_description }}</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">{{ $student_dashboard_contents->change_password_rule_3_title }}</span>
                                <span class="rule-desc">{{ $student_dashboard_contents->change_password_rule_3_description }}</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">{{ $student_dashboard_contents->change_password_rule_4_title }}</span>
                                <span class="rule-desc">{{ $student_dashboard_contents->change_password_rule_4_description }}</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">{{ $student_dashboard_contents->change_password_rule_5_title }}</span>
                                <span class="rule-desc">{{ $student_dashboard_contents->change_password_rule_5_description }}</span>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('frontend.change-password') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="form-group position-relative">
                                    <label for="new-password">{{ $student_dashboard_contents->change_password_new_password }}</label>
                                    <input type="password" class="form-control pr-5" id="new-password" name="password" placeholder="{{ $student_dashboard_contents->change_password_new_password }}" required>
                                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                                </div>
                            
                                <div class="form-group position-relative">
                                    <label for="confirm-password">{{ $student_dashboard_contents->change_password_confirm_password }}</label>
                                    <input type="password" class="form-control pr-5" id="confirm-password" name="confirm_password" placeholder="{{ $student_dashboard_contents->change_password_confirm_password }}" required>
                                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                                </div>

                                <div class="change-password-button">
                                    <button type="submit" class="btn btn-change-password">{{ $student_dashboard_contents->change_password_button }}</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush