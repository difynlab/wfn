@php
    $contents = App\Models\CommonContent::find(1);
    $about = App\Models\AboutContent::find(1);
    $article = App\Models\ArticleContent::find(1);
    $support = App\Models\SupportContent::find(1);
    $privacy_policy = App\Models\PrivacyPolicyContent::find(1);
    $terms_of_use = App\Models\TermsOfUseContent::find(1);
    $warehouses = App\Models\WarehouseContent::find(1);

    $setting = App\Models\Setting::find(1);
    $facebook_url = $setting->{'fb_' . $middleware_language} ?? $setting->fb_en;
    $instagram_url = $setting->{'instagram_' . $middleware_language} ?? $setting->instagram_en;
@endphp

<div class="container-fluid footer">
    <div class="container-lg">
        <div class="top">
            <p class="text">{{ $contents->{'footer_title_' . $middleware_language} ?? $contents->footer_title_en }}</p>
            <p class="text">{{ $contents->{'footer_sub_title_' . $middleware_language} ?? $contents->footer_sub_title_en }}</p>

            <a href="{{ route('register') }}" class="button">{{ $contents->{'footer_button_' . $middleware_language} ?? $contents->footer_button_en }}</a>
        </div>

        <div class="bottom">
            <div class="row">
                <div class="col-6 col-sm-3 mb-4 mb-sm-0">
                    <p class="title">{{ $contents->{'footer_first_menu_' . $middleware_language} ?? $contents->footer_first_menu_en }}</p>
                    <ul>
                        <li>
                            <a href="{{ route('about.index') }}">{{ $about->{'page_name_' . $middleware_language} ?? $about->page_name_en }}</a>
                        </li>

                        <li>
                            <a href="{{ route('warehouses.index') }}">{{ $warehouses->{'page_name_' . $middleware_language} ?? $warehouses->page_name_en }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-3 mb-4 mb-sm-0">
                    <p class="title">{{ $contents->{'footer_second_menu_' . $middleware_language} ?? $contents->footer_second_menu_en }}</p>
                    <ul>
                        <li>
                            <a href="{{ route('articles.index') }}">{{ $article->{'page_name_' . $middleware_language} ?? $article->page_name_en }}</a>
                        </li>

                        <li>
                            <a href="{{ route('supports.index') }}">{{ $support->{'page_name_' . $middleware_language} ?? $support->page_name_en }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-3">
                    <p class="title">{{ $contents->{'footer_third_menu_' . $middleware_language} ?? $contents->footer_third_menu_en }}</p>
                    <ul>
                        <li>
                            <a href="{{ route('privacy-policy') }}">{{ $privacy_policy->{'page_name_' . $middleware_language} ?? $privacy_policy->page_name_en }}</a>
                        </li>

                        <li>
                            <a href="{{ route('terms-of-use') }}">{{ $terms_of_use->{'page_name_' . $middleware_language} ?? $terms_of_use->page_name_en }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-3">
                    <p class="title">{{ $contents->{'footer_fourth_menu_' . $middleware_language} ?? $contents->footer_fourth_menu_en }}</p>
                    <ul>
                        <li>
                            <a href="{{ $facebook_url ?? '#' }}" target="_blank">{{ $contents->{'footer_facebook_' . $middleware_language} ?? $contents->footer_facebook_en }}</a>
                        </li>

                        <li>
                            <a href="{{ $instagram_url ?? '#' }}" target="_blank">{{ $contents->{'footer_instagram_' . $middleware_language} ?? $contents->footer_instagram_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr />

        <div class="copyright">
            <div class="row align-items-center">
                <div class="d-none d-sm-block col-sm-3 col-md-6">
                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->footer_logo) }}" alt="Logo" class="logo">
                </div>

                <div class="col-12 col-sm-9 col-md-6 text-center text-sm-end">
                    <p class="text">&#169; {{ $contents->{'footer_copyright_' . $middleware_language} ?? $contents->footer_copyright_en }}</p>
                </div>
            </div>
        </div>
    </div>
</div>