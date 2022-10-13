<?php

use yii\db\Migration;

class m220107_075025_create_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'contract_ibfk_1',
            '{{%contract}}',
            ['extended_contract_id'],
            '{{%contract}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropForeignKey('contract_ibfk_1', '{{%contract}}');
    }
}
