<?php

use yii\db\Migration;

class m220107_074918_create_table_contract_farming_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_farming_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'contract_farming_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('contract_farmings_id', '{{%contract_farming_translate}}', ['contract_farming_id']);

        $this->addForeignKey(
            'contract_farming_translate_ibfk_1',
            '{{%contract_farming_translate}}',
            ['contract_farming_id'],
            '{{%contract_farming}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%contract_farming_translate}}');
    }
}
