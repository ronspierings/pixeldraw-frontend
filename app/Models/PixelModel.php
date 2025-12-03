<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class PixelModel extends Model
{
    use HasFactory;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pixel_models';

    protected $primaryKey = ['pos_y', 'pos_x'];

    protected $keyType = 'primary';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pos_x',
        'pos_y',
        'color',
    ];

    protected $visible = [
        'pos_x',
        'pos_y',
        'color',
    ];
   

    public function __construct()
    {
        parent::__construct(); // Call the parent constructor class of Model
    }

    /*
        Below:
        Model Overwrites to fix the multiple primary key error

        As suggested in https://stackoverflow.com/questions/36332005/laravel-model-with-two-primary-keys-update
    */


    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


}
