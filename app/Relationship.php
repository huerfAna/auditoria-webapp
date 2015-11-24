<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Relationship extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_relationship';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function anexo22()
    {
        return $this->belongsTo('App\Anexo22');
    }

}
