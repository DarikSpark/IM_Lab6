<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cocomo calculation</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
      <link rel="stylesheet" href="css/normalize.css">

</head>
<body>
<br/>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="row">




<script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <main>
        <h3 align="center">Количество работников на протяжении всего цикла создания продукта</h3>
           <div id="bar-chart"></div>





        <table class="table table-hover pe-blog-post"> 
            <tr>
                <th></th>
                <th>Работа</th>
                <th><strong>Время</strong></th>
                <th>EAF</th>
            </tr>
            <tr>
                <td>Результаты расчета</td>
                <td><var id="js-out-work">619</var> человеко-месяцев</td>
                <td><var id="js-out-time">38</var> месяцев</td>
                <td><var id="js-out-eaf">1.0</var></td>
            </tr>
        </table>
    </main>


<div class="pe-blog-post">


<div class="form-group col-sm-6">
    <label for="js-input-kdsi" class="control-label small text-muted">Количество строк:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">%</span>-->
        <input type="number" tabindex="2" id="js-input-KDSI" name="js-input-KDSI"
               class="form-control mrs mbs js-widget-input"
               data-type="kdsi" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$" data-target="#js-in-RELY" value="140000">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <label for="js-input-type" class="control-label small text-muted">Тип системы:</label>

    <div class="input-group prefix suffix">
        <!--                            <span class="prefix">$</span>-->
        <!--                            <span class="suffix">M</span>-->
        <input type="text" tabindex="1" id="js-input-type" name="js-input-type"
               class="form-control mrs mbs js-widget-input"
               data-current="0" data-max="2" data-type="type-system" pattern="\d*" data-target="#js-in-kdsi"
               value="Обычный"
               disabled style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1" disabled>–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>


<div class="form-group col-sm-6">
    <label for="js-input-RELY" class="control-label small text-muted">Требуемая надежность:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">%</span>-->
        <input type="text" tabindex="3" id="js-input-RELY" name="js-input-RELY"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-RELY" value="Номинальный" disabled style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="form-group col-sm-6">
    <label for="js-input-margin" class="control-label small text-muted">Размер базы данных:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">%</span>-->
        <input type="text" tabindex="3" id="js-input-DATA" name="js-input-margin"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-min="1" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*))$"
               data-target="#js-in-margin" value="Номинальный" disabled style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-multiple-delta" class="control-label small text-muted">Сложность продукта:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="5" id="js-input-CPLX" name="js-input-multiple-delta"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-delta" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Ограничение времени выполнения:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-TIME" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-min="2" data-type="options-system"
               pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Ограничение объема памяти:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-STOR" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-min="2" data-type="options-system"
               pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Изменчивость виртуальной машины:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-VIRT" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-min="1" data-type="options-system"
               pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Время реакции компьютера:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-TURN" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-min="1" data-type="options-system"
               pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Способности аналитика:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-ACAP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Знание приложений:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-AEXP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Способности программиста:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-PCAP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Знание виртуальной машины:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-VEXP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="3" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Знание языка программирования:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-LEXP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="3" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Использование современных методов:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-MODP" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Использование программных
        инструментов:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-TOOL" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>

<div class="col-sm-6 form-group">
    <label for="js-input-mutiple-pre" class="control-label small text-muted">Ограничение по срокам разработки:</label>

    <div class="input-group suffix">
        <!--                            <span class="suffix">x</span>-->
        <input type="text" tabindex="6" id="js-input-SCED" name="js-input-multiple-pre"
               class="form-control mrs mbs js-widget-input"
               data-current="2" data-max="4" data-type="options-system" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$"
               data-target="#js-in-multiple-pre" value="Номинальный" disabled
               style="cursor: default; background: #ffffff;">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
            <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
        </div>
    </div>
</div>


                    <div class="col-sm-6">
                        <input type="submit" tabindex="6" onClick="recalculate_widget()" class="form-control mts btn btn-primary btn-block" value="Calculate" id="calculate-btn">
                    </div>
</div>

<br><br>&nbsp;<br>


<main>
<table class="table pe-blog-post">
<h3 align="center">Распределение работ и времени по стадиям жизненного цикла при традиционном подходе</h3> <!-- 9 x 4 table -->
    <tr>
        <th>Вид деятельности</th>
        <th>Работа</th>
        <th><strong>Время</strong></th>
        <!--                        <th>Post</th>-->
    </tr>
    <tr>
        <td>Планирование и определение требований</td>
        <td><var id="js-out-stagework0">46</var></td>
        <td><var id="js-out-stagetime0">10</var></td>
    </tr>
    <tr>
        <td>Проектирование продукта</td>
        <td><var id="js-out-stagework1">103</var></td>
        <td><var id="js-out-stagetime1">10</var></td>
    </tr>
    <tr>
        <td>Детальное проектирование</td>
        <td><var id="js-out-stagework2">143</var></td>
        <td><var id="js-out-stagetime2">5</var></td>
    </tr>
    <tr>
        <td>Кодирование и тестирование отдельных модулей</td>
        <td><var id="js-out-stagework3">149</var></td>
        <td><var id="js-out-stagetime3">5</var></td>
    </tr>

   <tr>
        <td>Интеграция и тестирование</td>
        <td><var id="js-out-stagework4">178</var></td>
        <td><var id="js-out-stagetime4">8</var></td>
    </tr>
    <tr>
        <td ><strong>Итого</strong></td>
        <td><strong><var id="js-out-worktable">619</var></strong></td>
        <td><strong><var id="js-out-timetable">38</var></strong></td>
    </tr>


<table class="table"> <!-- 9 x 4 table -->
<h3 align="center">Стандартное распределение работ по видам деятельности WBS в модели COCOMO</h3>
    <tr>
        <th>Вид деятельности</th>
        <th>Человеко-месяцы</th>
        <!--                        <th>Post</th>-->
    </tr>
    <tr>
        <td>Анализ требований</td>
        <td><var id="js-out-stageworkcode0">46</var></td>
    </tr>
    <tr>
        <td>Проектирование продукта</td>
        <td><var id="js-out-stageworkcode1">103</var></td>
    </tr>
    <tr>
        <td>Программирование</td>
        <td><var id="js-out-stageworkcode2">143</var></td>
    </tr>
    <tr>
        <td>Планирование тестирования</td>
        <td><var id="js-out-stageworkcode3">149</var></td>
    </tr>
   <tr>
        <td>Канцелярия проекта</td>
        <td><var id="js-out-stageworkcode4">178</var></td>    
    <tr>
        <td>Детальное проектирование</td>
        <td><var id="js-out-stageworkcode5">143</var></td>
    </tr>
    <tr>
        <td>Управление конфигурацией и обеспечение качества</td>
        <td><var id="js-out-stageworkcode6">149</var></td>
    </tr>
   <tr>
        <td>Создание руководств</td>
        <td><var id="js-out-stageworkcode7">178</var></td>
    </tr>
    <tr>
        <td ><strong>Итого</strong></td>
        <td><strong><var id="js-out-workcodetable">574</var></strong></td>
    </tr>
</table>


    
</main>    
</div></div></div>

<!--    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="cocomo.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"


</body>
</html>