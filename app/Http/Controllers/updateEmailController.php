<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class updateEmailController extends Controller
{
    public function __construct() {

        $this->middleware('auth');

    }
}
