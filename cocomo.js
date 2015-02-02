
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

    var cfс1 = [3.2, 3.0, 2.8];
    var cfp1 = [1.05, 1.12, 1.2];
    var cfc2 = [2.4, 2.5, 2.5];
    var cfp2 = [0.38, 0.35, 0.32];

//  Распределение процентов работы по стадиям
    var cfStageWork = [8, 18, 25, 26, 31];
    var cfStageTime = [36, 36, 18, 18, 28];

    //  Распределение процентов работы по стадиям
    var cfStageWorkCode = [4, 12, 44, 6, 14, 7, 7, 6];








//    Извлечение из полей атрибутов data-current
    typeSystem = $('#js-input-type').data('current');
    kdsi = $('#js-input-KDSI').val();
    curRELY = $('#js-input-RELY').data('current');
    curDATA = $('#js-input-DATA').data('current');
    curCPLX = $('#js-input-CPLX').data('current');
    curTIME = $('#js-input-TIME').data('current');
    curSTOR = $('#js-input-STOR').data('current');
    curVIRT = $('#js-input-VIRT').data('current');
    curTURN = $('#js-input-TURN').data('current');
    curACAP = $('#js-input-ACAP').data('current');
    curAEXP = $('#js-input-AEXP').data('current');
    curPCAP = $('#js-input-PCAP').data('current');
    curVEXP = $('#js-input-VEXP').data('current');
    curLEXP = $('#js-input-LEXP').data('current');
    curMODP = $('#js-input-MODP').data('current');
    curTOOL = $('#js-input-TOOL').data('current');
    curSCED = $('#js-input-SCED').data('current');


//  Подставление, соответствующих таблице значений, коэффициентов 
    curRELY = cfrely[curRELY];
    curDATA = cfdata[curDATA];
    curCPLX = cfcplx[curCPLX];
    curTIME = cftime[curTIME];
    curSTOR = cfstor[curSTOR];
    curVIRT = cfvirt[curVIRT];
    curTURN = cfturn[curTURN];
    curACAP = cfacap[curACAP];
    curAEXP = cfaexp[curAEXP];
    curPCAP = cfpcap[curPCAP];
    curVEXP = cfvexp[curVEXP];
    curLEXP = cflexp[curLEXP];
    curMODP = cfmodp[curMODP];
    curTOOL = cftool[curTOOL];
    curSCED = cfsced[curSCED];

    c1 = cfс1[typeSystem];
    p1 = cfp1[typeSystem];
    c2 = cfc2[typeSystem];
    p2 = cfp2[typeSystem];








//  Вычисление результатов работы
    eaf = curRELY*curDATA*curCPLX*curTIME*curSTOR*curVIRT*curTURN*curACAP*curAEXP*curPCAP*curVEXP*curLEXP*curMODP*curTOOL*curSCED;

    workVolume = c1 * eaf * Math.pow(kdsi/1000, p1);
    timeVolume = c2 * Math.pow(workVolume, p2);

    var stageWork = [0,0,0,0,0];
    var stageTime = [0,0,0,0,0];

//  Формируем первую таблицу
    workVolumeSum = 0;
    timeVolumeSum = 0;
    $.each(stageWork, function(index, val) {
        stageWork[index] = Math.round(cfStageWork[index] * workVolume / 100);
        stageTime[index] = Math.round(cfStageTime[index] * timeVolume / 100);
        $('#js-out-stagework'+ index).text(stageWork[index]);
        $('#js-out-stagetime'+ index).text(stageTime[index]);
        workVolumeSum = workVolumeSum + stageWork[index];
        timeVolumeSum = timeVolumeSum + stageTime[index];
    });

//  Формируем вторую таблицу
    var stageWorkCode = [0,0,0,0,0,0,0,0];
    $.each(stageWorkCode, function(index, val) {
        stageWorkCode[index] = Math.round(cfStageWorkCode[index] * workVolume / 100);
        $('#js-out-stageworkcode'+ index).text(stageWorkCode[index]);
    });

//  Занос данных в таблицу
    $('#js-out-work').text(Math.round(workVolumeSum));
    $('#js-out-time').text(Math.round(timeVolumeSum));
    $('#js-out-worktable').text(Math.round(workVolumeSum));
    $('#js-out-timetable').text(Math.round(timeVolumeSum));
    $('#js-out-workcodetable').text(Math.round(workVolume));
    $('#js-out-eaf').text(precise_round(eaf, 2));


// // Редактирование bar charts
//     $("#bars li .bar").each( function( key, bar ) {
//         var percentage = Math.round(parseFloat($('#js-out-stagework'+key).text()) / parseFloat($('#js-out-stagetime'+key).text()));
//         // $(this).data('percentage', percentage);
//         $(this).id = "doit";

//         $(this).animate({
//             'height' : percentage + '%'
//         }, 1000);
//         $(this).id = "doit";
//         $(this).data('percentage', percentage);
//     });

}








