<?php

namespace Modules\Test2\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Entity_test2 extends Model
{
    use Translatable;

    protected $table = 'test2__entity_test2s';
    public $translatedAttributes = [];
    protected $fillable = [];
}
