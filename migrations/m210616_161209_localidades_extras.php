<?php

use yii\db\Migration;

/**
 * Class m210616_161209_localidades_extras
 */
class m210616_161209_localidades_extras extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad';
        $this->update($table, ['codigo_postal'=>8504], ['id'=>613]);
        $this->update($table, ['codigo_postal'=>8300], ['id'=>2504]);
        $this->update($table, ['codigo_postal'=>8000], ['id'=>382]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210616_161209_localidades_extras cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210616_161209_localidades_extras cannot be reverted.\n";

        return false;
    }
    */
}
