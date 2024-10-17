<?php

use App\Enums\Party\PartyMediaType;
use App\Traits\CreatedUpdatedByMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use CreatedUpdatedByMigration;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('party_media', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('type')->default(PartyMediaType::IMAGE->value);
            $table->foreignId('party_id')->nullable()->constrained(table: 'parties')->onUpdate('cascade')->onDelete('cascade');
            $this->CreatedUpdatedByRelationship($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('party_media');
    }
};
