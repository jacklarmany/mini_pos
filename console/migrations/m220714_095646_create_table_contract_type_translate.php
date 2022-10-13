<?php

use yii\db\Migration;

class m220714_095646_create_table_contract_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Contract type name'),
                'language' => $this->string(45)->comment('Language code'),
                'contract_type_id' => $this->integer()->notNull()->comment('Contract type id is foreign keys from relation table contract type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_contract_type_translate_contract_type1_idx', '{{%contract_type_translate}}', ['contract_type_id']);

        $this->addForeignKey(
            'fk_contract_type_translate_contract_type1',
            '{{%contract_type_translate}}',
            ['contract_type_id'],
            '{{%contract_type}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%contract_type_translate}}');
    }
}
