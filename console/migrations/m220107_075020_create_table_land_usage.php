<?php

use yii\db\Migration;

class m220107_075020_create_table_land_usage extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_usage}}',
            [
                'id' => $this->primaryKey(),
                'project_id' => $this->integer()->notNull(),
                'land_usage_type_id' => $this->integer()->notNull(),
                'area_km2' => $this->string(10)->notNull(),
                'area_ha' => $this->string(10)->notNull(),
                'province_id' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_land_usage_province1_idx', '{{%land_usage}}', ['province_id']);
        $this->createIndex('land_usage_type_id', '{{%land_usage}}', ['land_usage_type_id']);
        $this->createIndex('project_id', '{{%land_usage}}', ['project_id']);

        $this->addForeignKey(
            'fk_land_usage_province1',
            '{{%land_usage}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'land_usage_ibfk_1',
            '{{%land_usage}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'land_usage_ibfk_2',
            '{{%land_usage}}',
            ['land_usage_type_id'],
            '{{%land_usage_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%land_usage}}');
    }
}
