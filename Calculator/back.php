<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postData = file_get_contents('php://input');
    
    $result = calculate($postData);
    if ($result !== false) {
        echo $result;
    } else {
        echo 'Ошибка: неверное выражение';
    }
} else {
    http_response_code(405);
    echo "Метод запроса не поддерживается.";
}

function calculate($str) {
    switch (true) {
        case strpos($str, '+') !== false:
            list($firstCount, $secondCount) = explode('+', $str, 2);
            return (int)$firstCount + (int)$secondCount;
        case strpos($str, '-') !== false:
            list($firstCount, $secondCount) = explode('-', $str, 2);
            return (int)$firstCount - (int)$secondCount;
        case strpos($str, '*') !== false:
            list($firstCount, $secondCount) = explode('*', $str, 2);
            return (int)$firstCount * (int)$secondCount;
        case strpos($str, '/') !== false:
            list($firstCount, $secondCount) = explode('/', $str, 2);
            if ((int)$secondCount === 0) {
                return false;
            }
            return (int)$firstCount / (int)$secondCount;
        default:
            return (int)$str;
    }
}

?>