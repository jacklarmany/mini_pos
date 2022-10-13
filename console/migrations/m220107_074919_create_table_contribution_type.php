<?php

use yii\db\Migration;

class m220107_074919_create_table_contribution_type extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%contribution_type}}',
            [
                'id' => $this->primaryKey()->comment('ລະຫັດ'),
                'name' => $this->string()->notNull()->comment('ຊື່ປະເພດຜົນງານ'),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%contribution_type}}');
    }
}
