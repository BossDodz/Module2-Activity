<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/P1.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <title>KConverter</title>
</head>

<body>
    <header id="main-header">
        <div class="headings">
            <h1 class="bg-header"><span class="bg-header-text">K</span>Converter</h1>
            <h3 class="sm-header">A simple online converter tool</h3>
        </div>
    </header>
    <main class="main-content">
        <div class="converter">
            <div class="converter-container">
                <h3>Please enter the values to be converted</h3>
                <div class="form-container">
                    <form action="P1.php" method="post">
                        <div class="input input-val1">
                            <label for="val1">From:</label>
                            <input type="text" name="value" class="value val" required autocomplete="off">
                            <select name="unit1" id="unit1" class="units">
                                <option value="mm">Millimeter(s)[mm]</option>
                                <option value="cm">Centimeter(s)[cm]</option>
                                <option value="dm">Decimeter(s)[dm]</option>
                                <option value="m">Meter(s)[m]</option>
                                <option value="dam">Dekameter(s)[dam]</option>
                                <option value="hm">Hectometer(s)[hm]</option>
                                <option value="km">Kilometer(s)[km]</option>
                            </select>
                        </div>

                        <div class="input input-val2">
                            <label for="val2">To:</label>
                            <select name="unit2" id="unit2" class="units">
                                <option value="mm">Millimeter(s)[mm]</option>
                                <option value="cm">Centimeter(s)[cm]</option>
                                <option value="dm">Decimeter(s)[dm]</option>
                                <option value="m">Meter(s)[m]</option>
                                <option value="dam">Dekameter(s)[dam]</option>
                                <option value="hm">Hectometer(s)[hm]</option>
                                <option value="km">Kilometer(s)[km]</option>
                            </select>
                        </div>

                        <div class="form-buttons">
                            <button type="submit" class="button btn-submit"><i class="fas fa-arrows-alt-h"></i> Convert</button>
                            <input type="reset" class="button btn-clear" value="Clear"></input>
                        </div>
                    </form>
                </div>

                <!--PHP-->
                <?php
                if (!empty($_POST)) {
                    $val = $_POST['value'];
                    $from_conv = $_POST['unit1'];
                    $to_conv = $_POST['unit2'];

                    // Associative Array
                    $unit_list = array(
                        0 => 'mm',
                        1 => 'cm',
                        2 => 'dm',
                        3 => 'm',
                        4 => 'dam',
                        5 => 'hm',
                        6 => 'km'
                    );

                    $key_unit1 = array_search($from_conv, $unit_list);
                    $key_unit2 = array_search($to_conv, $unit_list);
                    //$key_diff = abs($key_unit1 - $key_unit2);

                    function isFromBiggerThanTo($unit1, $unit2)
                    {
                        if ($unit1 > $unit2) {
                            return 1;
                        } else if ($unit1 < $unit2) {
                            return 0;
                        } else {
                            return -1;
                        }
                    }

                    function compute($input, $from_unit, $to_unit)
                    {
                        if (isFromBiggerThanTo($from_unit, $to_unit) == 1) {
                            return $input * pow(10, abs($from_unit - $to_unit));
                        } else if (isFromBiggerThanTo($from_unit, $to_unit) == 0) {
                            return $input / pow(10, abs($from_unit - $to_unit));
                        } else {
                            return $input;
                        }
                    }

                    $res = compute($val, $key_unit1, $key_unit2);




                ?>

                    <div class="result">
                        <h2><span class="num-and-unit"><?php echo "$val $from_conv" ?></span>
                            is equal to
                            <span class="num-and-unit"><?php echo rtrim(rtrim(sprintf("%.8F", $res), '0'), '.') . " $to_conv" ?></span>
                        </h2>
                    </div>



                <?php } ?>



            </div>
        </div>
        <div class="conversion-table">
            <div class="conversion-table-container">
                <h1 class="cnv-bg-header"><span class="cnv-bg-text">Conversion</span> Table</h1>
                <table class="table metric">
                    <tr>
                        <td colspan="3" class="header">Metric System</td>
                    </tr>
                    <tr>
                        <td>1 centimeter (cm)</td>
                        <td class='op'>=</td>
                        <td>10 millimeters (mm)</td>
                    </tr>
                    <tr>
                        <td>1 decimeter (dm)</td>
                        <td class='op'>=</td>
                        <td>10 centimeters (cm)</td>
                    </tr>
                    <tr>
                        <td>1 meter (m)</td>
                        <td class='op'>=</td>
                        <td>10 decimeters (dm)</td>
                    </tr>
                    <tr>
                        <td>1 decameter (dam)</td>
                        <td class='op'>=</td>
                        <td>10 meters (m)</td>
                    </tr>
                    <tr>
                        <td>1 hectometer (hm)</td>
                        <td class='op'>=</td>
                        <td>10 decameters (dam)</td>
                    </tr>
                    <tr>
                        <td>1 kilometer (km)</td>
                        <td class='op'>=</td>
                        <td>10 hectometers (hm)</td>
                    </tr>
                </table>

                <table class="table imperial">
                    <tr>
                        <td colspan="3" class="header">Imperial System</td>
                    </tr>
                    <tr>
                        <td>1 foot (ft)</td>
                        <td class='op'>=</td>
                        <td>12 inches (in)</td>
                    </tr>
                    <tr>
                        <td>1 yard (yd)</td>
                        <td class='op'>=</td>
                        <td>3 feet (ft)</td>
                    </tr>
                    <tr>
                        <td>1 chain (ch)</td>
                        <td class='op'>=</td>
                        <td>22 yards (yd)</td>
                    </tr>
                    <tr>
                        <td>1 furlong (fur)</td>
                        <td class='op'>=</td>
                        <td>10 chains (ch)</td>
                    </tr>
                    <tr>
                        <td>1 mile (mi)</td>
                        <td class='op'>=</td>
                        <td>8 furlongs (fur)</td>
                    </tr>
                </table>

                <table class="table metric-imperial">
                    <tr>
                        <td colspan="3" class="header">Metric <i class="fas fa-arrows-alt-h"></i> Imperial System</td>
                    </tr>
                    <tr>
                        <td>1 millimeter (mm)</td>
                        <td class='op'>=</td>
                        <td>0.03937 inches (in)</td>
                    </tr>
                    <tr>
                        <td>1 centimeter (dm)</td>
                        <td class='op'>=</td>
                        <td>0.03970 inches (in)</td>
                    </tr>
                    <tr>
                        <td>1 meter (m)</td>
                        <td class='op'>=</td>
                        <td>39.37008 inches (in)</td>
                    </tr>
                    <tr>
                        <td>1 meter (m)</td>
                        <td class='op'>=</td>
                        <td>3.28084 feet (ft)</td>
                    </tr>
                    <tr>
                        <td>1 meter (m)</td>
                        <td class='op'>=</td>
                        <td>1.09361 yards (yd)</td>
                    </tr>
                    <tr>
                        <td>1 kilometer (km)</td>
                        <td class='op'>=</td>
                        <td>1093.6133 yards (yd)</td>
                    </tr>
                    <tr>
                        <td>1 kilometer (km)</td>
                        <td class='op'>=</td>
                        <td>0.62137 miles (mi)</td>
                    </tr>
                </table>

                <table class="table metric-imperial">
                    <tr>
                        <td colspan="3" class="header">Imperial <i class="fas fa-arrows-alt-h"></i> Metric System</td>
                    </tr>
                    <tr>
                        <td>1 inch (in)</td>
                        <td class='op'>=</td>
                        <td>2.54 centimeters (cm)</td>
                    </tr>
                    <tr>
                        <td>1 foot (ft)</td>
                        <td class='op'>=</td>
                        <td>30.48 centimeters (cm)</td>
                    </tr>
                    <tr>
                        <td>1 yard (yd)</td>
                        <td class='op'>=</td>
                        <td>91.44 centimeters (cm)</td>
                    </tr>
                    <tr>
                        <td>1 yard (yd)</td>
                        <td class='op'>=</td>
                        <td>0.9144 meters (m)</td>
                    </tr>
                    <tr>
                        <td>1 mile (mi)</td>
                        <td class='op'>=</td>
                        <td>1609.344 meters (m)</td>
                    </tr>
                    <tr>
                        <td>1 mile (mi)</td>
                        <td class='op'>=</td>
                        <td>1.609344 kilometers (km)</td>
                    </tr>
                </table>

            </div>

        </div>
    </main>
    <footer id="main-footer">
        <div class="footer-notes">
            <h2>
                <i>&copy; 2021, Charles King. All rights reserved</i>
            </h2>
        </div>
        <div class="footer-navs">
            <ul class="nav-links">
                <li class="nav-items"><a href="#" class="fab fa-facebook fa-2x"></a></li>
                <li class="nav-items"><a href="#" class="fab fa-twitter fa-2x"></a></li>
                <li class="nav-items"><a href="#" class="fab fa-github fa-2x"></a></li>
            </ul>
        </div>
    </footer>
</body>

</html>