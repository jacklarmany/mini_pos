<?php

use yii\db\Migration;

class m220714_095811_create_table_representative_office_data_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%representative_office_data_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'representative_office_name' => $this->string()->comment('Representative office name translate'),
                'representative_office_data_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table representative office data'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_representative_office_data_translate_representative_offi_idx', '{{%representative_office_data_translate}}', ['representative_office_data_id']);

        $this->addForeignKey(
            'fk_representative_office_data_translate_representative_office1',
            '{{%representative_office_data_translate}}',
            ['representative_office_data_id'],
            '{{%representative_office_data}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%representative_office_data_translate}}');
    }
}
