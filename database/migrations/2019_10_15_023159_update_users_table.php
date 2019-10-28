<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', array('true', 'false'))->after('password')->default('true');
            $table->longText('notes')->after('password')->nullable();
            $table->unsignedTinyInteger('is_super_admin')->after('password')->default(0);
            $table->string('phone')->after('password')->nullable();
            $table->string('username')->after('password')->unique();
            $table->string('avatar')->after('password')->nullable();
            $table->integer('group_id')->after('password')->nullable();
            $table->softDeletes();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
