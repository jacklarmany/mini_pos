<?php

use yii\db\Migration;

class m220107_075010_create_table_contract extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'number_code' => $this->string()->comment('number code use input when Investment code'),
                'project_id' => $this->integer()->notNull()->comment('ລະຫັດໂຄງການ'),
                'extended_contract_id' => $this->integer()->comment('ຕໍ່ສັນຍາ'),
                'contract_type_id' => $this->integer()->notNull()->comment('ລະຫັດປະເພດສັນຍາ'),
                'start_at' => $this->date()->notNull()->comment('ວັນທີ່ເລີ່ມຕໍ່ສັນຍາ'),
                'end_at' => $this->date()->notNull()->comment('ວັນເວລາ ສິ້ນສຸດສັນຍາ'),
            ],
            $tableOptions
        );

        $this->createIndex('contract_type_id', '{{%contract}}', ['contract_type_id']);
        $this->createIndex('extended_contract_id', '{{%contract}}', ['extended_contract_id'], true);
        $this->createIndex('project_id', '{{%contract}}', ['project_id']);

        $this->addForeignKey(
            'contract_ibfk_2',
            '{{%contract}}',
            ['contract_type_id'],
            '{{%contract_type}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'contract_ibfk_3',
            '{{%contract}}',
            ['project_id'],
            '{{%project}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%contract}}');
    }
}
