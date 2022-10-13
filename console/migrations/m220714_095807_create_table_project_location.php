<?php

use yii\db\Migration;

class m220714_095807_create_table_project_location extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_location}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'phone' => $this->string(14)->comment('Phone number'),
                'fax' => $this->string(45)->comment('Fax number'),
                'email' => $this->string(45)->comment('Email'),
                'project_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table project'),
                'province_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table province'),
                'district_id' => $this->integer()->comment('Is foreign keys from relation table district'),
                'village_id' => $this->integer()->comment('Is foreign keys from relation table villages'),
                'river_id' => $this->integer()->comment('Is foreign keys from relation table river'),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%project_location}}', ['district_id']);
        $this->createIndex('fk_project_location_river1_idx', '{{%project_location}}', ['river_id']);
        $this->createIndex('fk_project_location_village1_idx', '{{%project_location}}', ['village_id']);
        $this->createIndex('projects_id', '{{%project_location}}', ['project_id']);
        $this->createIndex('provinces_id', '{{%project_location}}', ['province_id']);

        $this->addForeignKey(
            'fk_project_location_river1',
            '{{%project_location}}',
            ['river_id'],
            '{{%river}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_project_location_village1',
            '{{%project_location}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'project_location_ibfk_2',
            '{{%project_location}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'project_location_ibfk_3',
            '{{%project_location}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%project_location}}');
    }
}
