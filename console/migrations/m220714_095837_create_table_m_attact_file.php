<?php

use yii\db\Migration;

class m220714_095837_create_table_m_attact_file extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_attact_file}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'title' => $this->string()->notNull()->comment('Title document'),
                'attach_file' => $this->string()->notNull()->comment('Attach file'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_attact_file_monitoring1_idx', '{{%m_attact_file}}', ['monitoring_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_attact_file}}');
    }
}
