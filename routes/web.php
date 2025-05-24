<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $api_key = env('API_KEY');

    $lockerpost = Http::withToken($api_key)->post(env('LOCKERPOST_API_URL'))->json();
    $uzpost = Http::withToken($api_key)->post(env('UZPOST_API_URL'))->json();

    $in_lockerpost = filterLockers($lockerpost['data'] ?? []);
    $in_uzpost = filterLockers($uzpost['data'] ?? []);

    return view('welcome', compact('in_lockerpost', 'in_uzpost'));
});

function filterLockers(array $data): array
{
    return collect($data)
        ->filter(fn($item) => ($item['lpsId'] ?? 0) < 500 && isset($item['last']))
        ->keyBy('lpsId')
        ->toArray();
}
