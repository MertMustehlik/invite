<?php

use App\Models\User;
use App\Models\Common\City;
use App\Models\Common\Country;
use App\Models\Common\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Invitation\InvitationTemplate;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestampsTz();
            $table->softDeletesTz();

            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->unsignedSmallInteger('event_type_id')->default(1);
            $table->string('title')->nullable();
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date')->nullable();

            $table->foreignIdFor(Country::class)->nullable()->constrained();
            $table->foreignIdFor(City::class)->nullable()->constrained();
            $table->foreignIdFor(District::class)->nullable()->constrained();
            $table->text('address')->nullable();
            $table->text('event_program')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();

            $table->foreignIdFor(InvitationTemplate::class)->nullable()->constrained();
            

            $table->boolean('allow_guest_tracking')->default(1);
            $table->unsignedInteger('total_yes')->default(0); //toplam davete gelen sayısı
            $table->unsignedInteger('total_no')->default(0); //davetiye ye gelmiyorum diyen sayısı

            // 1. eş bilgileri
            $table->string('first_partner_first_name')->nullable();
            $table->string('first_partner_last_name')->nullable();
            $table->string('first_family_names')->nullable();

            // 2. eş bilgileri
            $table->string('second_partner_first_name')->nullable();
            $table->string('second_partner_last_name')->nullable();
            $table->string('second_family_names')->nullable();
        });

        DB::statement('ALTER TABLE events AUTO_INCREMENT = 100;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
