<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Result extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_results';
	


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['res_referen','validations_id','res_company','res_user','res_document'];
	protected  $guarded = ['created_at','updated_at'];

	public function validation()
    {
        return $this->belongsTo('App\Validation');
    }
    public function solutions()
    {
        return $this->hasMany('App\solution');
    }
    
}

 