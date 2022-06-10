<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;

class AdminController extends Controller
{ 

    public function addItems(Request $request)
    {
        $item = new Item;
        $item->item_name = $request->item_name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->category = $request->category;
        $item->description = $request->description;
        $item->image = $request->image;
        $item->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }


    public function addCategories(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json([
            "status" => "success",
            "users" => $users
        ], 200);
    }

    public function getItems()
    {
        $items = Item::all();
        return response()->json([
            "status" => "success",
            "items" => $items
        ], 200);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            "status" => "success",
            "categories" => $categories
        ], 200);
    }
}
