<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Sanction extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_sanctions';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function infractions()
    {
        return $this->hasMany('App\Infraction');
    }

}
