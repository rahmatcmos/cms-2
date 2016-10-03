<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentNote extends Model
{
    protected $primaryKey='id';
    protected $table = 'student_note';

    public $fillable = [
        'note', 'student_id', 'user_id', 'type', 'created_at', 'updated_at'
    ];
}
