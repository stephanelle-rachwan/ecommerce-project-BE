<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;

class UserController extends Controller
{
    // GET
    public function getItems(Request $request)
    {
        $category_name=$request->id;
        $items = Category::where('id', '=', $category_name)
        ->get();
        return response()->json([
            "status" => "success",
            "items" => $items
        ], 200);
    }

    // POST 
    public function likeItems(Request $request)
    {
        $like = new Like;
        $like->users_id = $request->users_id;
        $like->items_id = $request->items_id;
        $like->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

}
