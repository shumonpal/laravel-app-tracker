<?php

namespace Shumonpal\LaravelAppTracker\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class LicenceUser
 * @package Shumonpal\LaravelAppTracker\Models
 * @version January 8, 2024, 5:29 am UTC
 *
 * @property foreignId $licence_key_id
 * @property json $user
 * @property string $domain
 * @property string $ip
 * @property string $location
 * @property string $device
 * @property integer $status
 */
class LicenceUser extends Model
{

    public $table = 'shumonpal_licence_users';
    

    public $fillable = [
        'licence_key_id',
        'hash_password',
        'password',
        'email',
        'domain',
        'ip',
        'location',
        'device',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user' => 'array',
        'domain' => 'string',
        'ip' => 'string',
        'location' => 'string',
        'device' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'licence_key_id' => 'nullable|integer',
        'hash_password' => 'required|string',
        'password' => 'required|string',
        'email' => 'required|string',
        'domain' => 'nullable|string',
        'ip' => 'nullable|string',
        'location' => 'nullable|string',
        'device' => 'nullable|string',
        'status' => 'integer'
    ];

    
}
