<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
protected $fillable = ['title', 'description', 'url', 'image'];

protected $hidden = ['id'];


  public function user(){
  return  $this->belongsTo(User::Class);

  }

public function followers(){
return $this->belongsToMany(User::class);
}


}
