<?php

use yii\db\Migration;

class m220714_095746_create_table_monitoring_import_fund extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%monitoring_import_fund}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'fund_value' => $this->double()->defaultValue('0')->comment('Value'),
                'fund_type_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table fund type '),
            ],
            $tableOptions
        );

        $this->createIndex('fk_monitoring_import_fund_fund_type1_idx', '{{%monitoring_import_fund}}', ['fund_type_id']);
        $this->createIndex('fk_monitoring_import_fund_title_has_monitoring1_idx', '{{%monitoring_import_fund}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_monitoring_import_fund_fund_type1',
            '{{%monitoring_import_fund}}',
            ['fund_type_id'],
            '{{%m_import_fund_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%monitoring_import_fund}}');
    }
}
