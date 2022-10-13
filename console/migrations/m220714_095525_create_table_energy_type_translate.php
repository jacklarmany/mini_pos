<?php

use yii\db\Migration;

class m220714_095525_create_table_energy_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%energy_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string(45)->comment('Energy type name translate'),
                'energy_type_id' => $this->integer()->notNull()->comment('Energy type ID is foreign keys from relation table energy type'),
            ],
            $tableOptions
        );

        $this->createIndex('energy_types_id', '{{%energy_type_translate}}', ['energy_type_id']);

        $this->addForeignKey(
            'energy_type_translate_ibfk_1',
            '{{%energy_type_translate}}',
            ['energy_type_id'],
            '{{%energy_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%energy_type_translate}}');
    }
}
