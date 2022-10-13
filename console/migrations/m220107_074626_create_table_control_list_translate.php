<?php

use yii\db\Migration;

class m220107_074626_create_table_control_list_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%control_list_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'control_list_id' => $this->integer(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%control_list_translate}}');
    }
}
