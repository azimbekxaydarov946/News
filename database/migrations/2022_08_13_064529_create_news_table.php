<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_uz');

            $table->text('sub_title_en')->nullable();
            $table->text('sub_title_ru')->nullable();
            $table->text('sub_title_uz')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_uz')->nullable();

            $table->string('image')->nullable();
            $table->dateTime('date')->default(\Carbon\Carbon::now()->timezone('Asia/Ashgabat'));
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
