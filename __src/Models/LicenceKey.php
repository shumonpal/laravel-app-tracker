<?php

namespace Shumonpal\LaravelAppTracker\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class LicenceKey
 * @package Shumonpal\LaravelAppTracker\Models
 * @version January 8, 2024, 3:24 am UTC
 *
 * @property string $code
 * @property integer $status
 */
class LicenceKey extends Model
{
    public $table = 'shumonpal_licence_keys';
    

    public $fillable = [
        'code',
        'domain',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'domain' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules() {
        return [
            'code' => 'required|unique:shumonpal_licence_keys,code|string|min:'.config("shumonpal.licence_key_min_length").'|max:'.config('shumonpal.licence_key_max_length'),
        ];
    } 

    
}
