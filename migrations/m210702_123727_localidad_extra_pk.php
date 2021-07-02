<?php

use yii\db\Migration;

/**
 * Class m210702_123727_localidad_extra_pk
 */
class m210702_123727_localidad_extra_pk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('localidad_extra_pk', 'localidad_extra', ['localidadid']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210702_123727_localidad_extra_pk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210702_123727_localidad_extra_pk cannot be reverted.\n";

        return false;
    }
    */
}
