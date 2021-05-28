<?php

use yii\db\Migration;

/**
 * Class m210528_125038_localidades_duplicadas
 */
class m210528_125038_localidades_duplicadas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad';
        $this->delete($table, [
            'id'=>[4052,4053,4055,4056,4062]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210528_125038_localidades_duplicadas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210528_125038_localidades_duplicadas cannot be reverted.\n";

        return false;
    }
    */
}
