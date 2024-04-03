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
		Schema::create('tickets', function (Blueprint $table) {
			$table->uuid('id')->primary();
			//user_id should be nullable
			$table->foreignUuid('agent')->nullable()->constrained('users')->onDelete('cascade');
			$table->string('title');
			$table->text('description');
			$table->foreignUuid('category')->constrained('categories')->onDelete('cascade');
			$table->foreignUuid('label')->constrained('labels')->onDelete('cascade');
			$table->string('priority');
			$table->string('status')->default('Open');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('tickets');
	}
};
