<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessmansController;

Route::resource('businessman', BusinessmansController::class)->only(['index','store','show','update','destroy']);
