<?php

use yii\db\Migration;

class m220714_095529_create_table_goverment_agency_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%goverment_agency_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->notNull()->comment('Language code'),
                'name' => $this->string()->notNull()->comment('government agency name translate'),
                'goverment_agency_id' => $this->integer()->notNull()->comment('Government ID is foreign key from relation table government agency '),
            ],
            $tableOptions
        );

        $this->createIndex('goverment_agencies_id', '{{%goverment_agency_translate}}', ['goverment_agency_id']);

        $this->addForeignKey(
            'goverment_ageny_translate_ibfk_1',
            '{{%goverment_agency_translate}}',
            ['goverment_agency_id'],
            '{{%goverment_agency}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%goverment_agency_translate}}');
    }
}
