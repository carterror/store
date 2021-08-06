<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Card;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::paginate(6);

        return view('admin.address.index', compact('addresses'));
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);

        $address = Address::create([
            'address' => $request->name,
        ]);

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Domicilio creado con éxito']);

    }

    public function delete($id)
    {
        $address = Address::find($id);

        if($address->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Domicilio eliminado con éxito']);
        endif;

    }
}
