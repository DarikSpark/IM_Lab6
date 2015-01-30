function precise_round(num, decimals) {
    var t=Math.pow(10, decimals);
    return (Math.round((num * t) + (decimals>0?1:0)*(Math.sign(num) * (10 / Math.pow(100, decimals)))) / t).toFixed(decimals);
}

function recalculate_widget() {

//  Матрица значений всех коэффициентов
    var cfrely = [0.75, 0.86, 1.0, 1.15, 1.4];
    var cfdata = [0.94, 0.94, 1.0, 1.08, 1.16];
    var cfcplx = [0.7, 0.85, 1.0, 1.15, 1.3];
    var cftime = [1.0, 1.0, 1.0, 1.11, 1.5];
    var cfstor = [1.0, 1.0, 1.0, 1.06, 1.21];
    var cfvirt = [0.87, 0.87, 1.0, 1.15, 1.3];
    var cfturn = [0.87, 0.87, 1.0, 1.07, 1.15];
    var cfacap = [1.46, 1.19, 1.0, 0.86, 0.71];
    var cfaexp = [1.29, 1.15, 1.0, 0.91, 0.82];
    var cfpcap = [1.42, 1.17, 1.0, 0.86, 0.7];
    var cfvexp = [1.21, 1.1, 1.0, 0.9, 0.9];
    var cflexp = [1.14, 1.07, 1.0, 0.95, 0.95];
    var cfmodp = [1.24, 1.1, 1.0, 0.91, 0.82];
    var cftool = [1.24, 1.1, 1.0, 0.91, 0.82];
    var cfsced = [1.23, 1.08, 1.0, 1.04, 1.1];

//    Извлечение данных из поля
    typeSystem = $('#js-input-type').val();
    kdsi = $('#js-input-KDSI').val();

//  Занос данных в таблицу
    $('#js-in-type').text(typeSystem);
    $('#js-in-KDSI').text(kdsi);

//  Обновление данных в поле страницы



//    revenue = $('#js-input-type').val();
//    margin = parseFloat($('#js-input-margin').val()) / 100;
//    multiple_pre = parseFloat($('#js-input-multiple-pre').val());
//    ebitda_delta = $('#js-input-RELY').val();
//    multiple_delta = parseFloat($('#js-input-multiple-delta').val());

//    // Round independent cell values
////    revenue = precise_round(revenue,0);
//    multiple_pre = precise_round(multiple_pre,1);
//    multiple_delta = precise_round(multiple_delta,1);
////    ebitda_delta_display = precise_round(ebitda_delta * 100,0);
//    margin_display = precise_round(margin * 100,0);
//
//    // Update independent cells
//    $('#js-in-type').text(revenue);
//    $('#js-in-margin').text(margin_display);
//    $('#js-in-margin2').text(margin_display);
//    $('#js-in-multiple-pre').text(multiple_pre);
//    $('#js-in-RELY').text(ebitda_delta);
//    $('#js-in-multiple-delta').text(multiple_delta);
//
//
//    // Force input specificity
//    $('#js-input-type').val(revenue);
//    $('#js-input-margin').val(margin_display);
//    $('#js-input-multiple-pre').val(multiple_pre);
//    $('#js-input-RELY').val(ebitda_delta);
//    $('#js-input-multiple-delta').val(multiple_delta);
//
//
//
//
//    // Calculate and round dependent cells
//
//    multiple_post = parseFloat(multiple_pre) + parseFloat(multiple_delta);
//    multiple_post = precise_round(multiple_post,1);
//
//    ebitda = parseFloat(revenue) * margin;
//    ebitda = precise_round(ebitda,0);
//
//    mv_pre = parseFloat(ebitda) * parseFloat(multiple_pre);
//    mv_pre = precise_round(mv_pre,0);
//
//    ebitda_post = parseFloat(ebitda) * (1 + ebitda_delta);
//    ebitda_post = precise_round(ebitda_post,0);
//
//    revenue_post = parseFloat(ebitda_post) / margin;
//    revenue_post = precise_round(revenue_post,0);
//
//    // revenue_delta
//    revenue_delta = parseFloat(revenue_post) - parseFloat(revenue);
//    revenue_delta = precise_round(revenue_delta,0);
//
//    mv_post = parseFloat(ebitda) * (1 + ebitda_delta) * parseFloat(multiple_post);
//    mv_post = precise_round(mv_post,0);
//
//    mv_delta = parseFloat(mv_post) - parseFloat(mv_pre);
//    mv_delta = precise_round(mv_delta,0);
//
//    // from ebitda
//    delta_ebitda = ( parseFloat(ebitda_post) - parseFloat(ebitda) ) * parseFloat(multiple_pre);
//    delta_ebitda = precise_round(delta_ebitda,0);
//
//    // from multiple
//    delta_multiple = parseFloat(mv_delta) - parseFloat(delta_ebitda);
//    delta_multiple = precise_round(delta_multiple,0);
//
//
//    // Update dependent cells
//    $('#js-out-multiple-post').text(multiple_post);
//    $('#js-out-ebitda-pre').text(ebitda);
//    $('#js-out-mv-pre').text(mv_pre);
//    $('#js-out-ebitda-post').text(ebitda_post);
//    $('#js-out-mv-post').text(mv_post);
//    $('#js-out-revenue-post').text(revenue_post);
//    $('#js-out-revenue-delta').text(revenue_delta);
//    $('#js-out-mv-delta').text(mv_delta);
//    $('#js-out-delta-ebitda').text(delta_ebitda);
//    $('#js-out-delta-multiple').text(delta_multiple);



// ----------------------------------------------

    // $('#js-out-delta-ebitda').text(Math.floor( (ebitda * ebitda_delta) - multiple_pre) );
    // $('#js-out-delta-multiple').text(Math.floor( (ebitda * ebitda_delta * multiple_post) - (ebitda * ebitda_delta * multiple_pre)  ));


}

