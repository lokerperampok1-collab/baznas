<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PakasirService
{
    protected $baseUrl;
    protected $apiKey;
    protected $project;

    public function __construct()
    {
        $this->baseUrl = 'https://app.pakasir.com/api';
        $this->apiKey = env('PAKASIR_API_KEY');
        $this->project = env('PAKASIR_PROJECT');
    }

    public function createPayment($method, $orderId, $amount)
    {
        $response = Http::withOptions(['verify' => false])->timeout(30)->post("{$this->baseUrl}/transactioncreate/{$method}", [
            'project' => $this->project,
            'api_key' => $this->apiKey,
            'order_id' => $orderId,
            'amount' => $amount,
            'redirect_url' => route('campaign.invoice', ['token' => $orderId]), // Using token as order_id for Pakasir
        ]);

        return $response->json();
    }

    public function getDetail($orderId, $amount)
    {
        $response = Http::withOptions(['verify' => false])->timeout(30)->get("{$this->baseUrl}/transactiondetail", [
            'project' => $this->project,
            'api_key' => $this->apiKey,
            'order_id' => $orderId,
            'amount' => $amount,
        ]);

        return $response->json();
    }
}
