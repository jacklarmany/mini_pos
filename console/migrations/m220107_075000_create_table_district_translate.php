<?php

use yii\db\Migration;

class m220107_075000_create_table_district_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%district_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(45),
                'name' => $this->string()->notNull(),
                'district_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%district_translate}}', ['district_id']);

        $this->addForeignKey(
            'district_translate_ibfk_1',
            '{{%district_translate}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%district_translate}}');
    }
}
