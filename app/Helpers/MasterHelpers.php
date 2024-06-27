<?php

use App\Models\Blog;

if (!function_exists('blogs')) {
    function blogs()
    {
        $results = Blog::where('id', 1)->first();
        return $results;
    }
}
