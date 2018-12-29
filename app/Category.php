<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function CategoriesGroup()
    {

        return $this->belongsTo('App\CategoriesGroup', 'group_id');
    }
}
