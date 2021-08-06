<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Buy;
use App\Models\Carrito;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index($id, $search=null)
    {
        $config = Setting::find(1);

        switch ($id) {
            case 'all':
                $cards = Card::where('public', true)->paginate($config->product_pag);
                break;
            case 'searchs':
                $cards = Card::where('public', true)->where('name', 'LIKE', '%'.$search.'%')->paginate($config->product_pag);
                $id=$search;
                break;
            default:
                $cards = Card::where('public', true)->where('type', $id)->paginate($config->product_pag);
                $categories = Category::find($id);
                $id=$categories->name;
                break;
        }

        $conteo=$cards->count();

        $categories = Category::all();

        return view('index', compact('cards', 'conteo', 'id', 'categories', 'config'));
    }

    public function search(Request $request)
    {
        return redirect()->route('dashboard', ['searchs', $request->buscar]);
    }

    public function card($id)
    {
        $config = Setting::find(1);
        $card = Card::find($id);

        return view('card.index', compact('card', 'config'));
    }


    public function buyCard($id)
    {
        $card = Card::find($id);

        $card = Buy::create([
            'user_id' => request()->ip(),
            'tarjeta_id' => $card->id,
            'estado' => 1,
            'price' => $card->price,
        ]);

        return redirect()->route('dashboard', 'all')->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Compra exitosa, Estado: en Espera. Asegurese de haber completado su información...'])->with(['message' => 'Compra exitosa, Estado: en Espera. Asegurese de haber completado su información...']);
    }

    public function info()
    {
        return view('users.index');
    }

    public function edit_info(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'lastname' => 'required',
            'phone' => 'required'
        ]);

        $user = User::find(Auth::id());

        $user->name=$request->nombre;
        $user->last_name=$request->lastname;
        $user->phone=$request->phone;

        if($user->save()):
            return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Información actualizadas']);
        endif;
        
    }
    
}
