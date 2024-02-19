<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    private $token;
    private $sandbox = "https://api-m.sandbox.paypal.com/v1/";

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');
        $auth = "Basic ".base64_encode($payPalConfig['client_id'].":".$payPalConfig['secret']);

        $client = new Client();
        $headers = [
        'Accept-Language' => 'en_US',
        'Accept' => 'application/json',
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Authorization' => $auth
        ];
        $options = [
        'form_params' => [
        'grant_type' => 'client_credentials'
        ]];
        $request = new Psr7Request('POST', $this->sandbox.'oauth2/token', $headers);
        $res = $client->sendAsync($request, $options)->wait();

        $result = json_decode($res->getBody());
        $this->token = $result->access_token;
        // dd($this->token);
    }

    // ...

    public function payWithPayPal()
    {

        $auth = "Bearer ".$this->token;
        $url = url('/paypal/status');
        $money = 50;
        $client = new Client();
        $headers = [
        'Authorization' => $auth,
        'Content-Type' => 'application/json'
        ];
        $body = '{
        "intent": "sale",
        "payer": {
            "payment_method": "paypal"
        },
        "transactions": [
            {
            "amount": {
                "total": "'.$money.'",
                "currency": "USD"
            },
            "description": "Bill Id"
            }
        ],
        "redirect_urls": {
            "return_url": "'.$url.'",
            "cancel_url": "'.$url.'"
        }
        }';

        $request = new Psr7Request('POST', $this->sandbox.'payments/payment', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();
    }

    public function payPalStatus(Request $request)
    {

        $auth = "Bearer ".$this->token;
        $client = new Client();
        $headers = [
        'Authorization' => $auth,
        'Content-Type' => 'application/json'
        ];
        $body = '{
        "payer_id": "'.$request->PayerID.'"
        }';
        $request = new Psr7Request('POST', $this->sandbox.'payments/payment/'.$request->paymentId.'/execute', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();

    }
}
