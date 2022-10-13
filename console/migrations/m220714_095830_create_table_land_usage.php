<?php

use yii\db\Migration;

class m220714_095830_create_table_land_usage extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_usage}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'project_id' => $this->integer()->notNull()->comment('Project ID is foreign key from relation table Project'),
                'land_usage_type_id' => $this->integer()->notNull()->comment('Land usage type ID is foreign key from relation table land usage type'),
                'area_km2' => $this->string(10)->notNull()->comment('Area  KM2'),
                'area_ha' => $this->string(10)->notNull()->comment('Area hectar'),
                'province_id' => $this->integer()->comment('Province ID is foreign keys from relation table province'),
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
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'land_usage_ibfk_2',
            '{{%land_usage}}',
            ['land_usage_type_id'],
            '{{%land_usage_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%land_usage}}');
    }
}
