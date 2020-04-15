<?php

use yii\db\Migration;

/**
 * Class m200414_224522_nueva_localidades
 */
class m200414_224522_nueva_localidades extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'localidad';
        $this->insert($table, ['id'=>4020,'nombre'=> 'Las Grutas','departamentoid'=> 403]);
        $this->insert($table, ['id'=>4021,'nombre'=> 'Cubanea','departamentoid'=> 405]);
        $this->insert($table, ['id'=>4022,'nombre'=> 'Vicealmirante O Connor','departamentoid'=> 405]);
        $this->insert($table, ['id'=>4023,'nombre'=> 'General Conesa Rural','departamentoid'=> 395]);
        $this->insert($table, ['id'=>4024,'nombre'=> 'Teniente General Eustaquio Frias','departamentoid'=> 395]);
        $this->insert($table, ['id'=>4025,'nombre'=> 'Paja Alta','departamentoid'=> 404]);
        $this->insert($table, ['id'=>4026,'nombre'=> 'Chipauquil','departamentoid'=> 404]);
        $this->insert($table, ['id'=>4027,'nombre'=> 'Arroyo Ventana','departamentoid'=> 404]);
        $this->insert($table, ['id'=>4028,'nombre'=> 'Ministro Ramos Mexia Rural','departamentoid'=> 394]);
        $this->insert($table, ['id'=>4029,'nombre'=> 'Sociedad Rural Manquichao','departamentoid'=> 399]);
        $this->insert($table, ['id'=>4030,'nombre'=>'Ingeniero Jacobacci Rural','departamentoid'=>399]);
        $this->insert($table, ['id'=>4031,'nombre'=>'Laguna Blanca','departamentoid'=>399]);
        $this->insert($table, ['id'=>4032,'nombre'=>'Ñorquinco Rural','departamentoid'=>396]);
        $this->insert($table, ['id'=>4033,'nombre'=>'Arrollo Las Minas','departamentoid'=>396]);
        $this->insert($table, ['id'=>4034,'nombre'=>'Chacay Huarruca','departamentoid'=>396]);
        $this->insert($table, ['id'=>4035,'nombre'=>'Pilcaniyeu Rural','departamentoid'=>401]);
        $this->insert($table, ['id'=>4036,'nombre'=>'Corralito','departamentoid'=>401]);
        $this->insert($table, ['id'=>4037,'nombre'=>'Coquelen','departamentoid'=>401]);
        $this->insert($table, ['id'=>4038,'nombre'=>'Pilquiniyeu Del Limay','departamentoid'=>401]);
        $this->insert($table, ['id'=>4039,'nombre'=>'Paso Flores','departamentoid'=>401]);
        $this->insert($table, ['id'=>4040,'nombre'=>'Paso Chacabuco','departamentoid'=>401]);
        $this->insert($table, ['id'=>4041,'nombre'=>'Juan De Garay','departamentoid'=>402]);
        $this->insert($table, ['id'=>4042,'nombre'=>'Colonia Josefa','departamentoid'=>398]);
        $this->insert($table, ['id'=>4043,'nombre'=>'Benjamín Zorrilla','departamentoid'=>398]);
        $this->insert($table, ['id'=>4044,'nombre'=>'Ingeniero Huergo','departamentoid'=>397]);
        $this->insert($table, ['id'=>4045,'nombre'=>'Campo Grande','departamentoid'=>397]);
        $this->insert($table, ['id'=>4046,'nombre'=>'Catriel Rural','departamentoid'=>397]);
        $this->insert($table, ['id'=>4047,'nombre'=>'El Cuy','departamentoid'=>400]);
        $this->insert($table, ['id'=>4048,'nombre'=>'Cerro Policía','departamentoid'=>400]);
        $this->insert($table, ['id'=>4049,'nombre'=>'Lonco Vaca','departamentoid'=>400]);
        $this->insert($table, ['id'=>4050,'nombre'=>'Bajada Colorada','departamentoid'=>400]);
        $this->insert($table, ['id'=>4051,'nombre'=>'Balsa Las Perlas','departamentoid'=>400]);

        $this->update($table, ['departamentoid'=> 394], ['id'=>2610]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200414_224522_nueva_localidades cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200414_224522_nueva_localidades cannot be reverted.\n";

        return false;
    }
    */
}
