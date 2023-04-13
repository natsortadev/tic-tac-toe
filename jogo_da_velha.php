<?php
    $ticTacToe = set_game();
    $count = 0;

    show_board($ticTacToe);

    game($ticTacToe, $count);

    function check_game($ticTacToe) {
        $is_over = in_array(".", $ticTacToe);

        return $is_over;
    }

    function game($ticTacToe, $count) {
        echo "
Sua vez, jogador!

";

        $player = readline("
Insira a posição na qual gostaria de inserir seu símbolo (O) / Lembrem-se que as posições começam em 0 e terminam em 8 
-> ");

        $ticTacToe[$player] = "O";
        $count++;

        show_board($ticTacToe);

        check_winner($ticTacToe, "X", $count);
        check_winner($ticTacToe, "O", $count);

        echo "Vez do CPU!
    
";

        $ticTacToe = play($ticTacToe, $count);
        $count++;

        show_board($ticTacToe);

        check_winner($ticTacToe, "X", $count);
        check_winner($ticTacToe, "O", $count);

        game($ticTacToe, $count);
    } 

    function play($ticTacToe, $count) {
        $disponiveis = array();

        for ($x = 0; $x < 9; $x++) {
            if ($ticTacToe[$x] == ".") {
                $disponiveis = array($x);
            }
        }

        if ($disponiveis != null) {
            $aux = array_rand($disponiveis, 1);  
        } else {
            check_winner($ticTacToe, "X", $count);
            check_winner($ticTacToe, "O", $count);
        }
        $escolhido = $disponiveis[$aux];
        
        $ticTacToe[$escolhido] = "X";

        unset($disponiveis);

        return $ticTacToe;
    }

    function set_game() {
        $ticTacToe = array(".", ".", ".", ".", ".", ".", ".", ".", ".");
        
        return $ticTacToe;
    }

    function show_board($ticTacToe) {
        $count = 0;

        for ($x = 0; $x < 9; $x++) {
            if ($count == 3) {
                echo "
";
                $count = 0;
            }
            echo $ticTacToe[$x];
            $count++;
        }

        echo "

";
    }

    function check_winner($ticTacToe, $y, $count) {
        // horizontal
        if (($ticTacToe[0] == $y && $ticTacToe[1] == $y && $ticTacToe[2] == $y) 
        || ($ticTacToe[3] == $y && $ticTacToe[4] == $y && $ticTacToe[5] == $y)
        || ($ticTacToe[6] == $y && $ticTacToe[7] == $y && $ticTacToe[8] == $y)

        // vertical
        || ($ticTacToe[0] == $y && $ticTacToe[3] == $y && $ticTacToe[6] == $y)
        || ($ticTacToe[1] == $y && $ticTacToe[4] == $y && $ticTacToe[7] == $y)
        || ($ticTacToe[2] == $y && $ticTacToe[5] == $y && $ticTacToe[8] == $y)
        
        // diagonais
        || ($ticTacToe[0] == $y && $ticTacToe[4] == $y && $ticTacToe[8] == $y)
        || ($ticTacToe[2] == $y && $ticTacToe[4] == $y && $ticTacToe[6] == $y)) {
            if ($y == "X") {
                echo "
                
O CPU ganhou (X)!

";

                exit();
            } elseif ($y == "O") {
                echo "

O jogador ganhou (O)!!

";

                exit();
            }
        } else {
            if ($count > 9) {
                echo "
            
Empate!!

";

                exit();
            }
        }
    }
?>