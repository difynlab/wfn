<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Setting::find(1);

        $countries = [
            "Afghanistan",
            "Aland Islands",
            "Albania",
            "Algeria",
            "American Samoa",
            "Andorra",
            "Angola",
            "Anguilla",
            "Antarctica",
            "Antigua and Barbuda",
            "Argentina",
            "Armenia",
            "Aruba",
            "Australia",
            "Austria",
            "Azerbaijan",
            "Bahamas",
            "Bahrain",
            "Bangladesh",
            "Barbados",
            "Belarus",
            "Belgium",
            "Belize",
            "Benin",
            "Bermuda",
            "Bhutan",
            "Bolivia",
            "Bonaire, Sint Eustatius and Saba",
            "Bosnia and Herzegovina",
            "Botswana",
            "Bouvet Island",
            "Brazil",
            "British Indian Ocean Territory",
            "Brunei Darussalam",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Cambodia",
            "Cameroon",
            "Canada",
            "Cape Verde",
            "Cayman Islands",
            "Central African Republic",
            "Chad",
            "Chile",
            "China",
            "Christmas Island",
            "Cocos (Keeling) Islands",
            "Colombia",
            "Comoros",
            "Congo",
            "Congo, Democratic Republic of the Congo",
            "Cook Islands",
            "Costa Rica",
            "Cote D'Ivoire",
            "Croatia",
            "Cuba",
            "Curacao",
            "Cyprus",
            "Czech Republic",
            "Denmark",
            "Djibouti",
            "Dominica",
            "Dominican Republic",
            "Ecuador",
            "Egypt",
            "El Salvador",
            "Equatorial Guinea",
            "Eritrea",
            "Estonia",
            "Ethiopia",
            "Falkland Islands (Malvinas)",
            "Faroe Islands",
            "Fiji",
            "Finland",
            "France",
            "French Guiana",
            "French Polynesia",
            "French Southern Territories",
            "Gabon",
            "Gambia",
            "Georgia",
            "Germany",
            "Ghana",
            "Gibraltar",
            "Greece",
            "Greenland",
            "Grenada",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernsey",
            "Guinea",
            "Guinea-Bissau",
            "Guyana",
            "Haiti",
            "Heard Island and Mcdonald Islands",
            "Holy See (Vatican City State)",
            "Honduras",
            "Hong Kong",
            "Hungary",
            "Iceland",
            "India",
            "Indonesia",
            "Iran, Islamic Republic of",
            "Iraq",
            "Ireland",
            "Isle of Man",
            "Israel",
            "Italy",
            "Jamaica",
            "Japan",
            "Jersey",
            "Jordan",
            "Kazakhstan",
            "Kenya",
            "Kiribati",
            "Korea, Democratic People's Republic of",
            "Korea, Republic of",
            "Kosovo",
            "Kuwait",
            "Kyrgyzstan",
            "Lao People's Democratic Republic",
            "Latvia",
            "Lebanon",
            "Lesotho",
            "Liberia",
            "Libyan Arab Jamahiriya",
            "Liechtenstein",
            "Lithuania",
            "Luxembourg",
            "Macao",
            "Macedonia, the Former Yugoslav Republic of",
            "Madagascar",
            "Malawi",
            "Malaysia",
            "Maldives",
            "Mali",
            "Malta",
            "Marshall Islands",
            "Martinique",
            "Mauritania",
            "Mauritius",
            "Mayotte",
            "Mexico",
            "Micronesia, Federated States of",
            "Moldova, Republic of",
            "Monaco",
            "Mongolia",
            "Montenegro",
            "Montserrat",
            "Morocco",
            "Mozambique",
            "Myanmar",
            "Namibia",
            "Nauru",
            "Nepal",
            "Netherlands",
            "Netherlands Antilles",
            "New Caledonia",
            "New Zealand",
            "Nicaragua",
            "Niger",
            "Nigeria",
            "Niue",
            "Norfolk Island",
            "Northern Mariana Islands",
            "Norway",
            "Oman",
            "Pakistan",
            "Palau",
            "Palestinian Territory, Occupied",
            "Panama",
            "Papua New Guinea",
            "Paraguay",
            "Peru",
            "Philippines",
            "Pitcairn",
            "Poland",
            "Portugal",
            "Puerto Rico",
            "Qatar",
            "Reunion",
            "Romania",
            "Russian Federation",
            "Rwanda",
            "Saint Barthelemy",
            "Saint Helena",
            "Saint Kitts and Nevis",
            "Saint Lucia",
            "Saint Martin",
            "Saint Pierre and Miquelon",
            "Saint Vincent and the Grenadines",
            "Samoa",
            "San Marino",
            "Sao Tome and Principe",
            "Saudi Arabia",
            "Senegal",
            "Serbia",
            "Serbia and Montenegro",
            "Seychelles",
            "Sierra Leone",
            "Singapore",
            "Sint Maarten",
            "Slovakia",
            "Slovenia",
            "Solomon Islands",
            "Somalia",
            "South Africa",
            "South Georgia and the South Sandwich Islands",
            "South Sudan",
            "Spain",
            "Sri Lanka",
            "Sudan",
            "Suriname",
            "Svalbard and Jan Mayen",
            "Swaziland",
            "Sweden",
            "Switzerland",
            "Syrian Arab Republic",
            "Taiwan, Province of China",
            "Tajikistan",
            "Tanzania, United Republic of",
            "Thailand",
            "Timor-Leste",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinidad and Tobago",
            "Tunisia",
            "Turkey",
            "Turkmenistan",
            "Turks and Caicos Islands",
            "Tuvalu",
            "Uganda",
            "Ukraine",
            "United Arab Emirates",
            "United Kingdom",
            "United States",
            "United States Minor Outlying Islands",
            "Uruguay",
            "Uzbekistan",
            "Vanuatu",
            "Venezuela",
            "Viet Nam",
            "Virgin Islands, British",
            "Virgin Islands, U.s.",
            "Wallis and Futuna",
            "Western Sahara",
            "Yemen",
            "Zambia",
            "Zimbabwe"
        ];

        return view('backend.admin.settings.index', [
            'items' => $items,
            'user' => $user,
            'countries' => $countries
        ]);
    }

    public function profile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:0|max:255',
            'last_name' => 'required|min:0|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email,'.$user->id,
            'new_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        // Image
            if($request->file('new_image')) {
                if($request->old_image) {
                    Storage::delete('backend/users/' . $request->old_image);
                }

                $image = $request->file('new_image');
                $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('backend/users', $image_name);
            }
            else if($request->old_image == null) {
                if($user->image) {
                    Storage::delete('backend/users/' . $user->image);
                }

                $image_name = null;
            }
            else {
                $image_name = $request->old_image;
            }
        // Image
        
        $data = $request->except(
            'old_image',
            'new_image'
        );

        $data['image'] = $image_name;
        $user->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
        ]);
    }

    public function website(Request $request, Setting $setting)
    {
        $validator = Validator::make($request->all(), [
            'new_logo' => 'nullable|max:30720',
            'new_favicon' => 'nullable|max:30720',
            'new_guest_image' => 'nullable|max:30720',
            'new_no_image' => 'nullable|max:30720',
            'new_no_profile_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'active_tab' => 'website',
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        // Logo
            if($request->file('new_logo')) {
                if($request->old_logo) {
                    Storage::delete('backend/global/' . $request->old_logo);
                }

                $new_logo = $request->file('new_logo');
                $logo_name = 'logo.' . $new_logo->getClientOriginalExtension();
                $new_logo->storeAs('backend/global', $logo_name);
            }
            else {
                $logo_name = $request->old_logo;
            }
        // Logo

        // Favicon
            if($request->file('new_favicon')) {
                if($request->old_favicon) {
                    Storage::delete('backend/global/' . $request->old_favicon);
                }

                $new_favicon = $request->file('new_favicon');
                $favicon_name = 'favicon.' . $new_favicon->getClientOriginalExtension();
                $new_favicon->storeAs('backend/global', $favicon_name);
            }
            else {
                $favicon_name = $request->old_favicon;
            }
        // Favicon

        // Guest image
            if($request->file('new_guest_image')) {
                if($request->old_guest_image) {
                    Storage::delete('backend/global/' . $request->old_guest_image);
                }

                $new_guest_image = $request->file('new_guest_image');
                $guest_image_name = 'guest-image.' . $new_guest_image->getClientOriginalExtension();
                $new_guest_image->storeAs('backend/global', $guest_image_name);
            }
            else {
                $guest_image_name = $request->old_guest_image;
            }
        // Guest image

        // Footer logo
            if($request->file('new_footer_logo')) {
                if($request->old_footer_logo) {
                    Storage::delete('backend/global/' . $request->old_footer_logo);
                }

                $new_footer_logo = $request->file('new_footer_logo');
                $footer_logo_name = 'footer-logo.' . $new_footer_logo->getClientOriginalExtension();
                $new_footer_logo->storeAs('backend/global', $footer_logo_name);
            }
            else {
                $footer_logo_name = $request->old_footer_logo;
            }
        // Footer logo

        // No image
            if($request->file('new_no_image')) {
                if($request->old_no_image) {
                    Storage::delete('backend/global/' . $request->old_no_image);
                }

                $new_no_image = $request->file('new_no_image');
                $no_image_name = 'no-image.' . $new_no_image->getClientOriginalExtension();
                $new_no_image->storeAs('backend/global', $no_image_name);
            }
            else {
                $no_image_name = $request->old_no_image;
            }
        // No image

        // No profile image
            if($request->file('new_no_profile_image')) {
                if($request->old_no_profile_image) {
                    Storage::delete('backend/global/' . $request->old_no_profile_image);
                }

                $new_no_profile_image = $request->file('new_no_profile_image');
                $no_profile_image_name = 'no-profile-image.' . $new_no_profile_image->getClientOriginalExtension();
                $new_no_profile_image->storeAs('backend/global', $no_profile_image_name);
            }
            else {
                $no_profile_image_name = $request->old_no_profile_image;
            }
        // No profile image

        $data = $request->except(
            'old_logo',
            'new_logo',
            'old_favicon',
            'new_favicon',
            'old_guest_image',
            'new_guest_image',
            'old_footer_logo',
            'new_footer_logo',
            'old_no_image',
            'new_no_image',
            'old_no_profile_image',
            'new_no_profile_image'
        );

        $data['logo'] = $logo_name;
        $data['favicon'] = $favicon_name;
        $data['guest_image'] = $guest_image_name;
        $data['footer_logo'] = $footer_logo_name;
        $data['no_image'] = $no_image_name;
        $data['no_profile_image'] = $no_profile_image_name;
        $setting->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
        ]);
    }

    public function password(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'active_tab' => 'password',
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        if(!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors([
                'old_password' => 'Incorrect current password'
            ])
            ->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        Auth::logoutOtherDevices($request->old_password);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
        ]);
    }
}