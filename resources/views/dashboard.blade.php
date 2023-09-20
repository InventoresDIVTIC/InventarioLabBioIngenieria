<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/dashboard.css">
    <title>DEV LAB DE BIOINGENIERIA</title>
    <style>
        /* Estilos globales */
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilos para el contenedor principal del dashboard */
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Estilos para el encabezado del dashboard */
        .dashboard-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        /* Estilos para el contenido del dashboard */
        .dashboard-content {
            padding: 20px;
        }

        /* Estilos para las imágenes desplazantes */
        .image-slider-container {
            width: 100%;
            overflow: hidden;
            margin-top: 20px;
            position: relative;
        }

        .image-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .image-slider img {
            width: 100%;
            height: auto;
        }

        /* Estilo para los botones de cambio de imagen */
        .image-slider-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .image-slider-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Estilos para los mensajes del dashboard */
        .dashboard-message {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <section>
            <div class="dashboard-container">
                <div class="dashboard-header">
                    <h1>Laboratorio de Bioingeniería</h1>
                </div>
                <div class="dashboard-content">
                    <h2>Bienvenido</h2>
                </div>

                <!-- Sistema de imágenes desplazantes -->
                <div class="image-slider-container">
                    <div class="image-slider">
                        <img src="user.png" alt="Imagen 1">
                        <img src="user.png" alt="Imagen 2">
                        <img src="user.png" alt="Imagen 3">
                        <!-- Agrega más imágenes aquí -->
                    </div>
                    <div class="image-slider-buttons">
                        <button onclick="previousImage()">Imagen Anterior</button>
                        <button onclick="nextImage()">Siguiente Imagen</button>
                    </div>
                </div>

                <div class="dashboard-message">
                    <p>{{ __("Log in correcto") }}</p>
                </div>
            </div>
        </section>
    </x-app-layout>

    <script>
        // Código JavaScript para el desplazamiento de imágenes
        const imageSlider = document.querySelector('.image-slider');
        let translateValue = 0;
        const imageCount = document.querySelectorAll('.image-slider img').length;
        let currentImageIndex = 0;

        function nextImage() {
            if (currentImageIndex < imageCount - 1) {
                currentImageIndex++;
                translateValue -= 100; // Ajusta el valor según el ancho de las imágenes
                imageSlider.style.transform = `translateX(${translateValue}%)`;
            }
        }

        function previousImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                translateValue += 100; // Ajusta el valor según el ancho de las imágenes
                imageSlider.style.transform = `translateX(${translateValue}%)`;
            }
        }

        // Configura un temporizador para el desplazamiento automático
        setInterval(nextImage, 3000); // Cambia de imagen cada 3 segundos (ajusta según tus necesidades)
    </script>
</body>
</html>
