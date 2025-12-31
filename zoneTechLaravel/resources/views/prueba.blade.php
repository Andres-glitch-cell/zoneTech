<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prueba de que Funciona</title>
</head>

<body>
    <h1>Hola esto es una prueba</h1>
    <script>
        const elemento = document.getElementsByTagName("h1")
        elemento[0].addEventListener("mouseenter", () => {
            elemento[0].style.backgroundColor = "blue"
        })
        elemento[0].addEventListener("mouseout", () => {
            elemento[0].style.backgroundColor = ""
        })
    </script>
</body>

</html>
