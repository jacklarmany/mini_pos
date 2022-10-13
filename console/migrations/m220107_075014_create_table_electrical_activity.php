<?php

use yii\db\Migration;

class m220107_075014_create_table_electrical_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%electrical_activity}}',
            [
                'id' => $this->primaryKey(),
                'power_installed' => $this->string(45)->notNull(),
                'power_produced' => $this->string(45)->notNull(),
                'grid_development' => $this->tinyInteger()->defaultValue('1'),
                'export' => $this->tinyInteger()->defaultValue('1'),
                'construction_time' => $this->string(45),
                'sale_started_at' => $this->date(),
                'project_id' => $this->integer()->notNull(),
                'energy_type_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('energy_types_id', '{{%electrical_activity}}', ['energy_type_id']);
        $this->createIndex('projects_id', '{{%electrical_activity}}', ['project_id']);

        $this->addForeignKey(
            'electrical_activity_ibfk_1',
            '{{%electrical_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'electrical_activity_ibfk_2',
            '{{%electrical_activity}}',
            ['energy_type_id'],
            '{{%energy_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%electrical_activity}}');
    }
}
