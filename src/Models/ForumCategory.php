<?php

namespace Codiiv\Chatter\Models;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'chatter_categories';

    public function parent(){
      return $this->belongsTo('Codiiv\Chatter\Models\ForumCategory', 'parent_id');
    }
    public function children(){
      return $this->hasMany('Codiiv\Chatter\Models\ForumCategory', 'parent_id');
    }

}
