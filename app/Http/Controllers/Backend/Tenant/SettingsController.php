<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
        
        $company = Company::firstOrCreate(
            ['user_id' => $user->id],
            [
                'user_id'   => $user->id,
                'status' => 1
            ]
        );

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

        return view('backend.tenant.settings.index', [
            'company' => $company,
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
            'phone' => 'nullable|regex:/^\+?[0-9]+$/|unique:users,phone,'.$user->id,
            'new_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
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
            'route' => route('tenant.settings.index')
        ]);
    }

    public function company(Request $request, User $user, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:0|max:255',
            'address' => 'required|min:0|max:255',
            'email' => 'required|email|min:0|max:255|unique:companies,email,'.$company->id,
            'phone' => 'required|min:0|max:255|regex:/^\+?[0-9]+$/|unique:companies,phone,'.$company->id,
            'website' => 'nullable|url',
            'industry' => 'required|min:0|max:255',
            'date' => 'nullable|date',
            'new_registration_certificates.*' => 'max:30720',
            'status' => 'required|in:0,1'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        // Registration certificates
            $existing_registration_certificates = json_decode($company->registration_certificates ?? '[]', true);
            $current_registration_certificates  = json_decode(htmlspecialchars_decode($request->old_registration_certificates ?? '[]'), true);

            foreach(array_diff($existing_registration_certificates, $current_registration_certificates) as $registration_certificate) {
                Storage::delete('backend/warehouses/' . $registration_certificate);
            }

            if($request->file('new_registration_certificates')) {
                foreach($request->file('new_registration_certificates') as $registration_certificate) {
                    $registration_certificate_name = Str::random(40) . '.' . $registration_certificate->getClientOriginalExtension();
                    $registration_certificate->storeAs('backend/warehouses', $registration_certificate_name);
                    $current_registration_certificates[] = $registration_certificate_name;
                }
            }
            
            $registration_certificates = $current_registration_certificates ? json_encode($current_registration_certificates) : null;
        // Registration certificates

        $data = $request->except(
            'old_registration_certificates',
            'new_registration_certificates'
        );

        $data['registration_certificates'] = $registration_certificates;
        $company->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.settings.index')
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
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        if(!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors([
                'old_password' => 'Incorrect current password'
            ])
            ->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        Auth::logoutOtherDevices($request->old_password);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.settings.index')
        ]);
    }
}