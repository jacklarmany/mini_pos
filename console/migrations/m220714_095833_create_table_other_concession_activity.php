<?php

use yii\db\Migration;

class m220714_095833_create_table_other_concession_activity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%other_concession_activity}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
                'control_list_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table control list'),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_id', '{{%other_concession_activity}}', ['control_list_id']);
        $this->createIndex('project_id', '{{%other_concession_activity}}', ['project_id']);

        $this->addForeignKey(
            'other_concession_activity_ibfk_2',
            '{{%other_concession_activity}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%other_concession_activity}}');
    }
}
