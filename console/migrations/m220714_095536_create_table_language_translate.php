<?php

use yii\db\Migration;

class m220714_095536_create_table_language_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language_translate}}',
            [
                'id' => $this->integer()->notNull()->comment('Primary key of table is auto increment'),
                'language' => $this->string(5)->notNull()->comment('Language code'),
                'translation' => $this->text()->comment('Text translate from source code'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%language_translate}}', ['id', 'language']);

        $this->createIndex('language_translate_idx_language', '{{%language_translate}}', ['language']);

        $this->addForeignKey(
            'language_translate_ibfk_1',
            '{{%language_translate}}',
            ['language'],
            '{{%language}}',
            ['language_id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'language_translate_ibfk_2',
            '{{%language_translate}}',
            ['id'],
            '{{%language_source}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%language_translate}}');
    }
}
