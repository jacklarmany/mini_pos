<?php

use yii\db\Migration;

class m220107_074917_create_table_contract_farming extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contract_farming}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ສັນຍາສຳປະທານ'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%contract_farming}}');
    }
}
