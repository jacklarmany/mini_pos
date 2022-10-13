<?php

use yii\db\Migration;

class m220107_074634_create_table_energy_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%energy_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string(45),
                'energy_type_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%energy_type_translate}}');
    }
}
