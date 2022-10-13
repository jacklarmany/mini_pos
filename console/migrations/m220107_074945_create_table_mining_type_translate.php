<?php

use yii\db\Migration;

class m220107_074945_create_table_mining_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mining_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'mining_type_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('mining_types_id', '{{%mining_type_translate}}', ['mining_type_id']);

        $this->addForeignKey(
            'mining_type_translate_ibfk_1',
            '{{%mining_type_translate}}',
            ['mining_type_id'],
            '{{%mining_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%mining_type_translate}}');
    }
}
