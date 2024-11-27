<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOvertimeToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->string('overtime_cost')->nullable();
            $table->string('overtime_start')->nullable();
            $table->string('overtime_end')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('overtime_cost');
            $table->dropColumn('overtime_start');
            $table->dropColumn('overtime_end');
        });
    }
}
