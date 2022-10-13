<?php

use yii\db\Migration;

class m220714_095611_create_table_policy_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%policy_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Name translate'),
                'policy_id' => $this->integer()->comment('Is foreign keys from relation table policy'),
            ],
            $tableOptions
        );

        $this->createIndex('policy_id', '{{%policy_translate}}', ['policy_id']);

        $this->addForeignKey(
            'policy_translate_ibfk_1',
            '{{%policy_translate}}',
            ['policy_id'],
            '{{%policy}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%policy_translate}}');
    }
}
