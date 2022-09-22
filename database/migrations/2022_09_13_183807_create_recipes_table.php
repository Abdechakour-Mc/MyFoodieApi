<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * user has many recipes
         * recipe belogns to user
         */
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url');
            $table->string('preparation_time');
            $table->string('cooking_time');
            $table->integer('level');
            $table->integer('serves');
            $table->json('ingredients');
            $table->json('method');
            $table->timestamps();   

            
            $table->foreignId('cook_id')->constrained('users')
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
        });

        Schema::create('recipe_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->foreignId('recipe_id')
                    ->constrained('recipes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->foreignId('recipe_id')
                    ->constrained('recipes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');   
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('category_recipe', function (Blueprint $table) {
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
            $table->foreignId('recipe_id')
                    ->constrained('recipes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
        });

        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('recipe_zone', function (Blueprint $table) {
            $table->foreignId('zone_id')
                    ->constrained('zones')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
            $table->foreignId('recipe_id')
                    ->constrained('recipes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('rate');
            $table->timestamps();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
            $table->foreignId('recipe_id')
                    ->constrained('recipes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); 
            
            $table->unique(['user_id','recipe_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('recipe_tags');

        Schema::dropIfExists('reviews');

        Schema::dropIfExists('category_recipe');
        Schema::dropIfExists('categories');

        Schema::dropIfExists('recipe_zone');
        Schema::dropIfExists('zones');

        Schema::dropIfExists('ratings');

        Schema::dropIfExists('recipes');

    }
}
