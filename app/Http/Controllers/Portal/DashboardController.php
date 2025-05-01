<?php

namespace App\Http\Controllers\Portal;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('portal.pages.dashboard.index');
    }
}
