<?php

use yii\db\Migration;

class m220107_074647_create_table_mineral_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mineral_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'mineral_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('minerals_id', '{{%mineral_translate}}', ['mineral_id']);

        $this->addForeignKey(
            'mineral_translate_ibfk_1',
            '{{%mineral_translate}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%mineral_translate}}');
    }
}
