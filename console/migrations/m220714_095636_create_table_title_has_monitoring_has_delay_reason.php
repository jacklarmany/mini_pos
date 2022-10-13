<?php

use yii\db\Migration;

class m220714_095636_create_table_title_has_monitoring_has_delay_reason extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%title_has_monitoring_has_delay_reason}}',
            [
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'delay_reason_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table delay reason'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%title_has_monitoring_has_delay_reason}}', ['title_id', 'monitoring_id', 'delay_reason_id']);

        $this->createIndex('fk_title_has_monitoring_has_delay_reason_delay_reason1_idx', '{{%title_has_monitoring_has_delay_reason}}', ['delay_reason_id']);
        $this->createIndex('fk_title_has_monitoring_has_delay_reason_title_has_monitori_idx', '{{%title_has_monitoring_has_delay_reason}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_title_has_monitoring_has_delay_reason_delay_reason1',
            '{{%title_has_monitoring_has_delay_reason}}',
            ['delay_reason_id'],
            '{{%delay_reason}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%title_has_monitoring_has_delay_reason}}');
    }
}
