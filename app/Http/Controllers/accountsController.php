<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class accountsController extends Controller
{
    public function accOverview()
    {
        // Check if the session variable 'loadid' is set
        if (session('loadid')) {
            $accid="1-89935767";

            // Fetch user details using the loadid
            $token = '9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13';
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get('https://my.vestrado.com/rest/accounts/balance/' . $accid);

            if ($response->successful()) {
                $data = $response->json();
                return view('acc_overview', [
                    'data' => $data, // User details
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Failed to fetch user details');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }


    public function checkBalance()
    {
        if (session('loadid'))
        {
            $loadid = session('loadid');
            // Define the API URL
            $url = 'https://my.vestrado.com/rest/accounts/check-balance';

            // Set the headers
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 9083b30e232b13336f9f6aa64bb753221d6d5d4ba1ebe441d4d78c521522f78d145110b7bc30a23016a5bbd12f561fb6225b10438bf428d0888d5b13',
            ];

            // Set the body
            $body = [
                'userId' => $loadid,
            ];

            // Send the POST request
            $response = Http::withHeaders($headers)->post($url, $body);

            if ($response->successful()) {
                $data = $response->json();
                return view('check_balance', ['data' => $data]);
                //return view('check_balance', ['data' => $data[0]]);
            } else {
                $error = [
                    'status' => $response->status(),
                    'message' => $response->body(),
                ];
                return redirect()->back()->with('error', $error['message']);
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }

}
