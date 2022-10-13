<?php

use yii\db\Migration;

class m220714_095829_create_table_investment_policy extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_policy}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign keys from relation table project'),
                'policy_id' => $this->integer()->notNull()->comment('Policy ID is foreign keys from relation table policy'),
                'started_at' => $this->dateTime()->notNull()->comment('Date start'),
                'ended_at' => $this->dateTime()->notNull()->comment('Date end'),
                'percent' => $this->decimal(12, 2)->comment('This filed use for in project Hydro'),
            ],
            $tableOptions
        );

        $this->createIndex('policy_id', '{{%investment_policy}}', ['policy_id']);
        $this->createIndex('project_id', '{{%investment_policy}}', ['project_id']);

        $this->addForeignKey(
            'investment_policy_ibfk_2',
            '{{%investment_policy}}',
            ['policy_id'],
            '{{%policy}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%investment_policy}}');
    }
}
