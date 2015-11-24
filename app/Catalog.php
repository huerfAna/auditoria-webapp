<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

/** 
   ******************
   * Informacion de Encabezado (optr01)
   ******************
 **/
class Catalog extends Model  {
	protected $connection;
	protected $table;

	public function __construct()  {
        $this->connection = 'master';
       	$this->table = Session::get('tablacat');
        // Your construct code.
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

}


 