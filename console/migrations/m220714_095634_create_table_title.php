<?php

use yii\db\Migration;

class m220714_095634_create_table_title extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%title}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'title_name' => $this->string()->notNull()->comment('Title name'),
                'section_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table sector'),
                'sort' => $this->smallInteger()->comment('Sort'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_title_section1_idx', '{{%title}}', ['section_id']);

        $this->addForeignKey(
            'fk_title_section1',
            '{{%title}}',
            ['section_id'],
            '{{%section}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%title}}');
    }
}
