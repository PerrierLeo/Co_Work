<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // on définit la table comments
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    protected $primaryKey = 'id'; //primary key de comments



}
