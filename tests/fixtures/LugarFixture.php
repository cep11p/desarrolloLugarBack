<?php

namespace app\tests\fixtures;
use yii\test\ActiveFixture;

class LugarFixture extends ActiveFixture{
    
    public $modelClass = '\app\models\Lugar';
    
    public function init() {
        $this ->dataFile = \Yii::getAlias('@app').'/tests/_data/lugar.php';
        parent::init();
    }
    
    public function unload()
    {
        parent::unload();
        $this->resetTable();
    }
    
}

