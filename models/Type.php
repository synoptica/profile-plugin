<?php namespace Synoptica\Profile\Models;

use Model;

/**
 * Model
 */
class Type extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'users_profiles_types';
    
    protected $jsonable = ['configs'];
    
    public $hasMany = [
        'profiles' => 'Synoptica\Profile\Models\Profile',
    ];

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }
}
