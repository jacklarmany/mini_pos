<?php

use yii\db\Migration;

class m220107_074958_create_table_contract_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_type}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ປະເພດສັນຍາ'),
                'priority' => $this->string()->comment('ລຳດັບຄວາມສຳຄັນ'),
                'sector_id' => $this->integer()->notNull(),
                'notification' => $this->tinyInteger()->defaultValue('0'),
                'set_day_expire_notification' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_contract_type_sector1_idx', '{{%contract_type}}', ['sector_id']);

        $this->addForeignKey(
            'fk_contract_type_sector1',
            '{{%contract_type}}',
            ['sector_id'],
            '{{%sector}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%contract_type}}');
    }
}
