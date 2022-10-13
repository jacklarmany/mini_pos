<?php

use yii\db\Migration;

class m220714_095823_create_table_electrical_activity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%electrical_activity}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'power_installed' => $this->string(45)->notNull()->comment('Power installed'),
                'power_produced' => $this->string(45)->notNull()->comment('Power Produced'),
                'grid_development' => $this->tinyInteger()->defaultValue('1')->comment('Developer build Transmission Line'),
                'export' => $this->tinyInteger()->defaultValue('1')->comment('Exportation'),
                'construction_time' => $this->string(45)->comment('Construction Period'),
                'sale_started_at' => $this->date()->comment('Commercial Operation Date'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is Foreign keys from relation table project'),
                'energy_type_id' => $this->integer()->notNull()->comment('Energy type ID is foreign keys from relation table energy type'),
            ],
            $tableOptions
        );

        $this->createIndex('energy_types_id', '{{%electrical_activity}}', ['energy_type_id']);
        $this->createIndex('projects_id', '{{%electrical_activity}}', ['project_id']);

        $this->addForeignKey(
            'electrical_activity_ibfk_2',
            '{{%electrical_activity}}',
            ['energy_type_id'],
            '{{%energy_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%electrical_activity}}');
    }
}
