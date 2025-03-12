<?php

use App\Models\Country;
use App\Models\Role;
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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userName')->nullable();
            $table->string("lastName");
            $table->string("firstName");
            $table->string('profile')->nullable();
            $table->string('email')->unique();
            $table->foreignIdFor(Role::class)
            ->constrained()
            ->restrictOnUpdate()
            ->restrictOnDelete();
            $table->boolean('isCompany')->default(0);
            $table->string('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('adress_id')->nullable();
            $table->foreign('adress_id')->references('id')->on('adresses')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
