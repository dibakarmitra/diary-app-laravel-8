<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceLineitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_lineitems', function (Blueprint $table) {
            $table->id();
            $table->string('desc_spec_goods');
            $table->string('number_desc_packages')->nullable();
            $table->bigInteger('total_qnty_goods');  
            $table->bigInteger('unit_qnty')->nullable();
            $table->bigInteger('rate_per_unit');   
            $table->integer('add_pf')->nullable();
            $table->bigInteger('total_amount_claimed')->nullable();
            $table->integer('add_cgst')->nullable();
            $table->integer('add_sgst')->nullable();
            $table->integer('add_igst')->nullable();
            $table->bigInteger('advance_rs')->nullable();

            $table->unsignedBigInteger('invoice_id');
            $table->dateTime('date_issue');
            $table->dateTime('date_removal');
            $table->foreign('invoice_id')->references('id')->on('invoices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_lineitems');
    }
}
