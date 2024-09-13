<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('client_category');
            $table->string('age_group');
            $table->integer('male_current_fund')->nullable();
            $table->integer('female_current_fund')->nullable();
            $table->integer('total_current_fund')->nullable();
            $table->integer('male_2023_continuing')->nullable();
            $table->integer('female_2023_continuing')->nullable();
            $table->integer('total_2023_continuing')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beneficiaries');
    }
}
