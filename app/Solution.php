<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Solution extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_solutions';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function result()
    {
    	return $this->belongsTo('App\Result');
    }
    

}
