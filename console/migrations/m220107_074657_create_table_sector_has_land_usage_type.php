<?php

use yii\db\Migration;

class m220107_074657_create_table_sector_has_land_usage_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sector_has_land_usage_type}}',
            [
                'sector_id' => $this->integer()->notNull(),
                'land_usage_type_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%sector_has_land_usage_type}}', ['sector_id', 'land_usage_type_id']);

        $this->createIndex('fk_sector_has_land_usage_type_land_usage_type1_idx', '{{%sector_has_land_usage_type}}', ['land_usage_type_id']);
        $this->createIndex('fk_sector_has_land_usage_type_sector1_idx', '{{%sector_has_land_usage_type}}', ['sector_id']);

        $this->addForeignKey(
            'fk_sector_has_land_usage_type_land_usage_type1',
            '{{%sector_has_land_usage_type}}',
            ['land_usage_type_id'],
            '{{%land_usage_type}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_sector_has_land_usage_type_sector1',
            '{{%sector_has_land_usage_type}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%sector_has_land_usage_type}}');
    }
}
