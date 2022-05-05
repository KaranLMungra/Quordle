<?php

use yii\helpers\Html;
use app\components\GroupWidget;
?>
<center>
    <h1>
        Wordle
    </h1>
    <div class="main-container">
        <div class="left-container">
            <label for="guess" class="label">Enter Your Guess:</label>
            <br />
            <input type="text" id="guess" name="guess" class="guess" minlength="5" maxlength="5" />
            <br />
            <br />
            <button type="button" class="grey-sq btn-start" onclick="setGuess()">Check!</button>
        </div>
        <script>
            function setGuess() {
                var guess = document.getElementById("guess").value;
                document.cookie = `guess=${guess}`;
                location.reload();
            }
        </script>
        <br />
        <div class="right-container">
            <?php
            $guess = "";
            $solution = "";
            $cookie_name = "guess";
            $r = [];
            if (isset($_COOKIE['res'])) {
                $res = $_COOKIE['res'];
            } else {
                $res = [];
            }
            $g = [];
            if (isset($_COOKIE['solution'])) {
                $solution = $_COOKIE['solution'];
                $game = new WordleGame($solution);
            }
            if (isset($_COOKIE['guess'])) {
                $guess = $_COOKIE['guess'];
            } else {
                $_COOKIE['guess'] = $guess;
            }
            $r = $game->play($guess);
            $m = 0;
            foreach ($r as $i) {
                $j = ["color" => $i, "alphabet" => $guess[$m]];
                array_push($g, $j);
                $m += 1;
            }
            array_push($res, $g);
            if (isset($_COOKIE['res'])) {
                $res_1 = $_COOKIE['res'];
                $res_2 = array_merge($res_1, $res);
                $_COOKIE['res'] = $res_2;
            }
            if (!isset($_COOKIE[$cookie_name])) {
                setcookie($cookie_name, "words", time() + 60 * 60);
            }
            ?>
            <?php foreach ($res as $i) : ?>
                <div>
                    <?= GroupWidget::widget(['group' => $i]) ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        echo $_COOKIE['guess'];
        echo '<br />';
        print_r($r);
        if (isset($_COOKIE['res'])) {
            print_r($_COOKIE['res']);
        }
        echo $_COOKIE['solution'];
        ?>
    </div>
</center>