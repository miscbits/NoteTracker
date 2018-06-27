<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
		'name',
		'sid',
	];

	public function notes() {
		return $this->hasMany(Note::class);
	}
}
