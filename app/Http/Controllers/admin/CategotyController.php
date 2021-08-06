<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategotyController extends Controller
{
    public function index()
    {
        $categorys = Category::paginate(6);

        return view('admin.categorys.index', compact('categorys'));
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Categoria creada con éxito']);

    }

    public function delete($id)
    {
        $category = Category::find($id);
        $product = Card::where('type', $id)->count();

        if ($product) {
            return back()->with(['icon' => 'small mdi-alert-error red-text'])->with(['type' => 'red-text'])->with(['message' => 'Existen productos con esa categoría']);
        }else {
            if($category->delete()):
                return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Categoria eliminada con éxito']);
            endif;
        }
    }
}
