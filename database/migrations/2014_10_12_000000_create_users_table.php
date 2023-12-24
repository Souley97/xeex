<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->unique();


            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('points')->default(0);
            $table->string('referral_code')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('is_admin')->default(0); //if 0: not admin , 1 : admin
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->string('payment', 20); 
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();

            $table->foreign('referrer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');
        });
    }
};
