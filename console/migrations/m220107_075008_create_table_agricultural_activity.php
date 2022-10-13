<?php

use yii\db\Migration;

class m220107_075008_create_table_agricultural_activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%agricultural_activity}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'export' => $this->tinyInteger()->comment('ຂະຫຍາຍອອກ'),
                'processing' => $this->tinyInteger()->comment('ການດຳເນີນງານ'),
                'agricultural_product_id' => $this->integer()->notNull()->comment('ລະຫັດສິນຄ້າກະສິກຳ'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'contract_farming_id' => $this->integer()->notNull()->comment('ລະຫັດສັນຍາຂອງການສຳປະທານ'),
            ],
            $tableOptions
        );

        $this->createIndex('agricultural_products_id', '{{%agricultural_activity}}', ['agricultural_product_id']);
        $this->createIndex('contract_farmings_id', '{{%agricultural_activity}}', ['contract_farming_id']);
        $this->createIndex('projects_id', '{{%agricultural_activity}}', ['project_id']);

        $this->addForeignKey(
            'agricultural_activity_ibfk_1',
            '{{%agricultural_activity}}',
            ['agricultural_product_id'],
            '{{%agricultural_product}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'agricultural_activity_ibfk_2',
            '{{%agricultural_activity}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'agricultural_activity_ibfk_3',
            '{{%agricultural_activity}}',
            ['contract_farming_id'],
            '{{%contract_farming}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%agricultural_activity}}');
    }
}
