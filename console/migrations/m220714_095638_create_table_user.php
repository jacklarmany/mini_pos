<?php

use yii\db\Migration;

class m220714_095638_create_table_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of the table'),
                'username' => $this->string()->notNull()->comment('Username used to login'),
                'auth_key' => $this->string(32)->notNull(),
                'password' => $this->string()->notNull()->comment('Password encrypted'),
                'password_reset_token' => $this->string(),
                'email' => $this->string()->notNull()->comment('Email of the user'),
                'status' => $this->smallInteger()->notNull()->defaultValue('1')->comment('Status of active or inactive of the user 0 means inactive 1 means active'),
                'user_type' => $this->string()->notNull()->comment('User type of the current record'),
                'created_date' => $this->dateTime()->notNull()->comment('Created time'),
                'updated_date' => $this->dateTime()->notNull()->comment('Last updated time'),
                'verification_token' => $this->string()->comment('Encrypted string used in some checking case'),
                'project_id' => $this->integer()->comment('Project id for the current investor'),
                'sector_id' => $this->string()->comment('Sector id allowed to be seen by current user'),
            ],
            $tableOptions
        );

        $this->createIndex('email', '{{%user}}', ['email'], true);
        $this->createIndex('fk_user_project1_idx', '{{%user}}', ['project_id']);
        $this->createIndex('password_reset_token', '{{%user}}', ['password_reset_token'], true);
        $this->createIndex('username', '{{%user}}', ['username'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
