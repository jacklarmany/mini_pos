<?php

use yii\db\Migration;

class m220714_095813_create_table_time_frame extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%time_frame}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'date_start' => $this->date()->notNull()->comment('Date start'),
                'date_end' => $this->date()->notNull()->comment('Date end'),
                'representative_office_data_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table representative office data'),
                'extent_time_frame_id' => $this->integer()->comment('Is foreign keys from relation table time frame'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_time_frame_representative_office_data1_idx', '{{%time_frame}}', ['representative_office_data_id']);
        $this->createIndex('fk_time_frame_time_frame1_idx', '{{%time_frame}}', ['extent_time_frame_id']);

        $this->addForeignKey(
            'fk_time_frame_representative_office_data1',
            '{{%time_frame}}',
            ['representative_office_data_id'],
            '{{%representative_office_data}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%time_frame}}');
    }
}
