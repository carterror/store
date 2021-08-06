<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

use function PHPUnit\Framework\fileExists;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::paginate(6);

        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {

        $categorys = Category::all();

        return view('admin.cards.create', compact('categorys'));

    }
    
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:50',
            'photo' => 'required|image',
            'tipo' => 'required',
            'price' => 'required|numeric',
            'descripcion' => 'required|string|max:80',
        ]);

        $fileExt = trim($request->photo->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt,'',$request->photo->getClientOriginalName()));

        $filename= rand(1,999).'-'.$name.'.'.$fileExt;
        $final_file= $upload_path.'/'.$filename;

        $card = card::create([
            'name' => $request->nombre,
            'path' => $filename,
            'type' => $request->tipo,
            'description' => $request->descripcion,
            'description_pre' => $request->descripcion1,
            'price' => $request->price,
        ]);

        $request->photo->storeAs('/', $filename, 'uploads');

        $manager = new ImageManager(array('driver' => 'gd'));

        $image = $manager->make($final_file)->fit(500, 300);

        $image->save($upload_path.'/t_'.$filename);

        return redirect()->route('cards')->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Producto creado con éxito']);

    }

    public function edit(Card $card)
    {
        $card = Card::with(['cat'])->find($card->id);
        
        $categorys = Category::all();

        return view('admin.cards.edit', compact('categorys', 'card'));

    }

    public function update(Card $card, Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:50',
            'tipo' => 'required',
            'price' => 'required|numeric',
            'descripcion' => 'required|string|max:80',
        ]);

        $card->name = $request->nombre;
        $card->type = $request->tipo;
        $card->description = $request->descripcion;
        $card->description_pre = $request->descripcion1;
        $card->price = $request->price;

        if ($card->save()) {
            return redirect()->route('cards')->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Producto actualizado con éxito']);
        }
        
    }

    public function photo(Card $card, Request $request)
    {
        $request->validate([
            'photo' => ['required'],
        ]);

        $fileExt = trim($request->photo->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt,'',$request->photo->getClientOriginalName()));

        $filename= rand(1,999).'-'.$name.'.'.$fileExt;
        $final_file= $upload_path.'/'.$filename;

        $file_name = $card->path;

        $card->path = $filename;

        if($card->save()):

            $foto = $upload_path.'/'.$file_name;
            $thumb = $upload_path.'/t_'.$file_name;
    
            if(fileExists($foto)): File::delete($foto); endif;
            if(fileExists($thumb)): File::delete($thumb); endif;

            $request->photo->storeAs('/', $filename, 'uploads');

            $manager = new ImageManager(array('driver' => 'gd'));
    
            $image = $manager->make($final_file)->fit(500, 300);
    
            $image->save($upload_path.'/t_'.$filename);

            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Producto Actualizado']);
        
        endif;
    }

    public function delete($id)
    {
        $upload_path = Config::get('filesystems.disks.uploads.root');

        $card = Card::find($id);

        $foto = $upload_path.'/'.$card->path;
        $thumb = $upload_path.'/t_'.$card->path;

        if(fileExists($foto)): File::delete($foto); endif;
        if(fileExists($thumb)): File::delete($thumb); endif;

        if($card->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Producto eliminado con éxito']);
        endif;
    }

    public function public($public, $id)
    {
        $card = Card::find($id);

        if ($card->public == 0) {
            $card->public = 1;
            $message = 'Público';
            $color='#f2f2f2';
        }else {
            $card->public = 0;
            $message = 'Borrador';
            $color='#ffe0b2';
        }

        if ($card->save()) {

            return response()->json([
                'message' => 'Producto en estado '.$message,
                'color' => $color,
                'type' => 'green-text',
                'icon' => 'small mdi-action-done green-text'
            ]);

            //return back()->with(['icon' => 'small mdi-action-settings-ethernet blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Producto en estado '.$message]);
        }
       
    }

    public function gallery($id)
    {
        $card = Card::find($id);

        return view('admin.cards.galery', compact('card'));
    }

    public function photos(Request $request, $id)
    {

        $request->validate([
            'photo' => ['required'],
        ]);

        $fileExt = trim($request->photo->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt,'',$request->photo->getClientOriginalName()));
        $path = '/'.date('Y-m-d'); //2020-02-14
        $filename= rand(1,999).'-'.$name.'.'.$fileExt;
        $final_file= $upload_path.$path.'/'.$filename;

        $card = Gallery::create([
            'producto_id' => $id,
            'file_path' => date('Y-m-d'),
            'file_name' => $filename
        ]);

        $request->photo->storeAs($path, $filename, 'uploads');

        $manager = new ImageManager(array('driver' => 'gd'));

        $image = $manager->make($final_file)->fit(256, 256);

        $image->save($upload_path.$path.'/t_'.$filename);

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Foto agregada con éxito']);

    }

    public function delete_photos($id)
    {
        $upload_path = Config::get('filesystems.disks.uploads.root');

        $card = Gallery::find($id);

        $foto = $upload_path.'/'.$card->file_path.'/'.$card->file_name;
        $thumb = $upload_path.'/'.$card->file_path.'/t_'.$card->file_name;

        if(fileExists($foto)): File::delete($foto); endif;
        if(fileExists($thumb)): File::delete($thumb); endif;
        
        if($card->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Foto eliminada con éxito']);
        endif;
    }
    
}
