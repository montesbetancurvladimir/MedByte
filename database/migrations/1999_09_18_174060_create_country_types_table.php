<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CountryType;

return new class extends Migration
{
    public function up()
    {
        Schema::create('country_types', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',25);
            $table->timestamps();
        });
        CountryType::create(['id'=>'1','descripcion' => 'Colombia']);
        CountryType::create(['id'=>'2','descripcion' => 'Argentina']);
        CountryType::create(['id'=>'3','descripcion' => 'Peru']);
        CountryType::create(['id'=>'4','descripcion' => 'EEUU']);
    }

    public function down()
    {
        Schema::dropIfExists('country_types');
    }
};
