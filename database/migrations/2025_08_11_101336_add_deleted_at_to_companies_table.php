<?php
// database/migrations/xxxx_xx_xx_add_deleted_at_to_companies_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('companies', function (Blueprint $table) {
            $table->softDeletes(); // adds deleted_at column
        });
    }

    public function down() {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
