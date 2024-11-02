<?php

use App\Models\Structure;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        Schema::create('quotes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('quote_title');
            $table->foreignIdFor(Template::class)
            ->constrained()
            ->restrictOnDelete()
            ->restrictOnUpdate();
            $table->foreignIdFor(User::class)
            ->constrained()
            ->restrictOnDelete()
            ->restrictOnUpdate();
            $table->string('quote_identified')->unique();
            $table->string('client_name');
            $table->string('client_logo');
            $table->boolean('isTax')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
