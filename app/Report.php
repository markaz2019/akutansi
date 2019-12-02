<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "data";

    protected $primaryKey = "modul_id";

    protected $fillable = [
        'modul_id',
        'modul'
    ];


    //relasi One to many

    public function get_kategori()
    {
        return $this->belongsTo('App\\Model\\Report', 'modal_id', 'modal');
    }
}
