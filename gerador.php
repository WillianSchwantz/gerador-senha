<?php

function gerarSenha(array $parametros = []) {
    // Parâmetros padrão
    $parametrosPadrao = [
        'comprimento' => 10,
        'incluiNumeros' => true,
        'incluiLetrasMaiusculas' => true,
        'incluiLetrasMinusculas' => true,
        'incluiCaracteresEspeciais' => true,
    ];

    // Extrair e validar parâmetros
    $parametros = array_merge($parametrosPadrao, $parametros);
    $comprimento = abs(intval($parametros['comprimento'])); // Valor absoluto do comprimento
    $caracteresValidos = "";

    if ($parametros['incluiNumeros']) {
        $caracteresValidos .= '0123456789';
    }
    if ($parametros['incluiLetrasMaiusculas']) {
        $caracteresValidos .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($parametros['incluiLetrasMinusculas']) {
        $caracteresValidos .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($parametros['incluiCaracteresEspeciais']) {
        $caracteresValidos .= '!@#$%^&*()';
    }

    // Gerar senha
    $senha = "";
    $tamanhoCaracteres = strlen($caracteresValidos);
    for ($i = 0; $i < $comprimento; $i++) {
        $senha .= $caracteresValidos[rand(0, $tamanhoCaracteres - 1)];
    }

    return $senha;
}

// Exemplos de uso:
$senha1 = gerarSenha(); // Senha com parâmetros padrão
$senha2 = gerarSenha(['comprimento' => 16, 'incluiNumeros' => false]); // Senha sem números
$senha3 = gerarSenha(['incluiLetrasMinusculas' => false, 'incluiCaracteresEspeciais' => true]); // Senha sem letras minúsculas, com caracteres especiais

echo "Senha 1: " . $senha1 . "<br>";
echo "Senha 2: " . $senha2 . "<br>";
echo "Senha 3: " . $senha3 . "<br>";