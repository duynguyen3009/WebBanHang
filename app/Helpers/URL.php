<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL
{
    public static function linkCategoryArticle($id, $name) 
    {
        return route('category/index', [
            'category_id'   => $id, 
            'category_name' => Str::slug($name) 
        ]);

    }

    public static function linkCategoryProduct($id, $name) 
    {
        return route('catProduct/index', [
            'cat_pro_id'   => $id, 
            'cat_pro_name' => Str::slug($name) 
        ]);

    }
    
    public static function linkArticle($id, $name) 
    {
        return route('article/index', [
            'article_id'   => $id, 
            'article_name' => Str::slug($name) 
        ]);
    }

    public static function linkProduct($id, $name) 
    {
        return route('productf', [
                'product_id'   => $id, 
                'product_name' => Str::slug($name) 
        ]);

        

    }
}