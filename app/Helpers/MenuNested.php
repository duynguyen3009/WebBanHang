<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use App\Helpers\URL;

class MenuNested
{
    // RECURSIVE ARTICLE MENU 
    public static function recursiveMenuArticle($items, &$xhtmlMenu = ''){
        $xhtmlMenu .= '<ul>';
        foreach ($items as $key => $value) {
            if($value['status'] == 'active') {
                $link = URL::linkCategoryArticle($value['id'],$value['name']);   
                $xhtmlMenu .= '<li><a href="'.$link.'">'.$value['name'].'</a>';
                if($value['children']) {
                    self::recursiveMenuArticle($value['children'],$xhtmlMenu);
                }
                $xhtmlMenu .= '</li>';
            }
        }
        $xhtmlMenu .= '</ul>';
        return $xhtmlMenu;
    }

    public static function recursiveMenuProduct($items, &$xhtmlMenu = ''){
        $xhtmlMenu .= '<ul>';
        foreach ($items as $key => $value) {
            if($value['status'] == 'active') {
                $link = URL::linkCategoryProduct($value['id'],$value['name']);   
                $xhtmlMenu .= '<li><a href="'.$link.'">'.$value['name'].'</a>';
                if($value['children']) {
                    self::recursiveMenuArticle($value['children'],$xhtmlMenu);
                }
                $xhtmlMenu .= '</li>';
            }
        }
        $xhtmlMenu .= '</ul>';
        return $xhtmlMenu;
    }
}