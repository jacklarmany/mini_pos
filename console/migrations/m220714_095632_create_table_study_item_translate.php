<?php

use yii\db\Migration;

class m220714_095632_create_table_study_item_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item_translate}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'item_name' => $this->string(100)->comment('Item name'),
                'study_item_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table study item'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_study_item_translate_study_item1_idx', '{{%study_item_translate}}', ['study_item_id']);

        $this->addForeignKey(
            'fk_study_item_translate_study_item1',
            '{{%study_item_translate}}',
            ['study_item_id'],
            '{{%study_item}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item_translate}}');
    }
}
