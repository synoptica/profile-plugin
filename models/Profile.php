<?php namespace Synoptica\Profile\Models;

use Model;

/**
 * Model
 */
class Profile extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'users_profiles';

    public $belongsTo = [
        'type' => 'Synoptica\Profile\Models\Type',
        'user' => 'Synoptica\Profile\Models\User',
        'country' => 'Synoptica\Core\Models\Country'
    ];

    public $hasOne = [
        'ceo' => ['Synoptica\Profile\Models\Profile', 'key' => 'ceo_id'],
    ];

    protected $legacy = 
    [
        'customer_sid' => 'sid',
        'customer_ceo_id' => 'ceo_id',
        'customer_firstname' => 'firstname',
        'customer_lastname' => 'lastname',
        'customer_ragsoc' => 'company_name',
        'customer_address' => 'address',
        'customer_zip' => 'zip',
        'customer_prov' => 'prov',
        'customer_city' => 'city',
        'customer_country_id' => 'country_id',
        'customer_phone' => 'phone',
        'customer_fax' => 'fax',
        'customer_piva' => 'vat',
        'customer_codfis' => 'cf',
        'customer_email' => 'email',
        'customer_ip_reg' => 'ip_reg',
        'customer_created_at' => 'created_at',
        'customer_updated_at' => 'updated_at',
    ];


    public function beforeCreate()
    {
        if (!$this->sid){
            $this->sid = md5(time().'synoptica.profile');
        }
    }

    public function beforeSave()
    {
        if ($this->type->code != 'AZ'){
            $this->ceo_id = NULL;
        }
    }

    public function ingest($object){

        foreach ($this->legacy as $old => $new){
            if ($new && isset($object->$old) && ($object->$old != '0000-00-00 00:00:00')) {
                $this->$new = $object->$old;
            }
        }

        switch ($object->customer_type){
            case 'PF': 
                $this->type_id = 1;
                break;
            case 'PRO':
                $this->type_id = 2;
                break;
            default:
                $this->type_id = 3;
                break;
        }

        $this->privacy_at = $this->terms_at = $this->created_at;
    }

    public function  scopeCustomer($query) {
        //TODO
        //$query->with('groups')->whereHas('groups', function($q){
        //    $q->where('code','designer');
        //});
    }

    public function getCompleteName(){
        if ($this->company_name) return $this->company_name;
        elseif ($this->lastname) return $this->firstname. " ".$this->lastname;
    }
}
