<?php

use yii\db\Migration;

class m220714_095831_create_table_mining_activity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mining_activity}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'export' => $this->tinyInteger()->defaultValue('1')->comment('Has Export'),
                'processing' => $this->tinyInteger()->defaultValue('1')->comment('Has processing'),
                'mining_started_at' => $this->date()->notNull()->comment('Date start mining'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mineral'),
                'mining_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mining type'),
            ],
            $tableOptions
        );

        $this->createIndex('minerals_id', '{{%mining_activity}}', ['mineral_id']);
        $this->createIndex('mining_types_id', '{{%mining_activity}}', ['mining_type_id']);
        $this->createIndex('projects_id', '{{%mining_activity}}', ['project_id']);

        $this->addForeignKey(
            'mining_activity_ibfk_2',
            '{{%mining_activity}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'mining_activity_ibfk_3',
            '{{%mining_activity}}',
            ['mining_type_id'],
            '{{%mining_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%mining_activity}}');
    }
}
