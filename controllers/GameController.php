<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\GuessForm;
use WordleGame;

include_once('../assets/wordle_game/wordle_game.php');

class GameController extends Controller
{
    public function actionIndex()
    {
        $model = new EntryForm();
        $cookie_name = "solution";
        if (!isset($_COOKIE[$cookie_name])) {
            $game = new WordleGame();
            $cookie_value = $game->get_solution();
            setcookie($cookie_name, $cookie_value, time() + 60 * 60);
        }
        $_COOKIE['res'] = [];
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('game', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('index', ['model' => $model]);
        }
    }
}
