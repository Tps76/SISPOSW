
<p class="menu__title">Categorias</p>
<ul class=menu>
    <?php
    ClientController::getCat();
    ?>
    <li class="">
        <a class="menu__link" href="#">
            <p>
                <label for="amount">Rango de precio:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; width:123px;">
            </p>
            <div id="slider-range" ></div> 
        </a>
    </li>
</ul>
