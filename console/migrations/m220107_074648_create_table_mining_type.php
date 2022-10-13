<?php

use yii\db\Migration;

class m220107_074648_create_table_mining_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%mining_type}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ປະເພດການຂຸດຄົ້ນແຮ່ທາດ'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%mining_type}}');
    }
}
