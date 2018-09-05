<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Remark
 *
 * @package App
 */
class Partner extends Model
{

    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'partner';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = ['image', 'description'];
}
