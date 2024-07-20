<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::dropIfExists('picture_books'); // 既存のテーブルがあれば削除
        Schema::create('picture_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->default(1); // ここでデフォルト値を設定

            
            $table->string('baby_name');     //ここを追加
            $table->date('baby_birthday'); 
            $table->text('story_1')->nullable();  //ここを追加
            $table->text('story_2')->nullable();  //ここを追加
            $table->text('story_3')->nullable();  //ここを追加
            $table->text('story_4')->nullable();  //ここを追加
            $table->text('story_5')->nullable();  //ここを追加
            $table->text('story_6')->nullable();  //ここを追加
            $table->text('story_7')->nullable();  //ここを追加
            $table->text('story_8')->nullable();  //ここを追加
            $table->text('story_9')->nullable();  //ここを追加
            $table->text('story_10')->nullable();  //ここを追加
            $table->text('story_11')->nullable();  //ここを追加
            $table->text('story_12')->nullable();  //ここを追加
            $table->text('story_13')->nullable();  //ここを追加
            $table->text('story_14')->nullable(); //ここを追加
            $table->text('story_15')->nullable();  //ここを追加
            $table->text('story_16')->nullable();  //ここを追加
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creates'); // 修正: 'books'から'creates'へ変更
    }
};
