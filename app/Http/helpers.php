<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 4/24/16
 * Time: 14:59
 */

/*
 * Build nestable category for admin
 */
function buildMenu($menu, $parentid = 0){
    $result = null;
    foreach ($menu as $item)
        if ($item->parent_id == $parentid) {
            $result .= "<li class='dd-item dd3-item' data-id='{$item->cat_id}'>";
            $result .= "<div class='dd-handle dd3-handle'>Drag</div><div class='dd3-content'>{$item->category_name}</div>";
            $result .= "<div class='actions'><a href='/admin/videos/categories/edit/{$item->cat_id}' class='edit'>Edit</a>";
            $result .= "<a href='/admin/videos/categories/delete/{$item->cat_id}' class='delete' ";
            $result .= "style='margin-left:10px'>Delete</a></div>";
            $result .= buildMenu($menu, $item->cat_id) . "</li>";
        }
    return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
}

// Getter for the HTML menu builder
function getHTML($items){
    return buildMenu($items);
}

function buildPostMenu($menu, $parentid = 0){
    $result = null;
    foreach ($menu as $item)
        if ($item->pc_parent_id == $parentid) {
            $result .= "<li class='dd-item dd3-item' data-id='{$item->pc_id}'>";
            $result .= "<div class='dd-handle dd3-handle'>Drag</div><div class='dd3-content'>{$item->pc_category_name}</div>";
            $result .= "<div class='actions'><a href='/admin/posts/categories/edit/{$item->pc_id}' class='edit'>Edit</a>";
            $result .= "<a href='/admin/posts/categories/delete/{$item->pc_id}' class='delete' ";
            $result .= "style='margin-left:10px'>Delete</a></div>";
            $result .= buildPostMenu($menu, $item->pc_id) . "</li>";
        }
    return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
}

// Getter for the HTML menu builder
function getPostHTML($items){
    return buildPostMenu($items);
}
?>