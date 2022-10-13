<?php

use yii\db\Migration;

class m220107_075005_create_table_project_location extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%project_location}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'phone' => $this->string(14)->notNull()->comment('ເບີໂທລະສັບ'),
                'fax' => $this->string(45)->comment('ແຟັກ'),
                'email' => $this->string(45)->comment('ອີເມວລ໌'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'province_id' => $this->integer()->notNull()->comment('ລະຫັດແຂວງ'),
                'district_id' => $this->integer()->notNull()->comment('ລະຫັດເມືອງ'),
                'village_id' => $this->integer()->comment('ລະຫັດບ້ານ'),
                'river' => $this->string()->comment('this field Use on for projecet Hydro'),
            ],
            $tableOptions
        );

        $this->createIndex('districts_id', '{{%project_location}}', ['district_id']);
        $this->createIndex('projects_id', '{{%project_location}}', ['project_id']);
        $this->createIndex('provinces_id', '{{%project_location}}', ['province_id']);
        $this->createIndex('village_id', '{{%project_location}}', ['village_id'], true);

        $this->addForeignKey(
            'project_location_ibfk_1',
            '{{%project_location}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'project_location_ibfk_2',
            '{{%project_location}}',
            ['province_id'],
            '{{%province}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'project_location_ibfk_3',
            '{{%project_location}}',
            ['district_id'],
            '{{%district}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'project_location_ibfk_4',
            '{{%project_location}}',
            ['village_id'],
            '{{%village}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%project_location}}');
    }
}
