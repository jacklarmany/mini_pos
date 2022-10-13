<?php

use yii\db\Migration;

class m220714_095749_create_table_study_item_has_title_has_monitoring extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%study_item_has_title_has_monitoring}}',
            [
                'id' => $this->integer()->notNull(),
                'study_item_id' => $this->integer()->unsigned()->notNull(),
                'title_id' => $this->integer()->unsigned()->notNull(),
                'monitoring_id' => $this->integer()->notNull(),
                'the_date' => $this->date()->comment('Approval/Cetified Date'),
                'study_item_status_id' => $this->integer()->unsigned()->notNull(),
                'area_completed' => $this->double(),
                'area_increased' => $this->double(),
                'area_returned' => $this->double(),
                'attach_file' => $this->string(),
                'province_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%study_item_has_title_has_monitoring}}', ['id', 'title_id', 'monitoring_id']);

        $this->createIndex('fk_study_item_has_title_has_monitoring_province1_idx', '{{%study_item_has_title_has_monitoring}}', ['province_id']);
        $this->createIndex('fk_study_item_has_title_has_monitoring_study_item1_idx', '{{%study_item_has_title_has_monitoring}}', ['study_item_id']);
        $this->createIndex('fk_study_item_has_title_has_monitoring_study_item_status1_idx', '{{%study_item_has_title_has_monitoring}}', ['study_item_status_id']);
        $this->createIndex('fk_study_item_has_title_has_monitoring_title_has_monitoring_idx', '{{%study_item_has_title_has_monitoring}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_study_item_has_title_has_monitoring_province1',
            '{{%study_item_has_title_has_monitoring}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_study_item_has_title_has_monitoring_study_item1',
            '{{%study_item_has_title_has_monitoring}}',
            ['study_item_id'],
            '{{%study_item}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_study_item_has_title_has_monitoring_study_item_status1',
            '{{%study_item_has_title_has_monitoring}}',
            ['study_item_status_id'],
            '{{%study_item_status}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%study_item_has_title_has_monitoring}}');
    }
}
