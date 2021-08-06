<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use App\Models\Buy;
use App\Models\Carrito;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class ConfigController extends Controller
{
    public function index()
    {
        $users = Carrito::whereDate('created_at', '=', date('Y-m-d'))->count();
        $card = Card::count();
        $counth= Order::whereDate('created_at', '=', date('Y-m-d'))->count();
        $buysh= Order::whereDate('created_at', '=', date('Y-m-d'))->where('status', 1)->count();
        $count= Order::count();
        $buys= Order::where('status', 1)->count();



        $data = ['users' => $users, 'card' => $card, 'buysh' => $buysh, 'counth' => $counth, 'count' => $count, 'buys' => $buys];

        return view('admin.index', $data);
    }

    public function config()
    {
        $config = Setting::find(1);

        $hash = File::get(public_path('hash'));

        return view('admin.config.index', compact('config', 'hash'));
        
    }

    public function store(Request $request)
    {   
        $config = Setting::find(1);

        $config->name = $request->name;
        $config->product_pag = $request->product_pag;
        $config->phone = $request->phone;
        $config->current = $request->current;
        $config->fb = $request->fb;
        $config->ig = $request->ig;
        $config->wa = $request->wa;
        $config->tg = $request->tg;
        $config->descript = $request->descript;
        $config->descript2 = $request->descript2;


        if ($config->save()):
            
            return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Configuraciones actualizadas con éxito']);

        endif;
    }

    public function fondo()
    {

        return view('admin.config.fondos');

    }

    public function fondos(Request $request)
    {

        $request->validate([
            'photo' => 'required',
            'tipo' => 'required',
        ]);

        $fileExt = trim($request->photo->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');

        $filename = $request->tipo.'.'.$fileExt;

        $foto = $upload_path.'/'.$filename;

        if(fileExists($foto)): File::delete($foto); endif;

        $request->photo->storeAs('/', $filename, 'uploads');

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Fondo actualizado con éxito']);

    }
}
