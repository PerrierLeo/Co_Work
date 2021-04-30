<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    // on définit la table lists
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lists';
    protected $fillable = array('name');
    protected $primaryKey = 'id'; //primary key de lists

    protected $guarded = ['board_id'];


    public function tickets()
    {
        return $this->hasMany('Ticket');
    }

    public function lists()
    {
        return $this->belongsTo('App\Board');
    }
}
