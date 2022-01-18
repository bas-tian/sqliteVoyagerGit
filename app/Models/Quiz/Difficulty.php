<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Difficulty extends Model
{
    use SoftDeletes;

    public $table = 'difficulties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
        'name',
    ];

    public function difficultyQuestions()
    {
        return $this->hasMany(Question::class, 'difficulty_id', 'id');
    }

    public function difficultyCategory()
    {
        return $this->belongsToMany(Category::class);
    }

}
