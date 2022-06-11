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
        $category_name=$request->category_name;
        $cat_info=Category::where('category_name', $category_name)->get();
        $cat_info=$cat_info[0];
        return $cat_info;
        // return response()->json([
        //     "status" => "success",
        //     "items" => $items
        // ], 200);
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

    public function notFound(){
        return response()->json([
            "status" => "Failure",
            "message" => "Unauthorized"
        ], 404);
    }
}
