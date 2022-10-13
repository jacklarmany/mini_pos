<?php

use yii\db\Migration;

class m220714_095819_create_table_control_list_activity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%control_list_activity}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table project'),
                'control_list_id' => $this->integer()->notNull()->comment('Control list ID is foreign keys from relation table control list '),
            ],
            $tableOptions
        );

        $this->createIndex('fk_control_list_activity_control_list1_idx', '{{%control_list_activity}}', ['control_list_id']);
        $this->createIndex('project_id', '{{%control_list_activity}}', ['project_id']);

        $this->addForeignKey(
            'fk_control_list_activity_control_list1',
            '{{%control_list_activity}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%control_list_activity}}');
    }
}
