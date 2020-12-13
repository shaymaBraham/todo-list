<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class todo extends \Jenssegers\Mongodb\Eloquent\Model
{
    //

    protected $connection = 'mongodb';
    protected $collection = 'todo';

    protected $fillable = [
        'label', 'description','state','id_user'
    ];
}
