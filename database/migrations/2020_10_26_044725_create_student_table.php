<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblStudent', function (Blueprint $table) {
            $table->id();
            $table->string('uni_id',100);
            $table->string('NameFull');
            $table->string('Identity')->unique();
            $table->string('Nationality',100)->nullable();
            $table->date('Birthday');
            $table->string('NameWithInitials',20)->nullable();
            $table->longText('Address')->nullable();
            $table->string('email',255)->unique();
            $table->string('country',50)->nullable();
            $table->string('phoneNo',20)->nullable();
            $table->enum('Active', ['yes', 'no'])->default('no');
            $table->enum('Registered', ['yes', 'no'])->default('no');
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
        Schema::table('tblStudent', function (Blueprint $table) {
            Schema::dropIfExists('tblStudent');
        });
    }
}
