<?php

use yii\db\Migration;

class m220107_074705_create_table_document_type_sector extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%document_type_sector}}',
            [
                'document_type_id' => $this->integer()->notNull(),
                'sector_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%document_type_sector}}', ['document_type_id', 'sector_id']);

        $this->addForeignKey(
            'document_type_sector_ibfk_1',
            '{{%document_type_sector}}',
            ['document_type_id'],
            '{{%document_type}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'document_type_sector_ibfk_2',
            '{{%document_type_sector}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%document_type_sector}}');
    }
}
