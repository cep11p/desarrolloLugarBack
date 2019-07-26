<?php

use yii\db\Migration;

/**
 * Class m190723_151403_borrarLocalidad
 */
class m190723_151403_borrarLocalidad extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad';
        $this->delete($table, ['id'=>2544]); //se borra general conesa xq se repite y xq esta en un departamento erroneo

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190723_151403_borrarLocalidad cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190723_151403_borrarLocalidad cannot be reverted.\n";

        return false;
    }
    */
}
