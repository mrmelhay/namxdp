<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //

  protected $table="district";

  protected $primaryKey="district_id";


  protected $fillable=['district_id','region_id','district_name'];



  public function region(){
      return $this->hasOne('App\Province','region_id','region_id');
  }
}
