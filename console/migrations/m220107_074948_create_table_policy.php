<?php

use yii\db\Migration;

class m220107_074948_create_table_policy extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%policy}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ນະໂຍບາຍ'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%policy}}');
    }
}
