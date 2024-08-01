<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php
        //Forma larga de renderizar
        echo "Hola mundo";
        ?>

    </h1>
    <h2>

        <?=
        //Forma corta de renderizar, sin echo ni php en la apertura de la etiqueta
        "Hola mundo";
        ?>
    </h2>


    <?php
    //VARIABLES 
    $name = "David"; //string
    $isDev = true; //boolean
    $age = 59; //number


    //RETORNAR TIPOS 
    var_dump($age);
    echo gettype($isDev);
    is_string($name); //RETORNA TRUE O FALSE


    //PHP ES UN LENGUAJE DE TIPADO DEBIL, DINAMICO Y GRADUAL
    //DINAMICO PORQUE NO ES NECESARIO DECLARAR EL TIPO DE VARIABLE
    // $age = "39";
    //DEBIL, PORQUE VA A INTENTAR CAMBIAR LOS TIPOS AUTOMATICAMENTE
    $newAge = $age + 1;
    ?>
    <h3><?= var_dump($newAge) ?></h3>


    <?php
    //CONCATENACION, se realiza con .
    $greeting = "Hola, ";
    $greetingWithName = $greeting . $name;
    ?>
    <h4><?= $greetingWithName ?></h4>


    <?php
    //INTERPOLACION DE STRINGS, COMO EN JS CON `${}`
    //SOLO SE PUEDE REAILIZAR CON COMILLAS DOBLES
    $greeting = "Hola, tienes $age años";
    $greeting .= ", y tu nombre es $name";
    ?>
    <h5><?= $greeting ?></h5>


    <?php
    //CONSTANTES
    const imgLogo = "https://www.php.net/images/logos/new-php-logo.svg";
    ?>
    <img src="<?= imgLogo ?>" width="200" alt="phpLogo">


    <?php
    //IF

    $isOld = $age > 40;
    //FORMA DE SIEMPRE
    // if($isOld){
    //     echo "Sos viejardo";
    // } else {
    //     echo "Tas pesuti polimardo buenardopolis";
    // }

    //FORMA NUEVA
    ?>
    <?php if ($isOld) : ?>
        <h6>Sos viejardo</h6>
    <?php else : ?>
        <h6>Tas pesuti polimardo buenardopolis</h6>
    <?php endif;  ?>


    <?php
    //TERNARIAS COMO EN JS
    $outputAge = $isOld ? "Viejo" : "Nuevo";
    ?>
    <!-- <h3><?= $outputAge ?></h3> -->

    <?php
    //MATCH , FUNCIONA CASI COMO SWITCH
    $outputAge = match (true) {
        $age < 2 => "Sos un bebe",
        $age < 10 => "Sos un niño",
        $age < 18 => "Sos un adolescente",
        $age === 18 => "Sos mayor de edad",
        $age < 40 => "Sos un adulto",
        $age < 60 => "Sos un adulto viejardo",
        default => "Oles mas a madera que a fruta"
    }
    ?>
    <h3><?= $outputAge ?></h3>


    <?php
    // ARRAYS
    //PODEMOS CREARLOS DE DISTINTAS MANERAS
    $lenguajes = array("Inglés", "Alemán", "Español");
    $frutas = ["Manzana", "Plátano", "Naranja"];

    //AGREGAR UN ELEMENTO AL FINAL DE UN ARRAY
    $frutas[] = "Banana";

    //REASIGNAR UN ELEMENTO DEL ARRAY SEGUN LA POSICION
    $frutas[1] = "Durazno";

    //RECORRER UN ARRAY Y MOSTRARLO, TAMBIEN INDICE
    $programmingLanguajes = ['PHP', 'JavaScript', 'Java', 'C'];
    ?>
    <ul>
        <?php foreach ($programmingLanguajes as $key => $languaje) : ?>
            <li><?= $key + 1 . " " . $languaje ?></li>
        <?php endforeach; ?>
        <!-- <?php
                foreach ($programmingLanguajes as $key => $languaje) {
                    echo "<li>$key $languaje</li>";
                }
                ?> -->
    </ul>

    <?php
    //ARRAYS ASOCIATIVOS, PARECIDOS A OBJETOS DE JS
    $person = [
        "name" => "Juan",
        "age" => 25,
        "isDev" => true,
        "languajes" => ["Inglés", "Alemán", "Español"]
    ]
    ?>
    <h4>

        <?= $person["languajes"][1] ?>
    </h4>


    <?php
    //LLAMADAS A UNA API
    $url = "https://jsonplaceholder.typicode.com/posts";
    //INICIAMOS UNA SESION EN CURL
    // $ch = curl_init($url);

    //CONFIGURAMOS LA SESION PARA RECIBIR EL RESULTADO Y NO MOSTRARLO POR PANTALLA
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //EJECUTAMOS LA PETICION Y GUARDAMOS EL RESULTADO
    // $result = curl_exec($ch);

    //CERRAMOS LA SESION DE CURL
    // curl_close($ch)

    //SOLO PARA HACER PETICIONES CON EL METODO GET
    $result = file_get_contents($url);
    $data = json_decode($result, true);
    var_dump($data);
    ?>


</body>

</html>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>