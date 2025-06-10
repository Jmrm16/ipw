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

    'registrarme' => 'Puedes registrarte para una póliza médica <a href="https://purple-zebra-412652.hostingersite.com/seguros/medicos" target="_blank">haciendo clic aquí</a>.',
    'respuestas_directas' => [
        'desarrollador' => 'Este software fue desarrollado por la empresa Computic, bajo la dirección del profesor Diego Madrid.',
        'gerente' => 'La gerente general de nuestra empresa es Mayerlis Bolaño Pana Weffer.',
        'horario' => 'Nuestro horario de trabajo es de lunes a viernes de 8:00 a.m. a 5:00 p.m. También puedes escribirnos por <a href="https://wa.me/573001234567" target="_blank">WhatsApp aquí</a>.',
        'registrarme' => 'Puedes registrarte para una póliza médica <a href="https://purple-zebra-412652.hostingersite.com/seguros/medicos" target="_blank">haciendo clic aquí</a>.',
        'whatsapp' => '<a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-success">Hablar por WhatsApp</a>',
        'asesor' => 'te redireccionaremos con un asesor con este link <a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-success">Hablar por WhatsApp</a>',
        'poliza' => 'si necesitas informacion sobre la poliza medica puedes escribir tu profesion de la siguiente manera
        <ul>
    <li>Medico General</li>
            <li>Odontologo</li>
            <li>Enfermeria Superior</li>
            <li>pediatria</li>
             <li>ginecologia </li>
              <li>psicologia</li>
               <li>nutricion</li>',
        'poliza' => 'si necesitas informacion sobre la poliza medica puedes escribir tu profesion de la siguiente manera
        <ul>
            <li>Medico General</li>
            <li>Odontologo</li>
            <li>Enfermeria Superior</li>
            <li>pediatria</li>
             <li>ginecologia </li>
              <li>psicologia</li>
               <li>nutricion</li>',
            
        'medicas' => 'si necesitas informacion sobre la poliza medica puedes escribir tu profesion de la siguiente manera
        <ul>
             <li>Medico General</li>
            <li>Odontologo</li>
            <li>Enfermeria Superior</li>
            <li>pediatria</li>
             <li>ginecologia </li>
              <li>psicologia</li>
               <li>nutricion</li>',
        'asesor' => 'te redireccionaremos con un asesor con este link <a href="https://wa.me/573001234567" target="_blank" class="btn btn-sm btn-success">Hablar por WhatsApp</a>',
    ],

'precios_polizas' => [
    'medico general' => [
        '100 millones' => '124.950',
        '4000 millones' => '198.300',
    ],
    'odontologo' => [
        '100 millones' => '132.000',
        '400 millones' => '210.500',
    ],
        'odontologia' => [
        '100 millones' => '132.000',
        '400 millones' => '210.500',
    ],
    'enfermeria superior' => [ // ✅ bien
        '100 millones' => '124.950',
        '400 millones' => '321.300',
    ],
    'pediatria' => [ // 🔧 corregido aquí
        '100 millones' => '124.950',
        '400 millones' => '321.300',
        '500 millones' => '434.350',
        '700 millones' => '565.250',
    ],
        'ginecologia' => [ // 🔧 corregido aquí
        '100 millones' => '249.900',
        '400 millones' => '687.820',
        '500 millones' => '880.600',
        '700 millones' => '1.130.500',
    ],
        'psicologia' => [ // 🔧 corregido aquí
        '100 millones' => '188.020',
        '400 millones' => '499.800',
        '500 millones' => '630.700',
        '700 millones' => '815.150',
    ],
        'nutricion' => [ // 🔧 corregido aquí
        '100 millones' => '107.100',
        '400 millones' => '238.000',
        '500 millones' => '327.250',
        '700 millones' => '419.500',
    ],
],


];
