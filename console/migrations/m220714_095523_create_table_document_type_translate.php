<?php

use yii\db\Migration;

class m220714_095523_create_table_document_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%document_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Document type name translate'),
                'language' => $this->string(45)->comment('Language code'),
                'document_type_id' => $this->integer()->comment('document type ID is foreign keys from  relation table document type'),
            ],
            $tableOptions
        );

        $this->createIndex('document_type_id', '{{%document_type_translate}}', ['document_type_id']);

        $this->addForeignKey(
            'document_type_translate_ibfk_1',
            '{{%document_type_translate}}',
            ['document_type_id'],
            '{{%document_type}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%document_type_translate}}');
    }
}
