<?php

use yii\db\Migration;

class m220714_095626_create_table_sector_has_land_usage_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%sector_has_land_usage_type}}',
            [
                'sector_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sector'),
                'land_usage_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table land use type'),
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

    public function safeDown()
    {
        $this->dropTable('{{%sector_has_land_usage_type}}');
    }
}
