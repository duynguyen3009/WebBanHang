<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use App\Models\CategoryProductModel;
use App\Models\MenuModel;
use App\Models\CategoryArticleModel;
use App\Models\CategoryQuestionModel;

class Nested
{
    public static function showIconOrderingNestedProduct($controllerName, $item, $prefix = ''){

        $arrowUp = '<a href="'.route($controllerName.'/node',['node' => 'up','id' => $item['id']]).'" class="ordering btn btn-primary"><span class="docs-tooltip"><span class="fa fa-arrow-up"></span></span></a>';
        $arrowDown = '<a href="'.route($controllerName.'/node',['node' => 'down','id' => $item['id']]).'" class="ordering btn btn-primary "><span class="docs-tooltip"><span class="fa fa-arrow-down"></span></span></i></a>';
        $node = CategoryProductModel::find($item->id);
        if(!$node->getPrevSibling()) $arrowUp = null;
        if(!$node->getNextSibling()) $arrowDown = null;
        return $ordering = $arrowUp.$arrowDown;
       
    }
    public static function showIconOrderingNestedMenu($controllerName, $item, $prefix = ''){
    
        $arrowUp = '<a href="'.route($controllerName.'/node',['node' => 'up','id' => $item['id']]).'" class="ordering btn btn-primary"><span class="docs-tooltip"><span class="fa fa-arrow-up"></span></span></a>';
        $arrowDown = '<a href="'.route($controllerName.'/node',['node' => 'down','id' => $item['id']]).'" class="ordering btn btn-primary "><span class="docs-tooltip"><span class="fa fa-arrow-down"></span></span></i></a>';
        $node =  MenuModel::find($item['id']);
       
        if(!$node->getPrevSibling()) $arrowUp = null;
        if(!$node->getNextSibling()) $arrowDown = null;
        return $ordering = $arrowUp.$arrowDown;
       
    }
    public static function showIconOrderingNestedArticle($controllerName, $item, $prefix = ''){
    
        $arrowUp = '<a href="'.route($controllerName.'/node',['node' => 'up','id' => $item['id']]).'" class="ordering btn btn-primary"><span class="docs-tooltip"><span class="fa fa-arrow-up"></span></span></a>';
        $arrowDown = '<a href="'.route($controllerName.'/node',['node' => 'down','id' => $item['id']]).'" class="ordering btn btn-primary "><span class="docs-tooltip"><span class="fa fa-arrow-down"></span></span></i></a>';
        $node =  CategoryArticleModel::find($item['id']);
        if(!$node->getPrevSibling()) $arrowUp = null;
        if(!$node->getNextSibling()) $arrowDown = null;
        return $ordering = $arrowUp.$arrowDown;
       
    }
    public static function showIconOrderingNestedQuestion($controllerName, $item, $prefix = ''){
    
        $arrowUp = '<a href="'.route($controllerName.'/node',['node' => 'up','id' => $item['id']]).'" class="ordering btn btn-primary"><span class="docs-tooltip"><span class="fa fa-arrow-up"></span></span></a>';
        $arrowDown = '<a href="'.route($controllerName.'/node',['node' => 'down','id' => $item['id']]).'" class="ordering btn btn-primary "><span class="docs-tooltip"><span class="fa fa-arrow-down"></span></span></i></a>';
        $node =  CategoryQuestionModel::find($item['id']);
        if(!$node->getPrevSibling()) $arrowUp = null;
        if(!$node->getNextSibling()) $arrowDown = null;
        return $ordering = $arrowUp.$arrowDown;
       
    }
   
}