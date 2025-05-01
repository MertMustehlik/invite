<?php

use App\Models\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_invitation_links', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->string('code');
            $table->foreignIdFor(Event::class)->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('guest_count')->nullable(); // davet edilen kişi sayısı null ise sınır yok kafasına göre inputları doldurur kullanıcı
            
            $table->unsignedInteger('view_count')->default(0);

            $table->unique(['event_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_invitation_links');
    }
};
