<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('from_name');
            $table->text('from_office');
            $table->string('from_email');
            $table->bigInteger('from_mobile');
            $table->string('from_gst_no');
            $table->string('from_pan_no');
            
            $table->string('to_name');
            $table->text('to_office');
            $table->string('to_email');
            $table->bigInteger('to_mobile');
            $table->string('to_gst_no');   

            $table->string('invoice_no');
            $table->date('invoice_date');
            $table->string('your_po_no');  
            $table->date('your_po_date');          
            $table->string('order_conformation_no')->nullable();   
            $table->string('delivery_challan_no')->nullable();
            $table->string('mode_transport')->nullable();
            $table->string('rr_gc_note_no')->nullable();
            $table->string('insurance')->nullable();
            $table->string('vehicle_no')->nullable(); 
            $table->string('hsn_code');
            $table->integer('rate_of_duty');    
            
            $table->string('invoice_to_name');   
            $table->text('invoice_to_address');
            $table->bigInteger('invoice_to_mobile');
            $table->string('invoice_to_email');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
