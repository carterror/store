<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito_Card;
use App\Models\Carrito;
use App\Models\Order;
use DateTime;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Address;
use App\Models\Card;
use App\Models\Recipient;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\File;

class CarritoController extends Controller
{

    public function index()
    {
        $config = Setting::find(1);
        $carrito_id = request()->session()->get('carrito_id');

        $carrito = Carrito::findOrCreateBySessionId($carrito_id);

        $product = $carrito->card()->get();

        $total = $carrito->total();

        $productos = Carrito_Card::where('carrito_id', $carrito->id)->get();

        $domi= Address::all();

        return view('carrito.index' , compact('product', 'total', 'productos', 'config', 'domi'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrito_id = request()->session()->get('carrito_id');

        $carrito = Carrito::findOrCreateBySessionId($carrito_id);

        $product = Carrito_Card::where('carrito_id', $carrito->id)->where('card_id', $request->product_id)->count();

        if ($product > 0) {

            $product = Carrito_Card::where('carrito_id', $carrito->id)->where('card_id', $request->product_id)->first();

            $product->inventario++;

            $product->save();

        }else{

            Carrito_Card::create([
                'card_id' => $request->product_id,
                'carrito_id' => $carrito->id
            ]);

        }

        if ($request->ajax()) {
            return response()->json([
                'products_count' => Carrito_Card::productsCount($carrito->id),
                'message' => 'Producto Agregado al Carrito',
                'type' => 'green-text',
                'icon' => 'small mdi-action-done green-text'
            ]);
        }

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Producto Agregado al Carrito']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function limpiar()
    {
        request()->session()->remove('carrito_id');

        return redirect(RouteServiceProvider::HOME)->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Carrito Limpiado']);;;
    }

    public function add($carrito_id, $product_id)
    {

            $product = Carrito_Card::where('carrito_id', $carrito_id)->where('card_id', $product_id)->first();
            $price = Card::find($product_id)->price;
            $product->inventario++;

            if($product->save()){

                $carrito = Carrito::findOrCreateBySessionId($carrito_id);
                $total = $carrito->total();

                return response()->json([
                    'products_count' => Carrito_Card::productsCount($carrito_id),
                    'id' => $product,
                    'price' => $price,
                    'total' => $total,
                    'message' => 'Producto Agregado al Carrito',
                    'type' => 'green-text',
                    'icon' => 'small mdi-action-done green-text'
                ]);

                //return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Agregado al Carrito']);;
            }
    }

    public function sub($carrito_id, $product_id)
    {
        $price = Card::find($product_id)->price;
        $product = Carrito_Card::where('carrito_id', $carrito_id)->where('card_id', $product_id)->first()->inventario;



        if ($product > 1) {

            $product = Carrito_Card::where('carrito_id', $carrito_id)->where('card_id', $product_id)->first();

            $product->inventario--;

            $product->save();

        } else {

            $product = Carrito_Card::where('carrito_id', $carrito_id)->where('card_id', $product_id)->first();

            $product->delete();

            $price=0;
        }

        $carrito = Carrito::findOrCreateBySessionId($carrito_id);
        $total = $carrito->total();

            return response()->json([
                'products_count' => Carrito_Card::productsCount($carrito_id),
                'id' => $product,
                'price' => $price,
                'total' => $total,
                'message' => 'Producto Eliminado del Carrito',
                'type' => 'green-text',
                'icon' => 'small mdi-action-done green-text'
            ]);


        //return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Eliminado del Carrito']);;

    }

    public function show($id)
    {
        $config = Setting::find(1);

        $carrito = Carrito::where('customId', $id)->first();

        $details = $carrito->order();

        $carritos = $carrito->customId;

        return view('buys.index' , compact('carritos', 'details', 'config'));
    }

    public function create(Request $request)
    {

        $config = Setting::find(1);

        $date = new DateTime();

        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $carrito_id = request()->session()->get('carrito_id');

        $carrito = Carrito::findOrCreateBySessionId($carrito_id);

        $product = $carrito->card()->select('name', 'price')->get();

        $carrito->checka();

        $details = Order::createOrden($request, $carrito);

        request()->session()->remove('carrito_id');

        $productos="";
        foreach ($product as $p) {
            $i = Carrito_Card::where('carrito_id', $p->pivot->carrito_id)->where('card_id', $p->pivot->card_id)->first();
            $productos .= "∙ ".$i->inventario."x ".$p->name .": $".$p->price."\n";
        }

        $array = [
                    "name" =>  $config->name.' - '.$details->name,
                    "tel" => $details->phone,
                    "addr" => $details->address,
                    "msg" => $productos.'Total: '.$details->total,
                    "date" => $details->created_at->format('Y-m-d H:i:s').'.'.$date->format('u'),
                ];

        $json = json_encode($array);

        // $hs = File::get(public_path('hash'));
        // $hs = str_replace("\n", "", $hs);
        // $fspath = getcwd()."/../../messages/".$hs.'/'.$details->name.'_'.$details->created_at->format('U').'.'.$date->format('u').'.json';
        // $fs = fopen($fspath, "w");
        // fwrite($fs, $json);
        // fclose($fs);

        $productos="";
        foreach ($product as $p) {
            $i = Carrito_Card::where('carrito_id', $p->pivot->carrito_id)->where('card_id', $p->pivot->card_id)->first();
            $productos .= "∙ ".$i->inventario."x ".$p->name .": $".$p->price."<br>";
        }

        $array = [
            "name" => $config->name.' - '.$details->name,
            "tel" => $details->phone,
            "addr" => $details->address,
            "msg" => $productos.'Total: '.$details->total,
            "date" => $details->created_at->format('Y-m-d H:i:s').'.'.$date->format('u'),
        ];

        $recipient = Recipient::select(['email'])->get();

        Mail::to($recipient)->send(new TestMail($array));

        $carritos = $carrito->customId;

        return view('buys.index' , compact('carritos', 'details', 'config'));
    }
}
