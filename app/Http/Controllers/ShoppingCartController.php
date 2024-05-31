<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ShoppingCartController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isset($_SESSION)){
            return;
        }

        $tickets = $_SESSION['tickets'];
    }
}
