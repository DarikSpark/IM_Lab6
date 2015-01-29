<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cocomo calculation</title>
    <link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<br /><div class="container"><div class="row">
        <div class="col-md-8 col-md-offset-2">



            <div class="row">
                <div class="pe-blog-post">
                    <div class="form-group col-sm-6">
                        <label for="js-input-revenue" class="control-label small text-muted">Тип системы:</label>
                        <div class="input-group prefix suffix">
<!--                            <span class="prefix">$</span>-->
<!--                            <span class="suffix">M</span>-->
                            <input type="text" tabindex="1" id="js-input-type" name="js-input-type" class="form-control mrs mbs js-widget-input" data-current="0" data-max="2" pattern="\d*" data-target="#js-in-type" value="Обычный">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default js-decrement" tabindex="-1">–</button>
                                <button type="button" class="btn btn-default js-increment" tabindex="-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="js-input-ebitda-delta" class="control-label small text-muted">EBITDA improvement:</label>
                        <div class="input-group suffix">
                            <span class="suffix">%</span>
                            <input type="number" tabindex="4" id="js-input-ebitda-delta" name="js-input-ebitda-delta" class="form-control mrs mbs js-widget-input" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$" data-target="#js-in-ebitda-delta" value="10">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default js-decrement" data-step="2" data-dp="0" tabindex="-1">–</button>
                                <button type="button" class="btn btn-default js-increment" data-step="2" data-dp="0" tabindex="-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="js-input-margin" class="control-label small text-muted">Current EBITDA margin:</label>
                        <div class="input-group suffix">
                            <span class="suffix">%</span>
                            <input type="number" tabindex="2" id="js-input-margin" name="js-input-margin" class="form-control mrs mbs js-widget-input" pattern="^(?=.)([+-]?([0-9]*))$" data-target="#js-in-margin" value="25">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default js-decrement" data-step="5" data-dp="0" tabindex="-1">–</button>
                                <button type="button" class="btn btn-default js-increment" data-step="5" data-dp="0" tabindex="-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="js-input-multiple-delta" class="control-label small text-muted">Multiple improvement:</label>
                        <div class="input-group suffix">
                            <span class="suffix">x</span>
                            <input type="number" tabindex="5" id="js-input-multiple-delta" name="js-input-multiple-delta" class="form-control mrs mbs js-widget-input" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$" data-target="#js-in-multiple-delta" value="0.6">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default js-decrement" data-step=".1" data-dp="1" tabindex="-1">–</button>
                                <button type="button" class="btn btn-default js-increment" data-step=".1" data-dp="1" tabindex="-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="js-input-mutiple-pre" class="control-label small text-muted">Current EBITDA multiple:</label>
                        <div class="input-group suffix">
                            <span class="suffix">x</span>
                            <input type="number" tabindex="3" id="js-input-multiple-pre" name="js-input-multiple-pre" class="form-control mrs mbs js-widget-input" pattern="^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$" data-target="#js-in-multiple-pre" value="8.0">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default js-decrement" data-step=".2" data-dp="1" tabindex="-1">–</button>
                                <button type="button" class="btn btn-default js-increment" data-step=".2" data-dp="1" tabindex="-1">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <input type="submit" tabindex="6" onClick="recalculate_widget()" class="form-control mts btn btn-primary btn-block" value="Calculate" id="calculate-btn">
                    </div>
                </div>

                <br><br>&nbsp;<br>

                <table class="table mtl mbl pts pe-blog-post"> <!-- 9 x 4 table -->
                    <tr>
                        <th></th>
                        <th>Pre</th>
                        <th><strong>Gain</strong></th>
                        <th>Post</th>
                    </tr>
                    <tr>
                        <td>Revenue</td>
                        <td><var id="js-in-type">Обычный</var></td>
                        <td class="text-success">▲ $<var id="js-out-revenue-delta">20</var>M</td>
                        <td>$<var id="js-out-revenue-post">220</var>M</td>
                    </tr>
                    <tr>
                        <td>Margin</td>
                        <td><var id="js-in-margin">25</var>%</td>
                        <td class="subtle">&nbsp;</td>
                        <td><var id="js-in-margin2">25</var>%</td>
                    </tr>
                    <tr>
                        <td>EBITDA</td>
                        <td>$<var id="js-out-ebitda-pre">50</var>M</td>
                        <td class="text-success">▲ <var id="js-in-ebitda-delta">10</var>%</td>
                        <td>$<var id="js-out-ebitda-post">55</var>M</td>
                    </tr>
                    <tr>
                        <td>Multiple</td>
                        <td><var id="js-in-multiple-pre">8.0</var></td>
                        <td class="text-success">▲ <var id="js-in-multiple-delta">0.6</var></td>
                        <td><var id="js-out-multiple-post">8.6</var></td>
                    </tr>
                    <tr>
                        <td><strong>Market Value</strong></td>
                        <td><strong>$<var id="js-out-mv-pre">400</var>M</strong></td>
                        <td class="text-success"><strong>▲ $<var id="js-out-mv-delta">73</var>M</strong></td>
                        <td><strong>$<var id="js-out-mv-post">473</var>M</strong></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px !important">of which</td>
                        <td class="subtle">&nbsp;</td>
                        <td class="subtle">&nbsp;</td>
                        <td class="subtle">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px !important">from EBITDA</td>
                        <td class="subtle">&nbsp;</td>
                        <td class="text-success">▲ $<var id="js-out-delta-ebitda">40</var>M</td>
                        <td class="subtle">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 15px !important">from Multiple</td>
                        <td class="subtle">&nbsp;</td>
                        <td class="text-success">▲ $<var id="js-out-delta-multiple">33</var>M</td>
                        <td class="subtle">&nbsp;</td>
                    </tr>
                </table>

            </div></div></div>


<!--    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="cocomo.js"></script>


</body>
</html>