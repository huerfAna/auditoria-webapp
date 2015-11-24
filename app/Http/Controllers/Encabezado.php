<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Informacion de Encabezado (optr01)
   ******************
 **/
class Encabezado extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'users';
	protected $table = 'optr01';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

}


 