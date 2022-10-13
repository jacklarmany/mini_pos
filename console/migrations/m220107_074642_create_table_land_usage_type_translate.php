<?php

use yii\db\Migration;

class m220107_074642_create_table_land_usage_type_translate extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_usage_type_translate}}',
            [
                'id' => $this->primaryKey(),
                'language' => $this->string(),
                'name' => $this->string(),
                'land_usage_type_id' => $this->integer()->notNull(),
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

    public function down()
    {
        $this->dropTable('{{%land_usage_type_translate}}');
    }
}
