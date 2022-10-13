<?php

use yii\db\Migration;

class m220714_095624_create_table_section_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%section_translate}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'section_name' => $this->string()->comment('Section name translate'),
                'section_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table section'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_section_translate_section1_idx', '{{%section_translate}}', ['section_id']);

        $this->addForeignKey(
            'fk_section_translate_section1',
            '{{%section_translate}}',
            ['section_id'],
            '{{%section}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%section_translate}}');
    }
}
