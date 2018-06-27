<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note',
        'student_id',
        'user_id',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
