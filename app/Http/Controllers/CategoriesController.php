<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $requset, Topic $topic)
    {
        $topics = $topic->withOrder($requset->order)
                        ->where('category_id', $category->id)
                        ->with('user', 'category')
                        ->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}
