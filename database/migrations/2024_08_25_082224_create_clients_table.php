<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('field_office');
            $table->string('entered_by');
            $table->string('client_no')->unique();
            $table->date('date_accomplished');
            $table->string('region');
            $table->string('province');
            $table->string('city_municipality');
            $table->string('barangay');
            $table->string('district')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('extra_name')->nullable();
            $table->string('sex');
            $table->string('civil_status');
            $table->string('dob');
            $table->integer('age');
            $table->string('mode_of_admission');
            $table->string('type_of_assistance1');
            $table->decimal('amount1', 15, 2);
            $table->string('source_of_fund1');
            $table->string('type_of_assistance2');
            $table->decimal('amount2', 15, 2);
            $table->string('source_of_fund2');
            $table->string('type_of_assistance3');
            $table->decimal('amount3', 15, 2);
            $table->string('source_of_fund3');
            $table->string('type_of_assistance4');
            $table->decimal('amount4', 15, 2);
            $table->string('source_of_fund4');
            $table->string('client_category');
            $table->string('subcategory');
            $table->string('through');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