function pe_increment() {

    var typeSystem = ["Обычный", "Промежуточный", "Встроенный"];
    var myOptions = ["Очень низкий", "Низкий", "Номинальный", "Высокий", "Очень высокий"];

    obj = $(this).parent().prev('input');
    current = obj.data('current');
    max = obj.data('max');

    current = parseFloat(current);
    max = parseFloat(max);

//    Обработчик для поля количество строк
    if (obj.data('type') == 'kdsi') {
        obj.val(parseFloat(obj.val())+10000);
    }

    if (current+1 < max) {
//      Проверка: Кнопка принадлежит выбору типа системы или опций системы
        if (obj.data('type') == 'type-system') {
            obj.val(typeSystem[current+1].toString());
        }
        else {
            obj.val(myOptions[current+1].toString())
        }

        obj.data('current', current+1);
//        Отдельный else для отключения функционирования кнопки
    } else if (current+1 == max) {
        if (obj.data('type') == 'type-system') {
            obj.val(typeSystem[current+1].toString());
        }
        else {
            obj.val(myOptions[current+1].toString())
        }
        obj.data('current', current+1);
        $(this).attr('disabled',true);
    }
    $(this).prev('button').attr('disabled',false);


    recalculate_widget();
}

function pe_decrement() {

    var typeSystem = ["Обычный", "Промежуточный", "Встроенный"];
    var myOptions = ["Очень низкий", "Низкий", "Номинальный", "Высокий", "Очень высокий"];

    obj = $(this).parent().prev('input');
    current = obj.data('current');
    max = obj.data('max');

    current = parseFloat(current);
    max = parseFloat(max);

//    Обработчик для поля количество строк
    if (obj.data('type') == 'kdsi') {
        if (obj.val()-10000 > 0){
            obj.val(obj.val()-10000);
        }
        else{
            obj.val(0);
            $(this).attr('disabled',true);
        }

    }

    if (current-1 > 0 & obj.data('type') != 'kdsi') {
//      Проверка: Кнопка принадлежит выбору типа системы или опций системы
        if (obj.data('type') == 'type-system') {
            obj.val(typeSystem[current-1].toString());
        }
        else {
            obj.val(myOptions[current-1].toString())
        }

        obj.data('current', current-1);
//        Отдельный else для отключения функционирования кнопки
    } else if (current-1 == 0) {
        if (obj.data('type') == 'type-system') {
            obj.val(typeSystem[current-1].toString());
        }
        else {
            obj.val(myOptions[current-1].toString())
        }
        obj.data('current', current-1);
        $(this).attr('disabled',true);

    }
    $(this).next('button').attr('disabled',false);


    recalculate_widget();
}


$(function() {

    $('.js-increment').click(pe_increment);
    $('.js-decrement').click(pe_decrement);

    $('.js-widget-input').change(function() {
        recalculate_widget();
    });
});