<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->constrained()->onDelete('cascade');

            $table->foreignId('post_id')
                    ->constrained()->onDelete('cascade');

            // $table->timestamps(); // create_at 그런거

            $table->timestamp('created_at'); // create_at 그런거

            // $table->timestamp('created_at')->default(new Expression('now()')); // create_at 그런거
            $table->unique('user_id','post_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user');
    }
}
