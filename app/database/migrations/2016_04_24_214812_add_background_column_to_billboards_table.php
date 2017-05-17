<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBackgroundColumnToBillboardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billboards', function (Blueprint $table) {
            $table->string("background_file_name")->nullable();
            $table->integer("background_file_size")->nullable();
            $table->string("background_content_type")->nullable();
            $table->timestamp("background_updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn('background_file_name');
            $table->dropColumn('background_file_size');
            $table->dropColumn('background_content_type');
            $table->dropColumn('background_updated_at');
        });
    }
}
