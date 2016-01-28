<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class ResultF extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_resulfac';
	

	protected  $guarded = ['id','created_at','updated_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    
}
