<?php

use App\Models\Brand;
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

// function to compute number of brands

function computeBrandsNumber(){

    return Brand::count();
}

// function save image in locale

function uploadImage($folder,$image){

    $image->store('/',$folder);
    $fileName=$image->hashName();
    return $fileName;
    
}
