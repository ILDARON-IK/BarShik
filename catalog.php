<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-catalog.css">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body >
<main>
    <div class="catalog">
            <h2>Каталог</h2>
            <div class="category">
                <button class="button-category">Соки</button>
                <button class="button-category">Кофе</button>
                <button class="button-category">Газированные напитки</button>
                <button class="button-category">Молочные напитки</button>
                <button class="button-category">Вода</button>
                <button class="button-category">Детские напитки</button>
            </div>
            <div class="bloc-drinks">
                <div class="drink">
                    <div class="tovar">
                        <img src="" alt="">
                        <div class='info_tovar'>
                            <h4>Латте</h3>
                                <h4>180р</h4>
                        </div>
                        <div class="calc">
                            <button class=" button-tovar">-</button>
                            <h3>0</h3>
                            <button class=" button-tovar">+</button>
                        </div>
                        <button class=" button-tovar1">Добавить в корзину</button>
                    </div>
                    <div class="tovar">
                        <img src="" alt="">
                        <div class='info_tovar'>
                            <h4>Латте</h3>
                                <h4>180р</h4>
                        </div>
                        <div class="calc">
                            <button class=" button-tovar">-</button>
                            <h3>0</h3>
                            <button class=" button-tovar">+</button>
                        </div>
                        <button class=" button-tovar1">Добавить в корзину</button>
                    </div>
                    <div class="tovar">
                        <img src="" alt="">
                        <div class='info_tovar'>
                            <h4>Латте</h3>
                                <h4>180р</h4>
                        </div>
                        <div class="calc">
                            <button class=" button-tovar">-</button>
                            <h3>0</h3>
                            <button class=" button-tovar">+</button>
                        </div>
                        <button class=" button-tovar1">Добавить в корзину</button>
                    </div>
                </div>
            </div>
            <button class="podrobnee">Подробнее</button>
    </div>

</div>

</main>
    <!-- подвал -->
<footer id="footer">
    <div class="container">
        <div class="connection">
            <div class="connect">
            <p>Связь с нами</p> 
            <div class="images-connection">
                <img src="images/odnoklassniki_3669991.png" alt=""class="icon-whatsapp">
                <img src="images/vk_3670055.png" class="icon-whatsapp" alt="" srcset="">
                <img src="images/whatsapp_3670051.png" class="icon-whatsapp">
            </div>
            </div>
            <div class="clock-work">
                    <p>Часы  работы:</p>
                    <p>09:00 - 23:00</p>
                </div>
            </div>
        <hr> 
        <p class="copirater">© 2023  Все права защищены.</p> 
    </div>
</footer>
</body>
</html>

<script>
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].style.display = 'none';
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].style.display = 'flex';
    }

    setInterval(nextSlide, 9000);
</script>