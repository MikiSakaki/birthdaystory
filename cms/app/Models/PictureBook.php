<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PictureBook extends Model
{
    protected $table = 'picture_books'; // テーブル名を明示的に指定

    protected $fillable = [
        'user_id',
        'baby_name',
        'baby_birthday',
        'story_1',
        'story_2',
        'story_3',
        'story_4',
        'story_5',
        'story_6',
        'story_7',
        'story_8',
        'story_9',
        'story_10',
        'story_11',
        'story_12',
        'story_13',
        'story_14'
    ]; // 入力可能なカラムを指定
}