<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // on définit la table boards
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $guarded = ['user_id'];

    protected $table = 'boards';
    protected $fillable = array('name', 'url_picture');


    protected $primaryKey = 'id'; //primary key de boards



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lists()
    {
        return $this->hasMany('App\List')->orderBy('update_at', 'DESC');
    }
}
