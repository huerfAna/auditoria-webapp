<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Anexo22 extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_anexo22';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function validations()
    {
        return $this->hasMany('App\Validation');
    }

    public function relationships()
    {
        return $this->hasMany('App\Relationship');
    }
 	
 	public function infractions()
    {
        return $this->belongsTo('App\Infraction');
    }

}
