<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePostsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('LASTDATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('REED');
            $table->string('TOPIC')->nullable();
            $table->string('TAG')->nullable();
            $table->longText('TITLE');
            $table->longText('DESCRIPTION')->nullable();
            $table->string('IMG')->nullable();
            $table->longText('TEXT1')->nullable();
            $table->longText('TEXT2')->nullable();
            $table->longText('TEXT3')->nullable();
            $table->tinyInteger('DRAFT')->default('0');
            $table->integer('URGENT')->default('0');
            $table->unsignedInteger('SHOW')->default(0);
            $table->unsignedInteger('Monthsofpregnancy')->default('0');
            $table->index('TOPIC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
