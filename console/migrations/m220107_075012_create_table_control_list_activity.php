<?php

use yii\db\Migration;

class m220107_075012_create_table_control_list_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%control_list_activity}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'control_list_Id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_Id', '{{%control_list_activity}}', ['control_list_Id']);
        $this->createIndex('project_id', '{{%control_list_activity}}', ['project_id']);

        $this->addForeignKey(
            'control_list_activity_ibfk_1',
            '{{%control_list_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'control_list_activity_ibfk_2',
            '{{%control_list_activity}}',
            ['control_list_Id'],
            '{{%control_list}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%control_list_activity}}');
    }
}
