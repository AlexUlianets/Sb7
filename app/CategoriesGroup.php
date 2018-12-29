<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesGroup extends Model
{
    //
    public function Categories()
    {

        return $this->hasMany('App\Contact', 'group_id');
    }
}
