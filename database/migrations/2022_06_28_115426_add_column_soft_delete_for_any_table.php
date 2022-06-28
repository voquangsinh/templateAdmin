<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSoftDeleteForAnyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('category_post', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('category_post', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
