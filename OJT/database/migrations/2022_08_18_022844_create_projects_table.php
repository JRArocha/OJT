<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id('ctrlno');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('sname');
            $table->date('bday');
            $table->string('gender');
            $table->string('city');
            $table->string('prov');
            $table->string('contact');
            $table->string('email');
            $table->longText('education');
            $table->longText('workExp');
            $table->longText('reason');
            $table->string('field');
            $table->string('position');
            $table->date('application');
            $table->string('resume');
            $table->string('assessor');
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
        Schema::dropIfExists('applicants');
    }
};
