<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Estilos CSS</title>
    <link rel="stylesheet" href="estilos.css">
	  <style>
        .image-container {
            text-align: left; Centra el contenido horizontalmente */
        }

        .shifted-image {
            margin-left: 100px; /* Mueve la imagen hacia la derecha */
            display: block; /* Hace que la imagen sea un bloque para aplicar márgenes automáticos */
        }
	  </style>

</head>
<body>

<div class="image-container">
 <img src="Logo_grid_unam_b.png" alt="Imagen de ejemplo" class"shifted-image">
</div>

<hr>

<div class="navbar">
    <h2>Barra de Navegación</h2>
</div>

<div class="container">
    <h1>Título Principal</h1>
    <p>Este es un párrafo de texto regular. <a href="#">Este es un enlace</a>.</p>

    <button class="button">Botón</button>

    <form>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" class="form-input" placeholder="Ingresa tu nombre">

        <label for="email">Email:</label>
        <input type="email" id="email" class="form-input" placeholder="Ingresa tu email">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Encabezado 1</th>
                <th>Encabezado 2</th>
                <th>Encabezado 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dato 1</td>
                <td>Dato 2</td>
                <td>Dato 3</td>
            </tr>
            <tr>
                <td>Dato 4</td>
                <td>Dato 5</td>
                <td>Dato 6</td>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>Elemento de lista 1</li>
        <li>Elemento de lista 2</li>
        <li>Elemento de lista 3</li>
    </ul>

    <ol>
        <li>Elemento de lista numerada 1</li>
        <li>Elemento de lista numerada 2</li>
        <li>Elemento de lista numerada 3</li>
    </ol>

    <img src="https://via.placeholder.com/300" alt="Imagen de ejemplo">
</div>

</body>
</html>

