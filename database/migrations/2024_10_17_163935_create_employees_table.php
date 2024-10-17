<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('user_id'); // Foreign key untuk user
            $table->unsignedBigInteger('depart_id'); // Foreign key untuk departemen
            $table->string('address');
            $table->string('place_of_birth');
            $table->date('dob'); // Date of birth
            $table->string('religion', 50);
            $table->enum('sex', ['Male', 'Female']);
            $table->string('phone', 15);
            $table->decimal('salary', 10, 2); // Format gaji dengan dua angka desimal
            $table->string('photo')->nullable(); // Path ke foto, nullable jika tidak ada
            $table->timestamps(); // Created at dan updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
