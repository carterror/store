<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\Order;
use PhpParser\Node\Stmt\If_;

class BuysController extends Controller
{
    public function index()
    {
        $buys = Order::latest('created_at')->paginate(20);

        return view('admin.buys.index', compact('buys'));
    }

    public function limpiar($id)
    {
        $buy = Order::find($id);

        $buy->status=1;

        if($buy->save()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Compra Confirmada']);
        endif;
    }

    public function delete($id)
    {
        $buy = Order::find($id);

        $buy->status=2;

        if($buy->save()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Compra Cancelada']);
        endif;
    }
}
