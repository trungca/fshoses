<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;

class UserController extends Controller
{
    public function dashboard()
    {

        $products = Product::all();
        return view('user.dashboard', compact('products'));



        // return response()->json([
        //     'status' => "Success",
        //     "message" => "Đây là trang người dùng",
        //     "products" => $products,
        // ], 201);
    }
}
