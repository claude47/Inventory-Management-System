<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::orderBy('last_seen', 'DESC', 'status')->get();
        return view('users', compact('users'));
    }

    public function archive() 
    {
        $products = Products::onlyTrashed()
            ->orderBy('description')->get();

        return view('products.deleted', compact('products'));

    }

    public function updateStatus($user_id, $status_code) 
    {       
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            if ($update_user) {
                return back()->with('success', 'User status updated successfully');
            }
            return back()->with('error', 'Failed to update user status');

        } catch (\Throwable $th) {
            //throw $th;
        }

    }



}
