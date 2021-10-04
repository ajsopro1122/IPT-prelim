<?php

namespace App\Http\Controllers;
use App\Models\Logs;
use App\Models\User;

use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index() {
        return view('logs.index');
    }

    public function logs() {
        $logs = Logs::all();
        return view('logs.logs', compact('logs'));
    }
}
