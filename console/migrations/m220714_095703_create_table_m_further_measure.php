<?php

use yii\db\Migration;

class m220714_095703_create_table_m_further_measure extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_further_measure}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'text' => $this->text()->comment('Detail of further measure'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_further_measure_title_has_monitoring1_idx', '{{%m_further_measure}}', ['title_id', 'monitoring_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_further_measure}}');
    }
}
