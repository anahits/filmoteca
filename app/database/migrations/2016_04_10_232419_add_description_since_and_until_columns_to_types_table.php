<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionSinceAndUntilColumnsToTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exhibition_types', function (Blueprint $table) {
            $table->string('slug');
            $table->text('description');
            $table->timestamp('since');
            $table->index('since');
            $table->timestamp('until');
            $table->index('until');
        });

        $rows = DB::table('exhibition_types')->get(['id', 'name']);
        foreach ($rows as $row) {
            $id = $row->id;

            for ($i = 0; $i < 100; $i++) {
                $name = $i == 0 ? $row->name: $row->name . $i;
                $slug = \Illuminate\Support\Str::slug($name);
                $duplicate = DB::table('exhibition_types')->where('slug', $slug)->limit(1)->get(['id']);

                if (!$duplicate) {
                    DB::table('exhibition_types')->where('id', $id)->update(['slug' => $slug]);
                    break;
                }
            }

        }

        Schema::table('exhibition_types', function (Blueprint $table) {
            $table->unique('slug');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exhibition_types', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('description');
            $table->dropColumn('since');
            $table->dropColumn('until');
        });
    }
}
