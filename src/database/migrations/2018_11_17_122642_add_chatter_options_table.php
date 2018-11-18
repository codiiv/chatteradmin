<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChatterOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('chatter_options', function(Blueprint $table)
  		{
  			$table->increments('id');
  			$table->string('option_name');
  			$table->text('option_value');
  			$table->string('autoload')->default('yes'); 
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
      Schema::drop('chatter_options');
    }
}
