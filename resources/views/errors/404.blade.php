<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <style>
        /* Estilos CSS */

        .container-404 {
            width: 400px;
            height: 50px;
        }

        .content-404 {
            display: block;
            position: sticky;
            overflow: hidden;
            font-family: 'Lato', sans-serif;
            font-size: 35px;
            line-height: 40px;
            color: #ecf0f1;
        }

        .content__container {
            font-weight: 600;
            overflow: hidden;
            height: 40px;
            padding: 0 40px;
        }

        .content__container:before {
            content: '[';
            left: 0;
        }

        .content__container:after {
            content: ']';
            position: absolute;
            right: 0;
        }

        .content__container:after,
        .content__container:before {
            position: absolute;
            top: -2px;
            color: #16a085;
            font-size: 42px;
            line-height: 40px;
            -webkit-animation-name: opacity;
            -webkit-animation-duration: 2s;
            -webkit-animation-iteration-count: infinite;
            animation-name: opacity;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        .content__container__text {
            display: inline;
            float: left;
            margin: 0;
            color: black;
        }

        .content__container__list {
            margin-top: 0;
            padding-left: 110px;
            text-align: center;
            list-style: none;
            -webkit-animation-name: change;
            -webkit-animation-duration: 10s;
            -webkit-animation-iteration-count: infinite;
            animation-name: change;
            animation-duration: 4s;
            animation-iteration-count: infinite;
            color: black;
        }

        .content__container__list__item {
            line-height: 40px;
            margin: 0;
        }

        @keyframes opacity {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes change {

            0%,
            12.66%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            16.66%,
            29.32% {
                transform: translate3d(0, -45%, 0);
            }

            33.32%,
            45.98% {
                transform: translate3d(0, -20%, 0);
            }

            66.64%,
            79.3% {
                transform: translate3d(0, -50%, 0);
            }

            83.3%,
            95.96% {
                transform: translate3d(0, -25%, 0);
            }
        }

        /* Style Macbook*/

        .macbook {
            width: 150px;
            height: 96px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -85px 0 0 -78px;
            perspective: 500px;
        }

        .shadow {
            position: absolute;
            width: 60px;
            height: 0px;
            left: 40px;
            top: 160px;
            transform: rotateX(80deg) rotateY(0deg) rotateZ(0deg);
            box-shadow: 0 0 60px 40px rgba(0, 0, 0, 0.3);
            animation: shadow infinite 7s ease;
        }

        .inner {
            z-index: 20;
            position: absolute;
            width: 150px;
            height: 96px;
            left: 0;
            top: 0;
            transform-style: preserve-3d;
            transform: rotateX(-20deg) rotateY(0deg) rotateZ(0deg);
            animation: rotate infinite 7s ease;
        }

        .screen {
            width: 150px;
            height: 96px;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 7px;
            background: #ddd;
            transform-style: preserve-3d;
            transform-origin: 50% 93px;
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            animation: lid-screen infinite 7s ease;
            background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.34) 0%, rgba(0, 0, 0, 0) 100%);
            background-position: left bottom;
            background-size: 300px 300px;
            box-shadow: inset 0 3px 7px rgba(255, 255, 255, 0.5);
        }

        .screen .logo {
            position: absolute;
            width: 20px;
            height: 24px;
            left: 50%;
            top: 50%;
            margin: -12px 0 0 -10px;
            transform: rotateY(180deg) translateZ(0.1px);
        }

        .screen .face-one {
            width: 150px;
            height: 96px;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 7px;
            background: #d3d3d3;
            transform: translateZ(2px);
            background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.24) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .screen .face-one .camera {
            width: 3px;
            height: 3px;
            border-radius: 100%;
            background: #000;
            position: absolute;
            left: 50%;
            top: 4px;
            margin-left: -1.5px;
        }

        .screen .face-one .display {
            width: 130px;
            height: 74px;
            margin: 10px;
            background-color: #000;
            background-size: 100% 100%;
            border-radius: 1px;
            position: relative;
            box-shadow: inset 0 0 2px rgba(0, 0, 0, 1);
        }

        .screen .face-one .display .shade {
            position: absolute;
            left: 0;
            top: 0;
            width: 130px;
            height: 74px;
            background: linear-gradient(-135deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 47%, rgba(255, 255, 255, 0) 48%);
            animation: screen-shade infinite 7s ease;
            background-size: 300px 200px;
            background-position: 0px 0px;
        }

        .screen .face-one span {
            position: absolute;
            top: 85px;
            left: 57px;
            font-size: 6px;
            color: #666
        }

        .macbody {
            width: 150px;
            height: 96px;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 7px;
            background: #cbcbcb;
            transform-style: preserve-3d;
            transform-origin: 50% bottom;
            transform: rotateX(-90deg);
            animation: lid-macbody infinite 7s ease;
            background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.24) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .macbody .face-one {
            width: 150px;
            height: 96px;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 7px;
            transform-style: preserve-3d;
            background: #dfdfdf;
            animation: lid-keyboard-area infinite 7s ease;
            transform: translateZ(-2px);
            background-image: linear-gradient(30deg, rgba(0, 0, 0, 0.24) 0%, rgba(0, 0, 0, 0) 100%);
        }

        .macbody .touchpad {
            width: 40px;
            height: 31px;
            position: absolute;
            left: 50%;
            top: 50%;
            border-radius: 4px;
            margin: -44px 0 0 -18px;
            background: #cdcdcd;
            background-image: linear-gradient(30deg, rgba(0, 0, 0, 0.24) 0%, rgba(0, 0, 0, 0) 100%);
            box-shadow: inset 0 0 3px #888;
        }

        .macbody .keyboard {
            width: 130px;
            height: 45px;
            position: absolute;
            left: 7px;
            top: 41px;
            border-radius: 4px;
            transform-style: preserve-3d;
            background: #cdcdcd;
            background-image: linear-gradient(30deg, rgba(0, 0, 0, 0.24) 0%, rgba(0, 0, 0, 0) 100%);
            box-shadow: inset 0 0 3px #777;
            padding: 0 0 0 2px;
        }

        .keyboard .key {
            width: 6px;
            height: 6px;
            background: #444;
            float: left;
            margin: 1px;
            transform: translateZ(-2px);
            border-radius: 2px;
            box-shadow: 0 -2px 0 #222;
            animation: keys infinite 7s ease;
        }

        .key.space {
            width: 45px;
        }

        .key.f {
            height: 3px;
        }

        .macbody .pad {
            width: 5px;
            height: 5px;
            background: #333;
            border-radius: 100%;
            position: absolute;
        }

        .pad.one {
            left: 20px;
            top: 20px;
        }

        .pad.two {
            right: 20px;
            top: 20px;
        }

        .pad.three {
            right: 20px;
            bottom: 20px;
        }

        .pad.four {
            left: 20px;
            bottom: 20px;
        }

        @keyframes rotate {
            0% {
                transform: rotateX(-20deg) rotateY(0deg) rotateZ(0deg);
            }

            5% {
                transform: rotateX(-20deg) rotateY(-20deg) rotateZ(0deg);
            }

            20% {
                transform: rotateX(30deg) rotateY(200deg) rotateZ(0deg);
            }

            25% {
                transform: rotateX(-60deg) rotateY(150deg) rotateZ(0deg);
            }

            60% {
                transform: rotateX(-20deg) rotateY(130deg) rotateZ(0deg);
            }

            65% {
                transform: rotateX(-20deg) rotateY(120deg) rotateZ(0deg);
            }

            80% {
                transform: rotateX(-20deg) rotateY(375deg) rotateZ(0deg);
            }

            85% {
                transform: rotateX(-20deg) rotateY(357deg) rotateZ(0deg);
            }

            87% {
                transform: rotateX(-20deg) rotateY(360deg) rotateZ(0deg);
            }

            100% {
                transform: rotateX(-20deg) rotateY(360deg) rotateZ(0deg);
            }
        }

        @keyframes lid-screen {
            0% {
                transform: rotateX(0deg);
                background-position: left bottom;
            }

            5% {
                transform: rotateX(50deg);
                background-position: left bottom;
            }

            20% {
                transform: rotateX(-90deg);
                background-position: -150px top;
            }

            25% {
                transform: rotateX(15deg);
                background-position: left bottom;
            }

            30% {
                transform: rotateX(-5deg);
                background-position: right top;
            }

            38% {
                transform: rotateX(5deg);
                background-position: right top;
            }

            48% {
                transform: rotateX(0deg);
                background-position: right top;
            }

            90% {
                transform: rotateX(0deg);
                background-position: right top;
            }

            100% {
                transform: rotateX(0deg);
                background-position: right center;
            }
        }

        @keyframes lid-macbody {
            0% {
                transform: rotateX(-90deg);
            }

            50% {
                transform: rotateX(-90deg);
            }

            100% {
                transform: rotateX(-90deg);
            }
        }

        @keyframes lid-keyboard-area {
            0% {
                background-color: #dfdfdf;
            }

            50% {
                background-color: #bbb;
            }

            100% {
                background-color: #dfdfdf;
            }
        }

        @keyframes screen-shade {
            0% {
                background-position: -20px 0px;
            }

            5% {
                background-position: -40px 0px;
            }

            20% {
                background-position: 200px 0;
            }

            50% {
                background-position: -200px 0;
            }

            80% {
                background-position: 0px 0px;
            }

            85% {
                background-position: -30px 0;
            }

            90% {
                background-position: -20px 0;
            }

            100% {
                background-position: -20px 0px;
            }
        }

        @keyframes keys {
            0% {
                box-shadow: 0 -2px 0 #222;
            }

            5% {
                box-shadow: 1 -1px 0 #222;
            }

            20% {
                box-shadow: -1px 1px 0 #222;
            }

            25% {
                box-shadow: -1px 1px 0 #222;
            }

            60% {
                box-shadow: -1px 1px 0 #222;
            }

            80% {
                box-shadow: 0 -2px 0 #222;
            }

            85% {
                box-shadow: 0 -2px 0 #222;
            }

            87% {
                box-shadow: 0 -2px 0 #222;
            }

            100% {
                box-shadow: 0 -2px 0 #222;
            }
        }

        @keyframes shadow {
            0% {
                transform: rotateX(80deg) rotateY(0deg) rotateZ(0deg);
                box-shadow: 0 0 60px 40px rgba(0, 0, 0, 0.3);
            }

            5% {
                transform: rotateX(80deg) rotateY(10deg) rotateZ(0deg);
                box-shadow: 0 0 60px 40px rgba(0, 0, 0, 0.3);
            }

            20% {
                transform: rotateX(30deg) rotateY(-20deg) rotateZ(-20deg);
                box-shadow: 0 0 50px 30px rgba(0, 0, 0, 0.3);
            }

            25% {
                transform: rotateX(80deg) rotateY(-20deg) rotateZ(50deg);
                box-shadow: 0 0 35px 15px rgba(0, 0, 0, 0.1);
            }

            60% {
                transform: rotateX(80deg) rotateY(0deg) rotateZ(-50deg) translateX(30px);
                box-shadow: 0 0 60px 40px rgba(0, 0, 0, 0.3);
            }

            100% {
                box-shadow: 0 0 60px 40px rgba(0, 0, 0, 0.3);
            }
        }

        /* Div escalado */

        .scaled-div {
            width: 100%;
            max-width: 400px;
            /* Para limitar el ancho del div */
            margin: 0 auto;
            /* Centra horizontalmente */
            transform: scale(1.4);
            /* Aumenta el escala */
            transform-origin: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .scaled-div-mac {
            width: 100%;
            max-width: 400px;
            /* Para limitar el ancho del div */
            margin-left: 910px;
            /* Centra horizontalmente */
            transform: scale(1.2);
            /* Aumenta el escala */
            transform-origin: center;
            box-sizing: border-box;
        }

        /* Style button */

        .custom-button-container {
            display: flex;
            justify-content: center;
            margin-top: 100px;
            /* Margen superior opcional */
        }

        .custom-button {
            background-color: #293846;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #1c2938;
        }
    </style>
</head>

<body>

    <br>
    <br>
    <div class="scaled-div">
        <div class="container-404">
            <div class="content-404">
                <div class="content__container">
                    <p class="content__container__text">
                        Error,
                    </p>

                    <ul class="content__container__list">
                        <li class="content__container__list__item">404!</li>
                        <li class="content__container__list__item">Not Found!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="color: #293846; font-size: 24px; font-weight: bold; text-align: left; width: 100%;">
        ¡Oops! Parece que te has perdido.
        <br><br>
        Lo sentimos, la página que estás buscando no se encuentra disponible en este momento. <br>
        Pero no te preocupes, puedes volver a la página de inicio haciendo clic en el botón de abajo.
    </div>

    <div class="scaled-div-mac">
        <div class="macbook">
            <div class="inner">
                <div class="screen">
                    ƎӘƧ - TU
                    <div class="face-one">
                        <div class="camera"></div>
                        <div class="display">
                            <div class="shade"></div>
                        </div>
                        <span>MacBook Air</span>
                    </div>
                    <title>Layer 1</title>
                </div>
                <div class="macbody">
                    <div class="face-one">
                        <div class="touchpad">
                        </div>
                        <div class="keyboard">
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key space"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                            <div class="key f"></div>
                        </div>
                    </div>
                    <div class="pad one"></div>
                    <div class="pad two"></div>
                    <div class="pad three"></div>
                    <div class="pad four"></div>
                </div>
            </div>
            <div class="shadow"></div>
        </div>
    </div>

    <div class="custom-button-container">
        <button class="custom-button" onclick="window.history.back()">Volver a inicio</button>
    </div>


</body>

</html>
