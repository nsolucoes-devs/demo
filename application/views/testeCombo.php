<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <title>multicombobox Demo</title>

        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all" /> 
        <style type="text/css">
            body {
                background:grey;
                font-size:62.5%;
                font-family:"Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
            }
            div#container, div#clearingSelections {
                width:50%;
                margin:20px auto;
                padding:30px;
                background-color:#FFFFFF;
            }
            div.bordered {
                margin:20px;
                padding:20px;
                border-style:solid;
                border-width:1px;
                border-color:#D3D3D3;
                background-color:#FFFFFF;
            }
        </style>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-multicombobox.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $( "#multiSelection" ).multicombobox();
                $( "button" ).click(function() { $( "#multiSelection" ).multicombobox("clearSelections"); });
            });
        </script>

    </head>
    <body>
        <div id="container">
            <h2>Multi-Combobox</h3>

                <div id="theWidget" class="bordered">
                    <select id="multiSelection" name="Languages" multiple="true">
                        <option value="1">ActionScript</option>
                        <option SELECTED value="2">AppleScript</option>
                        <option SELECTED value="Asp">Asp</option>
                        <option value="BASIC">BASIC</option>
                        <option value="C">C</option>
                        <option value="C++">C++</option>
                        <option value="Clojure">Clojure</option>
                        <option value="COBOL">COBOL</option>
                        <option value="ColdFusion">ColdFusion</option>
                        <option value="Erlang">Erlang</option>
                        <option value="Fortran">Fortran</option>
                        <option value="Groovy">Groovy</option>
                        <option value="Haskell">Haskell</option>
                        <option value="Java">Java</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="Lisp">Lisp</option>
                        <option value="Perl">Perl</option>
                        <option value="PHP">PHP</option>
                        <option value="Python">Python</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Scala">Scala</option>
                        <option value="Scheme">Scheme</option>
                    </select>
                </div>

        </div>
        <div id="clearingSelections">
            <h4>Using "clearSelections" function with Multi-Combobox</h3>
                <div><button type="button">Clear Selections</button></div>
        </div>
    </body>
</html>