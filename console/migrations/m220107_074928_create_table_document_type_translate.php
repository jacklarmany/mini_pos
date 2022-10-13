<?php

use yii\db\Migration;

class m220107_074928_create_table_document_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%document_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'language' => $this->string(45),
                'document_type_id' => $this->integer(),
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

    public function down()
    {
        $this->dropTable('{{%document_type_translate}}');
    }
}
