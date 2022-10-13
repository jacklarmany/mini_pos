<?php

use yii\db\Migration;

class m220714_095640_create_table_user_type_option extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_type_option}}',
            [
                'user_type' => $this->string()->notNull()->append('PRIMARY KEY')->comment('User type name'),
                'has_option_project' => $this->tinyInteger()->comment('Has choose project'),
                'has_option_province' => $this->tinyInteger()->comment('Has choose province'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_type_option}}');
    }
}
