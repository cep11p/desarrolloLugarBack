<?php

use yii\db\Migration;

/**
 * Class m210701_165158_table_localidadExtra
 */
class m210701_165158_table_localidadExtra extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad_extra';

        $this->insert($table, ['localidadid' => 613]);
        $this->insert($table, ['localidadid' => 2504]);
        $this->insert($table, ['localidadid' => 382]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210701_165158_table_localidadExtra cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210701_165158_table_localidadExtra cannot be reverted.\n";

        return false;
    }
    */
}
