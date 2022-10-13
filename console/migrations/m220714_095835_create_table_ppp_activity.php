<?php

use yii\db\Migration;

class m220714_095835_create_table_ppp_activity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%ppp_activity}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
                'control_list_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table controlist'),
            ],
            $tableOptions
        );

        $this->createIndex('control_list_id', '{{%ppp_activity}}', ['control_list_id']);
        $this->createIndex('project_id', '{{%ppp_activity}}', ['project_id']);

        $this->addForeignKey(
            'ppp_activity_ibfk_2',
            '{{%ppp_activity}}',
            ['control_list_id'],
            '{{%control_list}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%ppp_activity}}');
    }
}
