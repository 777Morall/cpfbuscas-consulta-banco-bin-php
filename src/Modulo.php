<?php
declare(strict_types=1);

/** Monta parâmetros; não realiza chamadas de rede. */
function prepararConsulta(array $args): array
{
    $command=$args[0] ?? '';
    $value=trim($args[1] ?? '');
    if ($command==='banco') {
        if (!preg_match('/^[0-9]{1,3}$/D',$value)) throw new InvalidArgumentException('Informe código bancário com até três dígitos.');
        return ['banco',['codigo'=>str_pad($value,3,'0',STR_PAD_LEFT)]];
    }
    if ($command==='bin') {
        if (!preg_match('/^[0-9]{6,8}$/D',$value)) throw new InvalidArgumentException('Este exemplo aceita somente prefixo BIN de seis a oito dígitos. Nunca informe cartão completo.');
        return ['bin',['bin'=>$value]];
    }
    throw new InvalidArgumentException('Escolha banco ou bin.');
}
