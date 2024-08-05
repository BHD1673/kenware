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
        Schema::create('tb_hinh_anh_sp', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('san_pham_id')->nullable()->index('san_pham_id');
            $table->string('link_anh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hinh_anh_sp');
    }
};
