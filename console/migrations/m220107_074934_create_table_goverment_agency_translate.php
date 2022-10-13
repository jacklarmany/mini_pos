<?php

use yii\db\Migration;

class m220107_074934_create_table_goverment_agency_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%goverment_agency_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45)->notNull(),
                'name' => $this->string()->notNull(),
                'goverment_agency_id' => $this->integer()->notNull(),
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
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%goverment_agency_translate}}');
    }
}
