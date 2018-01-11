<?php

namespace Modules\Test2\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Entity_test1 extends Model
{
    use Translatable;

    protected $table = 'test2__entity_test1s';
    public $translatedAttributes = [];
    protected $fillable = [];
}
