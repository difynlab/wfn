<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AccountApprovalMail;
use App\Mail\CompanyApprovalMail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private function processData($items)
    {
        foreach($items as $item) {
            $item->action = '
            <a href="'. route('admin.users.edit', $item->id) .'" class="action-button edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a href="'. route('admin.users.company.index', $item->id) .'" class="action-button" title="Company"><i class="bi bi-building"></i></a>
            <a id="'.$item->id.'" class="action-button delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            switch ($item->status) {
                case 1:
                    $item->status = '<span class="status active-status">Active</span>';
                    break;

                case 2:
                    $item->status = '<span class="status pending-status">Pending</span>';
                    break;

                default:
                    $item->status = '<span class="status inactive-status">Inactive</span>';
                    break;
            }

            // $item->status = ($item->status == 1) ? '<span class="status active-status">Active</span>' : '<span class="status inactive-status">Inactive</span>';
        }

        return $items;
    }

    public function index(Request $request)
    {
        $pagination = $request->pagination ?? 10;
        $auth = Auth::user();

        User::where('is_new', 1)->where('id', '!=', $auth->id)->update(['is_new' => 0]);

        $items = User::whereNot('id', $auth->id)->orderBy('id', 'desc')->paginate($pagination);
        $items = $this->processData($items);

        return view('backend.admin.users.index', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
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

        return view('backend.admin.users.create', [
            'countries' => $countries
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email',
            'landlord_experience' => 'nullable|min:0|integer',
            'phone_code' => 'required|min:3|max:4',
            'phone' => 'required|digits:9|numeric|unique:users,phone',
            'address' => 'nullable|min:0|max:255',
            'city' => 'required|min:3|max:255',
            'country' => 'required|min:3|max:255',
            'role' => 'required|in:admin,landlord,tenant',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'new_image' => 'nullable|max:30720',
            'status' => 'required|in:0,1,2'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Creation Failed!',
                'route' => route('admin.users.index')
            ]);
        }

        $processed_image = process_image($request->file('new_image'), 'backend/users');

        $data = $request->except('old_image', 'new_image', 'confirm_password');
        $data['image'] = $processed_image;
        $user = User::create($data);

        if($user->role != 'admin') {
            $company = Company::create(
                [
                    'user_id'   => $user->id,
                    'status' => 3
                ]
            );
        }

        return redirect()->route('admin.users.edit', $user)->with([
            'success' => "Update Successful!",
            'route' => route('admin.users.index')
        ]);
    }

    public function edit(User $user)
    {
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

        return view('backend.admin.users.edit', [
            'user' => $user,
            'countries' => $countries
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email,'.$user->id,
            'landlord_experience' => 'nullable|min:0|integer',
            'phone_code' => 'required|min:3|max:4',
            'phone' => 'required|digits:9|numeric|unique:users,phone,'.$user->id,
            'address' => 'nullable|min:0|max:255',
            'city' => 'required|min:3|max:255',
            'country' => 'required|min:3|max:255',
            'role' => 'required|in:admin,landlord,tenant',
            'new_image' => 'nullable|max:30720',
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.users.index')
            ]);
        }

        $data = $request->except(
            'old_image',
            'new_image',
            'password',
            'confirm_password'
        );

        if($request->password) {
            $validator = Validator::make($request->all(), [
                'password' => 'nullable|min:8',
                'confirm_password' => 'nullable|same:password',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with([
                    'error' => 'Update Failed!',
                    'route' => route('admin.users.index')
                ]);
            }

            $data['password'] = Hash::make($request->password);
        }

        if($request->file('new_image')) {
            $processed_image = process_image($request->file('new_image'), 'backend/users', $request->old_image);
        }
        else {
            $processed_image = $request->old_image;
        }

        if($user->status != $request->status && $request->status == 1) {
            $mail_data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'role' => $user->role,
            ];

            send_email(new AccountApprovalMail($mail_data), $request->email);
        }

        $data['image'] = $processed_image;
        $user->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.users.index')
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted!');
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $role = $request->role;
        $city = $request->city;
        $status = $request->status;
        $column = $request->column ?? 'id';
        $direction = $request->direction ?? 'desc';
        
        $admin = Auth::user();

        $valid_columns = ['name', 'city', 'country', 'email', 'role', 'status', 'id'];
        $valid_directions = ['asc', 'desc'];

        if(!in_array($column, $valid_columns)) {
            $column = 'id';
        }

        if(!in_array($direction, $valid_directions)) {
            $direction = 'desc';
        }

        if($column === 'name') {
            $column = 'first_name';
            // $column = DB::raw("CONCAT(first_name, ' ', last_name)");
        }

        $items = User::whereNot('id', $admin->id)->orderBy($column, $direction);

        if($name) {
            $items->where(function ($query) use ($name) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $name . '%'])
                      ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ['%' . $name . '%']);
            });
        }

        if($role) {
            $items->where('role', $role);
        }

        if($city) {
            $items->where('city', 'like', '%' . $city . '%');
        }

        if($status != null) {
            $items->where('status', $status);
        }

        $pagination = $request->pagination ?? 10;
        $items = $items->paginate($pagination);
        $items = $this->processData($items);

        if($request->ajax()) {
            $tbodyView = view('backend.admin.users._tbody', compact('items'))->render();
            $paginationView = $items->appends($request->except('page'))->links("pagination::bootstrap-5")->render();

            return response()->json([
                'tbody' => $tbodyView,
                'pagination' => $paginationView,
            ]);
        }

        return view('backend.admin.users.index', [
            'items' => $items,
            'pagination' => $pagination,
            'name' => $name,
            'role' => $role,
            'city' => $city,
            'status' => $status
        ]);
    }

    public function company(User $user)
    {
        return view('backend.admin.users.company', [
            'user' => $user,
            'company' => $user->company
        ]);
    }

    public function companyUpdate(Request $request, User $user, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'cr_number' => 'required|string|digits:10',
            'email' => 'required|email|min:0|max:255|unique:companies,email,'.$company->id,
            'phone_code' => 'required|min:3|max:4',
            'phone' => 'required|digits:9|numeric|unique:companies,phone,'.$company->id,
            'website' => 'nullable|regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/[\w\-._~:\/?#[\]@!$&\'()*+,;=]*)?$/',
            'industry' => 'required|in:retail,e-commerce,manufacturing,logistics and transportation,food and beverage,pharmaceuticals,automotive,textiles and apparel,electronics,construction,consumer goods,chemicals,furniture and home goods,aerospace,energy and utilities',
            'date' => 'nullable|date',
            'new_registration_certificates.*' => 'max:30720',
            'status' => 'required|in:0,1,2'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.users.index')
            ]);
        }

        // Registration certificates
            $existing_registration_certificates = json_decode($company->registration_certificates ?? '[]', true);
            $current_registration_certificates  = json_decode(htmlspecialchars_decode($request->old_registration_certificates ?? '[]'), true);

            foreach(array_diff($existing_registration_certificates, $current_registration_certificates) as $registration_certificate) {
                $processed_image = process_image(null, 'backend/warehouses', $registration_certificate);
                $processed_image = process_image(null, 'backend/warehouses/thumbnails', $registration_certificate);
            }

            if($request->file('new_registration_certificates')) {
                foreach($request->file('new_registration_certificates') as $registration_certificate) {
                    $processed_image = process_image($registration_certificate, 'backend/warehouses');
                    $current_registration_certificates[] = $processed_image;
                }
            }
            
            $registration_certificates = $current_registration_certificates ? json_encode($current_registration_certificates) : null;
        // Registration certificates

        $data = $request->except(
            'old_registration_certificates',
            'new_registration_certificates'
        );

        if($company->status != $request->status && $request->status == 1) {
            $mail_data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'role' => $user->role,
            ];

            send_email(new CompanyApprovalMail($mail_data), $user->email);
        }

        $data['registration_certificates'] = $registration_certificates;
        $company->fill($data)->save();
        
        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.users.index')
        ]);
    }
}