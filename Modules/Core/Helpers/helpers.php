<?php

function traverse($categories, $prefix = '-')
{
    $tree = [];
    foreach ($categories as $category) {
        $tree = PHP_EOL.$prefix.' '.$category->name;

        traverse($category->children, $prefix.'-');
    }

    return $tree;
}
