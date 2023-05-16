<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds')->after('id');
            $table->unsignedTinyInteger('baths')->after('beds');;
            $table->unsignedSmallInteger('area')->after('baths');;


            $table->tinyText('city')->after('area');;
            $table->tinyText('code')->after('city');;
            $table->tinyText('street')->after('code');;
            $table->tinyText('street_nr')->after('street');;

            $table->unsignedInteger('price')->after('street_nr');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            //
        });

        Schema::dropColumns('listings',[
            'beds','baths','area','city','code','street','street_nr','price'
        ]);
    }
};
