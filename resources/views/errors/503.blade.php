<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>👷 Under construction</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            background: #555;
            font-family: 'Roboto Mono', monospace;
            font-weight: 100;
            background: none;
            color: #fff;
        }

        #backgroundImage1,
        #backgroundImage2,
        .ovarlay,
        .infoText {
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            position: absolute;
        }

        backgroundImage,
        #backgroundImage1,
        #backgroundImage2 {
            background-color: #555;
            background-image: url('https://unsplash.it/1200/750/?random&0');
            background-position: center center;
            background-size: cover;
        }

        .ovarlay {
            background: rgba(0, 0, 0, .6);
            z-index: 5;
        }

        .infoText {
            font-size: 80px;
            text-align: center;
            top: 40%;
            background: none;
            letter-spacing: 10px;
            z-index: 6;
            padding: 10px;
        }

        .infoText span {
            font-size: 14px;
            letter-spacing: 40px;
            display: block;
        }

        .hide {
            opacity: 0;
            -webkit-transition: all 3s 3s ease-in-out;
            -moz-transition: all 3s 3s ease-in-out;
            -ms-transition: all 3s 3s ease-in-out;
            -o-transition: all 3s 3s ease-in-out;
            transition: all 3s 3s ease-in-out;
            z-index: 2;
        }

        .show {
            opacity: 1;
            -webkit-transition: all 3s 3s ease-in-out;
            -moz-transition: all 3s 3s ease-in-out;
            -ms-transition: all 3s 3s ease-in-out;
            -o-transition: all 3s 3s ease-in-out;
            transition: all 3s 3s ease-in-out;
            z-index: 3;
        }

        .scaleImage {}

        @keyframes slidein {
            from {}

            to {}
        }

        @media screen and (max-width: 768px) {
            .infoText {
                font-size: 40px;
                letter-spacing: 5px;
            }

            .infoText span {
                letter-spacing: 20px;
            }
        }

        @media screen and (max-width: 400px) {
            .infoText {
                font-size: 20px;
                letter-spacing: 1px;
            }

            .infoText span {
                font-size: 10px;
                letter-spacing: 10px;
            }
        }

    </style>
</head>

<body>
    <div id="backgroundImage"></div>
    <div class="hide" id="backgroundImage1"></div>
    <div class="show" id="backgroundImage2"></div>
    <div class="ovarlay"></div>
    <div class="infoText">
        САЙТ В РАЗРАБОТКЕ
        <span>UGLUK ONLINE</span>
    </div>
    <script>
        backgroundCount = 0;
        currentFrame = 1;

        function restartTimer() {
            timePrompt = setTimeout(function() {
                changeImage();

            }, 6000);
        }

        function changeImage() {
            backgroundCount++;
            imageUrl = "url('https://unsplash.it/1200/750/?random&" + backgroundCount + "')";

            if (currentFrame == 1) {
                currentName = "backgroundImage1";
                hideName = "backgroundImage2";
                currentFrame = 2;
            } else {
                currentName = "backgroundImage2";
                hideName = "backgroundImage1";
                currentFrame = 1;
            }
            document.getElementById(currentName).style.backgroundImage = imageUrl;
            document.getElementById(hideName).className = 'hide';
            document.getElementById(currentName).className = 'show';

            restartTimer();
        }
        restartTimer();
    </script>
</body>

</html>
