<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountRegisterMail;
use App\Mail\AdminAccountRegisterMail;
use App\Models\AuthenticationContent;
use App\Models\Company;
use App\Models\User;
use App\Services\Recaptcha;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // public function testOdoo()
    // {
    //     $url = config('services.odoo.url');
    //     $db = config('services.odoo.db');
    //     $username = config('services.odoo.username');
    //     $password = config('services.odoo.password');

    //     $client = new Client();

    //     $auth = $client->post($url, [
    //         'json' => [
    //             'jsonrpc' => '2.0',
    //             'method'  => 'call',
    //             'params'  => [
    //                 'service' => 'common',
    //                 'method'  => 'authenticate',
    //                 'args'    => [$db, $username, $password, []],
    //             ],
    //             'id' => 1,
    //         ],
    //     ])->getBody()->getContents();

    //     $uid = data_get(json_decode($auth, true), 'result');

    //     $create = $client->post($url, [
    //         'json' => [
    //             'jsonrpc' => '2.0',
    //             'method'  => 'call',
    //             'params'  => [
    //                 'service' => 'object',
    //                 'method'  => 'execute_kw',
    //                 'args'    => [
    //                     $db, $uid, $password,
    //                     'res.partner', 'create',
    //                     [[
    //                         'name'  => 'Yaarah Zajjel',
    //                         'email' => 'yaarahzajjel@yosdsapmail.com',
    //                         'city' => 'Pottuvil',
    //                         'city' => 'Pottuvil',
    //                     ]],
    //                 ],
    //             ],
    //             'id' => 2,
    //         ],
    //     ])->getBody()->getContents();

    //     $partnerId = data_get(json_decode($create, true), 'result');
    //     dd($partnerId);
    // }

    public function register()
    {
        $contents = AuthenticationContent::find(1);

        $countries = config('countries');

        return view('frontend.auth.register', [
            'contents' => $contents,
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {
        $recaptcha_token = $request->input('recaptcha_token');

        if(empty($recaptcha_token)) {
            Log::warning('reCAPTCHA token missing or empty', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'activity' => 'register',
            ]);
            
            return redirect()->back()->withErrors(['email' => 'reCAPTCHA token missing'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'role' => 'required|in:tenant,landlord',
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255|unique:users,email',
            'phone' => 'required|min:3|max:255|regex:/^\+?[0-9]+$/|unique:users,phone',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'recaptcha_token' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request, $recaptcha_token) {
            $check = Recaptcha::verify($recaptcha_token, 'register');

            if(!$check['passes']) {
                $validator->errors()->add('role', 'reCAPTCHA verification failed.');

                Log::warning('Captcha verification failed', [
                    'ip' => $request->ip(),
                    'score' => $check['score'],
                    'activity' => 'register',
                    'user_agent' => $request->userAgent(),
                ]);
            }
        });

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Registration Failed!',
                'message' => 'Please fix the issues and try again.',
            ]);
        }

        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'phone_code',
            'phone',
            'address',
            'city',
            'country',
            'landlord_experience',
        ]);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->forceFill([
            'role' => $request->role,
            'status' => 1,
        ])->save();

        $company = new Company();
        $company->forceFill([
            'user_id' => $user->id,
            'status' => 3,
        ])->save();

        // ODOO INTEGRATION
            try {
                $url = config('services.odoo.url');
                $db = config('services.odoo.db');
                $username = config('services.odoo.username');
                $password = config('services.odoo.password');

                $client = new Client();

                $auth = $client->post($url, [
                    'json' => [
                        'jsonrpc' => '2.0',
                        'method'  => 'call',
                        'params'  => [
                            'service' => 'common',
                            'method'  => 'authenticate',
                            'args'    => [$db, $username, $password, []],
                        ],
                        'id' => 1,
                    ],
                ])->getBody()->getContents();

                $uid = data_get(json_decode($auth, true), 'result');

                $create = $client->post($url, [
                    'json' => [
                        'jsonrpc' => '2.0',
                        'method'  => 'call',
                        'params'  => [
                            'service' => 'object',
                            'method'  => 'execute_kw',
                            'args'    => [
                                $db, $uid, $password,
                                'res.partner', 'create',
                                [[
                                    'name'  => $request->first_name . ' ' . $request->last_name,
                                    'email' => $request->email,
                                    'phone' => $request->phone_code . '' . $request->phone
                                ]],
                            ],
                        ],
                        'id' => 2,
                    ],
                ])->getBody()->getContents();
            }
            catch (\Throwable $e) {
                Log::warning('Failed to sync contact to Odoo: '.$e->getMessage());
            }

            // try {
            //     $baseUrl  = rtrim(config('services.odoo.url'), '/');   // e.g. https://odoo.example.com
            //     $url      = $baseUrl.'/jsonrpc';
            //     $db       = config('services.odoo.db');
            //     $username = config('services.odoo.username');
            //     $password = config('services.odoo.password');

            //     $client = new Client([
            //         'http_errors' => false,      // don't throw on 4xx/5xx; we'll inspect responses
            //         'timeout'     => 20,
            //         'connect_timeout' => 10,
            //         // 'verify' => false,        // uncomment ONLY if you have a self-signed cert in dev
            //     ]);

            //     // --- Authenticate ---
            //     $authRes = $client->post($url, [
            //         'json' => [
            //             'jsonrpc' => '2.0',
            //             'method'  => 'call',
            //             'params'  => [
            //                 'service' => 'common',
            //                 // Odoo JSON-RPC uses "login" here (authenticate exists on XML-RPC)
            //                 'method'  => 'login',
            //                 'args'    => [$db, $username, $password],
            //             ],
            //             'id' => 1,
            //         ],
            //     ]);

            //     $authBody = (string) $authRes->getBody();
            //     $auth = json_decode($authBody, true);

            //     if (json_last_error() !== JSON_ERROR_NONE) {
            //         throw new \RuntimeException('Invalid JSON from Odoo auth: '.json_last_error_msg()." | body={$authBody}");
            //     }

            //     if (isset($auth['error'])) {
            //         // JSON-RPC level error
            //         throw new \RuntimeException('Odoo auth error: '.json_encode($auth['error']));
            //     }

            //     $uid = $auth['result'] ?? null;
            //     if (empty($uid)) {
            //         throw new \RuntimeException('Odoo auth failed: uid is empty/false. Check DB, username, or password.');
            //     }

            //     // --- Create Contact (res.partner) ---
            //     $partnerPayload = [
            //         'name'  => trim($request->first_name.' '.$request->last_name),
            //         'email' => $request->email,
            //         'phone' => ($request->phone_code ?? '').($request->phone ?? ''), // ensure e.g. +94xxxxxxxxx
            //     ];

            //     $createRes = $client->post($url, [
            //         'json' => [
            //             'jsonrpc' => '2.0',
            //             'method'  => 'call',
            //             'params'  => [
            //                 'service' => 'object',
            //                 'method'  => 'execute_kw',
            //                 'args'    => [
            //                     $db, $uid, $password,
            //                     'res.partner', 'create',
            //                     [[$partnerPayload]], // positional args
            //                     // optional kwargs go in a separate dict after this, e.g. {}
            //                 ],
            //             ],
            //             'id' => 2,
            //         ],
            //     ]);

            //     $createBody = (string) $createRes->getBody();
            //     $create = json_decode($createBody, true);

            //     if (json_last_error() !== JSON_ERROR_NONE) {
            //         throw new \RuntimeException('Invalid JSON from Odoo create: '.json_last_error_msg()." | body={$createBody}");
            //     }

            //     if (isset($create['error'])) {
            //         // JSON-RPC level error from execute_kw
            //         throw new \RuntimeException('Odoo create error: '.json_encode($create['error']).' | payload='.json_encode($partnerPayload));
            //     }

            //     $partnerId = $create['result'] ?? null;
            //     if (empty($partnerId)) {
            //         throw new \RuntimeException('Odoo create returned empty result. Raw: '.$createBody);
            //     }

            //     Log::info('Odoo: created res.partner id='.$partnerId.' for '.$partnerPayload['email']);
            // }
            // catch (\Throwable $e) {
            //     Log::warning('Failed to sync contact to Odoo: '.$e->getMessage());
            // }
        // ODOO INTEGRATION

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'role' => $user->role,
            'created_at' => $user->created_at,
        ];

        send_email(new AccountRegisterMail($mail_data), $request->email);
        send_email(new AdminAccountRegisterMail($mail_data), config('app.admin_email'));

        Auth::login($user);
        $request->session()->regenerate();

        // if($user->role == 'landlord') {
        //     return redirect()->route('landlord.dashboard');
        // }
        // else {
        //     return redirect()->route('tenant.dashboard');
        // }

        return redirect()->route('homepage.index')->with([
            'success' => 'Account Created',
            'message' => 'Welcome to WFN',
        ]);

        // return redirect()->route('homepage.index')->with([
        //     'success' => 'Account Created',
        //     'message' => 'We will review and approve your account as soon as possible.',
        // ]);
    }
}