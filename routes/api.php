<?php

use App\Http\Controllers\API\V1\Proxy\ProxyController;
use Illuminate\Support\Facades\Route;

Route::post('v1/proxy', [ProxyController::class, 'forward']);

