<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->select([
                'users.name as username',
                'orders.title',
                'orders.cost',
                'orders.updated_at'
            ])
            ->get()->toArray();

        return view('index', ['data' => $data]);
    }
}
