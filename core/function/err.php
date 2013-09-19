<?php

// Обрабатываются все возможные ошибки

error_reporting (55);

//error_reporting(E_ALL);
/*/ Функция-обработчик
function myErrorHandler($type, $message, $file, $line)
{
    static $titles = array(
        E_WARNING           => 'Предупреждение',
        E_NOTICE            => 'Уведомление',
        E_USER_ERROR        => 'Ошибка, определенная пользователем',
        E_USER_WARNING      => 'Предупреждение, определенное пользователем',
        E_USER_NOTICE       => 'Уведомление, определенное пользователем',
        E_STRICT            => 'Проблема совместимости в коде',
        E_RECOVERABLE_ERROR => 'Поправимая ошибка'
    );

    print '<div style="position:fixed; top:0px; left:0px; width:100%; height:100%; background: url(core/templates/pony/img/background.png) fixed 50% no-repeat white;" align="center"> <div style="width:600px; margin: 200px auto; background: white; border-radius: 3px; box-shadow: 0 0 10px rgba(0,0,0, .4); min-height:80px; padding:10px;"><h3 style="color:#f00;">' . $titles[$type] . '</h3>'
        . '<p>' . $message . '<br />'
        . 'Источник: ' . basename($file) . ', line ' . $line . '</p></div></div>';
    return true;
}

// Назначаем обработчик
set_error_handler('myErrorHandler');*/

?>