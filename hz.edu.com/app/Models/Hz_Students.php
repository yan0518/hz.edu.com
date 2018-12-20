<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Hz_Students extends Model
{
    use Notifiable;
    protected $table = 'hz_students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'school',
        'birthday',
        'aclass',
        'courses',
        'isremedial',
        'status',
        'perplex',
        'way',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
