<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Completedquestion extends Model
{
    use SoftDeletes;

    public $table = 'completedquestions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'questions_array',
    ];

    public function question()
    {
        return $this->belongsTo(User::class, 'question_id');
    }
}
