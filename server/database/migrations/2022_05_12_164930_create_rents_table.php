<?php

use App\Models\Customer;
use App\Models\Rent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Rent())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained((new Customer())->getTable());
            $table->string('title');
            $table->integer('room_number');
            $table->string('lng');
            $table->string('lat');
            $table->longText('description');
            $table->integer('type');
            $table->integer('washroom');
            $table->integer('balcony')->nullable();
            $table->string('position')->nullable();
            $table->integer('bad');
            $table->boolean('is_active')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists((new Rent())->getTable());
    }
}
