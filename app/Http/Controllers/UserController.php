<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::orderBy('last_seen', 'DESC')->get();

        return view('users', compact('users'));
    }

    public function archive() 
    {
        $products = Products::onlyTrashed()
            ->orderBy('description')->get();

        return view('products.deleted', compact('products'));

    }
}
