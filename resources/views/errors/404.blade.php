<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 404 - Página no encontrada</title>
  <style>
    /* Estilos CSS */
    .body-404 {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .content__container__list {
  margin-top: 0;
  padding-left: 110px;
  text-align: left;
  list-style: none;
  -webkit-animation-name: change;
  -webkit-animation-duration: 10s;
  -webkit-animation-iteration-count: infinite;
  animation-name: change;
  animation-duration: 10s;
  animation-iteration-count: infinite;
}

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      font-size: 18px;
    }

    .btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body class="body-404">
  <div class="container">
    <div class="content">
      <div class="content__container">
        <p class="content__container__text">¡Error!</p>
      
        <ul class="content__container__list">
          <li class="content__container__list__item">404</li>
          <li class="content__container__list__item">¡Página no encontrada!</li>
        </ul>

        <a href="/" class="btn">Volver a inicio</a>
      </div>
    </div>
  </div>
</body>
</html>
