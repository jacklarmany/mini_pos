<?php

use yii\db\Migration;

class m220714_095752_create_table_land_survey extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%land_survey}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'province_id' => $this->integer()->comment('Province ID is foreign keys from relation table province'),
                'district_id' => $this->integer()->comment('District ID is foreign keys from relation table district'),
                'village_id' => $this->integer()->comment('Village ID is foreign keys from relation table village'),
                'state_land' => $this->double()->defaultValue('0')->comment('State land'),
                'private_land' => $this->double()->defaultValue('0')->comment('Private land'),
                'community_land' => $this->double()->defaultValue('0')->comment('Community land'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Title ID is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_land_survey_district1_idx', '{{%land_survey}}', ['district_id']);
        $this->createIndex('fk_land_survey_province1_idx', '{{%land_survey}}', ['province_id']);
        $this->createIndex('fk_land_survey_title_has_monitoring1_idx', '{{%land_survey}}', ['title_id', 'monitoring_id']);
        $this->createIndex('fk_land_survey_village1_idx', '{{%land_survey}}', ['village_id']);

        $this->addForeignKey(
            'fk_land_survey_district1',
            '{{%land_survey}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_land_survey_province1',
            '{{%land_survey}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_land_survey_village1',
            '{{%land_survey}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%land_survey}}');
    }
}
