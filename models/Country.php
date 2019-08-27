<?php namespace Synoptica\Profile\Models;

use Model;

/**
 * Model
 */
class Country extends Model
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
    public $table = 'synoptica_profile_countries';

    public $hasMany = [
        'profiles' => 'Synoptica\Profile\Models\Profile',
    ];

    protected $legacy = 
    [
        'country_aruba_id' => 'aruba_id',
        'country_name' => 'name',
        'country_name_i18n' => 'name_it',
        'country_enabled' => 'is_enabled',
        'country_code' => 'code',
    ];

    public function ingest($object){

        foreach ($this->legacy as $old => $new){
            if ($new && isset($object->$old) && $object->$old != '0000-00-00 00:00:00') {
                $this->$new = $object->$old;
            }
        }
    }
}
