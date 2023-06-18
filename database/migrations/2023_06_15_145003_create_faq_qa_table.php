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
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_category_id');
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable(); // Maak de kolom nullable
            $table->foreign('category_id')->references('id')->on('faq_categories')->onDelete('cascade');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();
        });
        
    }
    
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_questions');
    }
};