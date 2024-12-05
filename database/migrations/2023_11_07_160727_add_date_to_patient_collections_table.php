<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('patient_collections', function (Blueprint $table) {
            $table->string('date')->after('patient_full_name');
        });
    }

    public function down()
    {
        Schema::table('patient_collections', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }


};


