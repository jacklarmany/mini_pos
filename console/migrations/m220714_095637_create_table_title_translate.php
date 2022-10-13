<?php

use yii\db\Migration;

class m220714_095637_create_table_title_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%title_translate}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language'),
                'title_name' => $this->string()->comment('Title name translate'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_title_translate_title1_idx', '{{%title_translate}}', ['title_id']);

        $this->addForeignKey(
            'fk_title_translate_title1',
            '{{%title_translate}}',
            ['title_id'],
            '{{%title}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%title_translate}}');
    }
}
