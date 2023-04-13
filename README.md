# ❌⭕ Jogo da velha 
- o "tabuleiro" é um array com nove casinhas
- na vez do jogador, o jogo adiciona o símbolo do usuário no índice escolhido
- na vez do computador, o programa percorre o array, checa quais posições ainda estão disponíveis, armazena os índices dessas posições em um outro array e, por fim, usa a função array_rand() para escolher uma das posições para inserir seu símbolo
- ao final de nove jogadas, a função de checagem é chamada e, após uma verificação que provavelmente poderia estar mais otimizada, ele declara o vencedor ou o empate
