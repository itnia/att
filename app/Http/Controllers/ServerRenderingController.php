<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ServerRenderingController extends Controller
{

    public function index(Request $request)
    {
        $data = Order::leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->when(!empty($request->get('query', '')), function ($query) use ($request) {
                $query->where('users.name', 'like', "%{$request->get('query')}%");
            })
            ->select([
                'users.name as username',
                'orders.title',
                'orders.cost',
                'orders.updated_at'
            ])
            ->paginate(10);

        return view('index-second', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $data = Order::leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->when(!empty($request->get('query', '')), function ($query) use ($request) {
                $query->where('users.name', 'like', "%{$request->get('query')}%");
            })
            ->select([
                'users.name as username',
                'orders.title',
                'orders.cost',
                'orders.updated_at'
            ])
            ->paginate(10);

        $tableContent = view('partials.table-content', ['data' => $data])->render();
        $pagination = $data->withPath(route('server-rendering'))->appends(request()->input())->links(
            'pagination::bootstrap-5'
        )->render();

        return response()->json([
            'tableContent' => $tableContent,
            'pagination' => $pagination
        ]);
    }
}
