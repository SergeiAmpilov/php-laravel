<?php
/* @var string $data1 */
/* @var string $data2 */
/* @var string $var1 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main from view</title>
</head>
<body>
    <h1>main view</h1>
    {{ $var1  }}
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut autem blanditiis expedita iusto officiis optio praesentium provident quis saepe voluptas.
    </p>
    <?= $data2 ?>
    <br>
    <?= $data1 ?>
    <br>
</body>
</html>
