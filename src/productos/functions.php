<?php
function number($valor) {
    // Quitar espacios
    $valor = trim($valor);

    // Quitar separador de miles
    $valor = str_replace('.', '', $valor);

    // Cambiar coma decimal a punto
    $valor = str_replace(',', '.', $valor);

    // Validar
    return is_numeric($valor) ? $valor : 0;
}

function show_number($valor) {
    return number_format($valor, 0, '', '.');
}