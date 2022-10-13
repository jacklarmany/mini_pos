<?php

use yii\db\Migration;

class m220714_095533_create_table_land_usage_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_usage_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string()->comment('Language code'),
                'name' => $this->string()->comment('land usage type name translate'),
                'land_usage_type_id' => $this->integer()->notNull()->comment('Land usage type ID is foreign key from relation table land usage type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_land_usage_type_translate_land_usage_type1_idx', '{{%land_usage_type_translate}}', ['land_usage_type_id']);

        $this->addForeignKey(
            'fk_land_usage_type_translate_land_usage_type1',
            '{{%land_usage_type_translate}}',
            ['land_usage_type_id'],
            '{{%land_usage_type}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%land_usage_type_translate}}');
    }
}
