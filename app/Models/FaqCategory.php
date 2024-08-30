<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FaqQuestion;

class FaqCategory extends Model
{
    use SoftDeletes;

    public $table = 'faq_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function faqQuestions()
    {
        return $this->hasMany(FaqQuestion::class, 'category_id', 'id');
    }
}
