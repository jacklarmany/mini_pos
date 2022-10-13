<?php

use yii\db\Migration;

class m220714_095521_create_table_delay_reason_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%delay_reason_translate}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'reason' => $this->string(200)->comment('Reason name translate'),
                'delay_reason_id' => $this->integer()->unsigned()->notNull()->comment('Delay reason ID is foreign keys from relation table delay reason'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_delay_reason_translate_delay_reason1_idx', '{{%delay_reason_translate}}', ['delay_reason_id']);

        $this->addForeignKey(
            'fk_delay_reason_translate_delay_reason1',
            '{{%delay_reason_translate}}',
            ['delay_reason_id'],
            '{{%delay_reason}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%delay_reason_translate}}');
    }
}
