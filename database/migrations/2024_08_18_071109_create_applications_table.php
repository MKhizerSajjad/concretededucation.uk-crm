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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('university_id')->constrained('universities')->onDelete('no action')->indexed();
            $table->foreignId('course_id')->constrained('courses')->onDelete('no action')->indexed();
            $table->foreignId('university_course_id')->constrained('university_courses')->onDelete('no action')->indexed();
            $table->string('application_number')->unique();

            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('offer')->default(1);
            $table->tinyInteger('interview')->default(1);
            $table->tinyInteger('enroll_status')->default(1);
            $table->datetimes('date_time');
            $table->tinyInteger('loan')->default(2)->comment('loan from student loan company');
            $table->tinyInteger('pre_settled')->default(2);
            $table->tinyInteger('info_accrate')->default(1);
            $table->tinyInteger('accpet_terms')->default(1);
            $table->tinyInteger('criminal_record')->default(2);
            $table->text('crime_detail')->nullable();

            $table->tinyInteger('3_years_reg')->default(2)->comment('register for last 3 years');
            $table->tinyInteger('under_post_gard')->default(1)->comment('under or post gard in any country');
            $table->date('uk_first_entry_date');
            $table->string('marital_status')->unique();
            $table->string('passort');
            $table->date('passort_issue');
            $table->date('passort_expiry');
            $table->tinyInteger('uk_citizen')->default(2)->comment('been UK resident for 3 or more years');
            $table->tinyInteger('dual_nationality')->default(2);
            $table->tinyInteger('studied_gb')->default(2);
            $table->foreignId('nationality_country_id')->constrained('countries')->onDelete('no action');
            $table->longText('purpose_statement')->nullable();
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
