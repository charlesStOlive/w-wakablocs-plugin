<?php namespace Waka\WakaBlocs\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateRuleTables extends Migration
{
    public function up()
    {
        Schema::create('waka_blocs_asks', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('askeable_id')->unsigned()->nullable();
            $table->string('askeable_type')->nullable();
            $table->string('code')->nullable();
            $table->string('class_name')->nullable();
            $table->json('config_data')->nullable();
            $table->boolean('is_share')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });

        Schema::create('waka_blocs_blocs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('bloceable_id')->unsigned()->nullable();
            $table->string('bloceable_type')->nullable();
            $table->string('code')->nullable();
            $table->string('class_name')->nullable();
            $table->json('config_data')->nullable();
            $table->boolean('is_share')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });

        Schema::create('waka_blocs_contents', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('contenteable_id')->unsigned()->nullable();
            $table->string('contenteable_type')->nullable();
            $table->string('code')->nullable();
            $table->string('class_name')->nullable();
            $table->json('config_data')->nullable();
            $table->boolean('is_share')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_blocs_asks');
        Schema::dropIfExists('waka_blocs_blocs');
        Schema::dropIfExists('waka_blocs_contents');
    }
}
