<?php

use yii\db\Migration;

/**
 * Class m200831_170747_codigo_postal
 */
class m200831_170747_codigo_postal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('localidad', 'codigo_postal', $this->integer(4));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200831_170747_codigo_postal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_170747_codigo_postal cannot be reverted.\n";

        return false;
    }
    */
}
