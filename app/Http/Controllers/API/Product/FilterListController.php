<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class FilterListController extends Controller
{

    public function __invoke()
    {
       

        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price ?? 0;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price ?? 0;

        $result = [
            'categories' => $categories,
            'tags' => $tags,
            'colors' => $colors,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ],
        ];

       

        return response()->json($result);
    }
}
