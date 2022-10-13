<?php

use yii\db\Migration;

class m220714_095631_create_table_study_item_status_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item_status_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'status' => $this->string()->comment('Status translate'),
                'language' => $this->string(45)->comment('Language name'),
                'study_item_status_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table study item status'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_study_item_status_translate_study_item_status1_idx', '{{%study_item_status_translate}}', ['study_item_status_id']);

        $this->addForeignKey(
            'fk_study_item_status_translate_study_item_status1',
            '{{%study_item_status_translate}}',
            ['study_item_status_id'],
            '{{%study_item_status}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item_status_translate}}');
    }
}
