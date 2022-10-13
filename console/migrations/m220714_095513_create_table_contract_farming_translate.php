<?php

use yii\db\Migration;

class m220714_095513_create_table_contract_farming_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_farming_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Contract farming name translate'),
                'contract_farming_id' => $this->integer()->notNull()->comment('Contract farming ID is foreign keys from relation table contract framing'),
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
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contract_farming_translate}}');
    }
}
