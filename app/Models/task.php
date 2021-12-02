<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        "title",
        "description",
        "startdate",
        "enddate",
        "image",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public $timestamps = false;
}
