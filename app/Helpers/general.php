<?php

use App\Models\Category;
define('PAGINTE_COUNT',10);
function getFolder(){

    return app()->getlocale() == 'ar' ? 'css-rtl'  :'css' ;
}

// function to compute number of parent category

function parentCategories(){

    return Category::parent()->count();
}

// function to compute number of parent category

function childCategories(){

    return Category::child()->count();
}
