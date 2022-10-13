<?php

use yii\db\Migration;

class m220107_075024_create_table_ppp_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%ppp_activity}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'control_list_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_id', '{{%ppp_activity}}', ['control_list_id']);
        $this->createIndex('project_id', '{{%ppp_activity}}', ['project_id']);

        $this->addForeignKey(
            'ppp_activity_ibfk_1',
            '{{%ppp_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'ppp_activity_ibfk_2',
            '{{%ppp_activity}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%ppp_activity}}');
    }
}
