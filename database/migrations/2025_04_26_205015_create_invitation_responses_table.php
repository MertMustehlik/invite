<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Invitation\EventInvitationLink;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invitation_responses', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->foreignIdFor(EventInvitationLink::class)->nullable()->constrained()->nullOnDelete(); // davet linki silinebilir

            $table->enum('response', ['yes', 'no'])->nullable();
            $table->text('response_reason')->nullable();
            $table->timestampTz('responded_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_responses');
    }
};
