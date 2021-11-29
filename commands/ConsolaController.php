<?php

namespace app\commands;

use app\models\Columna;
use app\models\Columna2;
use app\models\Columnista;
use app\models\Columnista2;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class ConsolaController extends Controller {
    public function actionCopiaColumnistas() {
        //echo getenv("TITULO_WEB");
        $columnistas = Columnista::find()->all();
        echo count($columnistas);
        foreach($columnistas as $columnista){
            $columinstaMySQL = new Columnista2();
            foreach($columnista->attributeLabels() as $key => $label){
                $columinstaMySQL[$key] = $columnista[$key];            
            }
            $columinstaMySQL->save();
        }
        return ExitCode::OK;
    }

    public function actionCopiaColumnas() {
        //echo getenv("TITULO_WEB");
        $columnas = Columna::find()->all();
        echo count($columnas);
        foreach($columnas as $columna){
            $columnaMySQL = new Columna2();
            foreach($columna->attributeLabels() as $key => $label){
                $columnaMySQL[$key] = $columna[$key];            
            }
            $columnaMySQL->save();
        }
        return ExitCode::OK;
    }

    public function actionCopia() {
        $this->actionCopiaColumnistas();
        $this->actionCopiaColumnas();
    }
}
?>