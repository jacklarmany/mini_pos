<?php

use yii\db\Migration;

class m220714_095648_create_table_control_list_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%control_list_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('Control list name translate'),
                'control_list_id' => $this->integer()->comment('Control list ID is foreign keys from table control list'),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_id', '{{%control_list_translate}}', ['control_list_id']);

        $this->addForeignKey(
            'control_list_translate_ibfk_1',
            '{{%control_list_translate}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%control_list_translate}}');
    }
}
