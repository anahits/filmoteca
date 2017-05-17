<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnToFilmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->string('slug');
        });

        $fields = ['title', 'years', 'director'];
        $rows = DB::table('films')->get(array_merge(['id'], $fields));
        foreach ($rows as $row) {
            $id = $row->id;
            $slug = '';
            $separator = '';

            foreach ($fields as $field) {
                if ($field != 'title') {
                    $separator = '-';
                }

                $slug .= $separator . \Illuminate\Support\Str::slug($row->$field);
                $duplicate = DB::table('films')->where('slug', $slug)->limit(1)->get(['id']);

                if (!$duplicate) {
                    DB::table('films')->where('id', $id)->update(['slug' => $slug]);
                    break;
                }

                if ($field == 'director') { // It's the last
                    DB::table('films')->where('id', $id)->update(['slug' => $slug . rand(1, 1000)]);
                }
            }
        }

        DB::statement('ALTER TABLE films change COLUMN slug slug VARCHAR(255)  NOT NULL;');

        Schema::table('films', function (Blueprint $table) {
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
        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

}
