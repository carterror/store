<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $recipients = Recipient::paginate(6);

        return view('admin.recipient.index', compact('recipients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:recipients',
        ]);

        Recipient::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Destinatario agregado con éxito']);

    }

    public function delete(Recipient $recipient)
    {
        if($recipient->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Usuario eliminada con éxito']);
        endif;
    }

    // public function delete($id)
    // {
    //     $user = User::find($id);

    //     if($user->delete()):
    //         return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Usuario eliminada con éxito']);
    //     endif;
        
    // }

    public function pass()
    {
        return view('admin.config.pass');
    }

    public function pass_edit(Request $request)
    {

        $request->validate([
            'passa' => 'required|min:8',
            'pass' => 'required|min:8',
            'passc' => 'required|same:pass'
        ]);

        $user = User::find(Auth::id());

            if (Hash::check($request->passa, $user->password)):
                $user->password = Hash::make($request->pass);
            else: 
                return back()->with(['icon' => 'small mdi-alert-error red-text'])->with(['type' => 'red-text'])->with(['message' => 'Su contraseña actual es incorrecta']);
            endif;

            if($user->save()):
                return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Contraseña Actualizada']);
            endif;
        
    }

}
