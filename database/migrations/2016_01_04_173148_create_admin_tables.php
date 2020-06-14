<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function getConnection()
    {
        return config('admin.database.connection') ?: config('database.default');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('admin.database.users_table'), function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('username', 190)->unique()->comment('用户名');
            $table->string('password', 60)->comment('密码');
            $table->string('name')->comment('姓名');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('remember_token', 100)->nullable()->comment('记住令牌');
            $table->timestamps();
        });

        Schema::create(config('admin.database.roles_table'), function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 50)->unique()->comment('名称');
            $table->string('slug', 50)->unique()->comment('标识');
            $table->timestamps();
        });

        Schema::create(config('admin.database.permissions_table'), function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name', 50)->unique()->comment('名称');
            $table->string('slug', 50)->unique()->comment('标识');
            $table->string('http_method')->nullable()->comment('HTTP方法');
            $table->text('http_path')->nullable()->comment('HTTP路径');
            $table->timestamps();
        });

        Schema::create(config('admin.database.menu_table'), function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->bigInteger('parent_id')->default(0)->comment('父级ID');
            $table->integer('order')->default(0)->comment('排序');
            $table->string('title', 50)->comment('名称');
            $table->string('icon', 50)->comment('ICON');
            $table->string('uri')->nullable()->comment('URI');
            $table->string('permission')->nullable()->comment('权限');
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_users_table'), function (Blueprint $table) {
            $table->bigInteger('role_id')->comment('角色ID');
            $table->bigInteger('user_id')->comment('用户ID');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_permissions_table'), function (Blueprint $table) {
            $table->bigInteger('role_id')->comment('角色ID');
            $table->bigInteger('permission_id')->comment('权限ID');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.user_permissions_table'), function (Blueprint $table) {
            $table->bigInteger('user_id')->comment('用户ID');
            $table->bigInteger('permission_id')->comment('权限ID');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.role_menu_table'), function (Blueprint $table) {
            $table->bigInteger('role_id')->comment('角色ID');
            $table->bigInteger('menu_id')->comment('菜单ID');
            $table->index(['role_id', 'menu_id']);
            $table->timestamps();
        });

        Schema::create(config('admin.database.operation_log_table'), function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->bigInteger('user_id')->comment('用户ID');
            $table->string('path')->comment('路径');
            $table->string('method', 10)->comment('方法');
            $table->string('ip')->comment('IP');
            $table->text('input')->comment('输入');
            $table->index('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('admin.database.users_table'));
        Schema::dropIfExists(config('admin.database.roles_table'));
        Schema::dropIfExists(config('admin.database.permissions_table'));
        Schema::dropIfExists(config('admin.database.menu_table'));
        Schema::dropIfExists(config('admin.database.user_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_users_table'));
        Schema::dropIfExists(config('admin.database.role_permissions_table'));
        Schema::dropIfExists(config('admin.database.role_menu_table'));
        Schema::dropIfExists(config('admin.database.operation_log_table'));
    }
}
