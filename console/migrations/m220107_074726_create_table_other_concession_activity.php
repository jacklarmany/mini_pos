<?php

use yii\db\Migration;

class m220107_074726_create_table_other_concession_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%other_concession_activity}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'control_list_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_id', '{{%other_concession_activity}}', ['control_list_id']);
        $this->createIndex('project_id', '{{%other_concession_activity}}', ['project_id']);

        $this->addForeignKey(
            'other_concession_activity_ibfk_1',
            '{{%other_concession_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'other_concession_activity_ibfk_2',
            '{{%other_concession_activity}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%other_concession_activity}}');
    }
}
