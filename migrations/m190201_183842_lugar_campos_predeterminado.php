<?php

use yii\db\Migration;

/**
 * Class m190201_183842_lugar_campos_predeterminado
 */
class m190201_183842_lugar_campos_predeterminado extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'lugar';
        $this->alterColumn($table,'nombre', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'calle', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'altura', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'latitud', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'longitud', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'barrio', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'piso', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'depto', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'escalera', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'entre_calle_1', "VARCHAR (200) NULL DEFAULT ''");
        $this->alterColumn($table,'entre_calle_2', "VARCHAR (200) NULL DEFAULT ''");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = 'lugar';
        $this->alterColumn($table,'nombre', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'calle', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'altura', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'latitud', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'longitud', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'barrio', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'piso', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'depto', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'escalera', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'entre_calle_1', "VARCHAR (200) NOT NULL");
        $this->alterColumn($table,'entre_calle_2', "VARCHAR (200) NOT NULL");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190201_183842_lugar_campos_predeterminado cannot be reverted.\n";

        return false;
    }
    */
}
