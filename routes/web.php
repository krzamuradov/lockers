<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $lockerpost = Http::withToken(env('API_KEY'))->post(env('LOCKERPOST_API_URL'))->json();
    $uzpost = Http::withToken(env('API_KEY'))->post(env('UZPOST_API_URL'))->json();

    $lockers = [];
    $in_lockerpost = [];
    $in_uzpost = [];

    foreach ($lockerpost["data"] as $locker) {
        if ($locker['lpsId'] < 500) {
            if (isset($locker['last'])) {
                $in_lockerpost[$locker['lpsId']] = $locker;
            }
        }
    }

    foreach ($uzpost["data"] as $locker) {
        if ($locker['lpsId'] < 500) {
            if (isset($locker['last'])) {
                $in_uzpost[$locker['lpsId']] = $locker;
            }
        }
    }

    return view('welcome', compact('in_lockerpost', "in_uzpost"));
});