// Кнопка прибавления
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
    drawCharts();   
}







//  Кнопка убавления
function pe_decrement() {

    var typeSystem = ["Обычный", "Промежуточный", "Встроенный"];
    var myOptions = ["Очень низкий", "Низкий", "Номинальный", "Высокий", "Очень высокий"];

    obj = $(this).parent().prev('input');
    current = obj.data('current');
    max = obj.data('max');
    min = obj.data('min')

    current = parseFloat(current);
    max = parseFloat(max);
    if (min == undefined) {min = 0} else {min = parseFloat(min)}

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

    if (current-1 > min & obj.data('type') != 'kdsi') {
//      Проверка: Кнопка принадлежит выбору типа системы или опций системы
        if (obj.data('type') == 'type-system') {
            obj.val(typeSystem[current-1].toString());
        }
        else {
            obj.val(myOptions[current-1].toString())
        }

        obj.data('current', current-1);
//        Отдельный else для отключения функционирования кнопки
    } else if (current-1 == min) {
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
    drawCharts();    
}





// // Animated bar chart
// $(function() {
//   $("#bars li .bar").each( function( key, bar ) {
//     var percentage = Math.round(parseFloat($('#js-out-stagework'+key).text()) / parseFloat($('#js-out-stagetime'+key).text()));
    
//     $(this).animate({
//       'height' : percentage + '%'
//     }, 1000);
//   });
// });


$(function() {

    $('.js-increment').click(pe_increment);
    $('.js-decrement').click(pe_decrement);

    $('.js-widget-input').change(function() {
        recalculate_widget();
        drawCharts();
    });
});








//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////









google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
  
  // BEGIN BAR CHART

    var arr = new Array();
    arr[0] = new Array();
    arr[0][0] = 'Месяца';
    arr[0][1] = 'Работники';
    month = 0;
    for (var stage = 0; stage < 5; stage++){
        curStageTime = parseFloat($('#js-out-stagetime'+ stage).text());
        curStageWork = parseFloat($('#js-out-stagework'+ stage).text());
        for (var i = 0; i < curStageTime; i++) {
            month++;
            arr[month] = new Array();
            arr[month][0] = month.toString()+' мес.';
            arr[month][1] = Math.round(curStageWork/curStageTime);            
            }
    }
  
  // create zero data so the bars will 'grow'
var barZeroData = new google.visualization.DataTable();
    barZeroData.addColumn('string', 'Month');
    barZeroData.addColumn('number', 'Workers');
    for (var i = 1; i <= month; i++){
        barZeroData.addRows([[arr[i][0], 0]]);
    }
  // actual bar chart data
  var barData = new google.visualization.DataTable();
    barData.addColumn('string', 'Месяц');
    barData.addColumn('number', 'Работников');
    barData.addColumn({type: 'number', role: 'annotation'});
    // for (var i = 1; i <= month; i++){
    //     barData.addRows([[arr[i][0], arr[i][1], arr[i][1]]]);
    // }
    month = 0;
    maxWorkers = 1;
    for (var stage = 0; stage < 5; stage++){
        curStageTime = parseFloat($('#js-out-stagetime'+ stage).text());
        for (var i = 0; i < curStageTime; i++) {
            month++;
            if (i==Math.round(curStageTime/2)) {
                barData.addRows([[arr[month][0], arr[month][1], arr[month][1]]]);
            } 
            else{
                barData.addRows([[arr[month][0], arr[month][1], null]]);
            };  
            if (stage == 3) {maxWorkers = arr[month][1]};
            }
    }
 
 maxWorkers = Math.round(maxWorkers*1.15);

  // set bar chart options
  var barOptions = {
    annotations: {
      alwaysOutside: true,
      textStyle: {
        fontSize: 16,
        color: '#555',
        bold: true,
        auraColor: 'none'
      }
    },
    focusTarget: 'category',
    backgroundColor: 'transparent',
    colors: ['cornflowerblue', 'tomato'],
    fontName: 'Open Sans',
    chartArea: {
      left: 50,
      top: 10,
      width: '100%',
      height: '70%'
    },
    bar: {
      groupWidth: '80%'
    },
    hAxis: {
        // title: 'Месяца',
      textStyle: {        
        fontSize: 11
      }
    },
    vAxis: {
        title: 'Работники',
      minValue: 0,
      maxValue: maxWorkers,
      baselineColor: '#DDD',
      gridlines: {
        color: '#DDD',
        count: 10
      },
      textStyle: {
        fontSize: 11
      }
    },
    legend: {
      position: 'none',
      // textStyle: {
      //   fontSize: 12
      // }
    },
    animation: {
      duration: 1000,
      easing: 'out'
    }
  };
  // draw bar chart twice so it animates
  var barChart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
  barChart.draw(barZeroData, barOptions);
  barChart.draw(barData, barOptions);
}