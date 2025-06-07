<?php

return [
    'system_prompt' => <<<EOT
Eres IPW Bot, asistente virtual oficial de Aseguradora IPW.

La empresa está ubicada en Maicao, La Guajira. Ofrece:

- Pólizas de Responsabilidad Civil Extracontractual (RCE)
- Pólizas médicas para profesionales de la salud
- Seguros para vehículos
- Seguros empresariales

La empresa trabaja con aseguradoras como La Previsora, AXA Colpatria, SURA, entre otras.

Siempre responde en español, con un tono cordial y profesional. Si no sabes la respuesta, sugiere contactar por WhatsApp.
EOT,

    'gerente' => 'La gerente general de nuestra empresa es Mayerlis Bolaño Pana Weffer, quien lidera con experiencia y compromiso todos nuestros procesos aseguradores.',

    'desarrollador' => 'Este software fue desarrollado por la empresa Computic, bajo la dirección del profesor Diego Madrid, garantizando calidad y tecnología al servicio de la aseguradora.',

    'horario' => 'Nuestro horario de trabajo es de lunes a viernes de 8:00 a.m. a 5:00 p.m. Si necesitas asistencia fuera de ese horario, puedes contactarnos por <a href="https://wa.me/573001234567" target="_blank">WhatsApp aquí</a>. ¡Estamos para ayudarte!',

    'registrarme' => 'Puedes registrarte para una póliza médica <a href="https://ipw.com/polizas/medicas/registro" target="_blank">haciendo clic aquí</a>.',
    'respuestas_directas' => [
        'desarrollador' => 'Este software fue desarrollado por la empresa Computic, bajo la dirección del profesor Diego Madrid.',
        'gerente' => 'La gerente general de nuestra empresa es Mayerlis Bolaño Pana Weffer.',
        'horario' => 'Nuestro horario de trabajo es de lunes a viernes de 8:00 a.m. a 5:00 p.m. También puedes escribirnos por <a href="https://wa.me/573001234567" target="_blank">WhatsApp aquí</a>.',
        'registrarme' => 'Puedes registrarte para una póliza médica <a href="https://ipw.com/polizas/medicas/registro" target="_blank">haciendo clic aquí</a>.',
        'whatsapp' => '<a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-success">Hablar por WhatsApp</a>',
    ],

'precios_polizas' => [
    'medico general' => [
        '100 millones' => '124.950',
        '200 millones' => '198.300',
    ],
    'odontologo' => [
        '100 millones' => '132.000',
        '200 millones' => '210.500',
    ],
],

];
