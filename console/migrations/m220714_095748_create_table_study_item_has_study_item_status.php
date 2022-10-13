<?php

use yii\db\Migration;

class m220714_095748_create_table_study_item_has_study_item_status extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item_has_study_item_status}}',
            [
                'study_item_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table study item'),
                'study_item_status_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table study item status'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%study_item_has_study_item_status}}', ['study_item_id', 'study_item_status_id']);

        $this->createIndex('fk_study_item_has_study_item_status_study_item1_idx', '{{%study_item_has_study_item_status}}', ['study_item_id']);
        $this->createIndex('fk_study_item_has_study_item_status_study_item_status1_idx', '{{%study_item_has_study_item_status}}', ['study_item_status_id']);

        $this->addForeignKey(
            'fk_study_item_has_study_item_status_study_item1',
            '{{%study_item_has_study_item_status}}',
            ['study_item_id'],
            '{{%study_item}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_study_item_has_study_item_status_study_item_status1',
            '{{%study_item_has_study_item_status}}',
            ['study_item_status_id'],
            '{{%study_item_status}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item_has_study_item_status}}');
    }
}
