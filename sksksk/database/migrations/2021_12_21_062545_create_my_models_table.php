<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // === TABEL POSTINGAN===
        Schema::create('my_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('body');
            $table->text('caption')->nullable();
            $table->integer('Like')->default(1);
            $table->boolean('bookmark')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_models');
    }
}
