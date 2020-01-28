<?php
session_start();
$name = $_SESSION['name'];
function giveup(){
    echo "hello";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="hitori.css" type="text/css" rel="stylesheet" />
    <title>Super Hitori</title>
</head>

<body>

<form id="gameform" method="post" action="hitori-post.php">
    <fieldset>
        <p><?php echo $name ?>'s Super Hitori</p>

        <?php
        // This is just some dummy code to create an example of what
        // the HTML should look like, though not including any contents
        // of the cells other than the numbers.
        $values = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        // Puzzle solution
        // 0 = unshaded
        // 1 = shaded
        $solution = [
            [0, 1, 0, 0, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 1, 0],
            [0, 0, 1, 0, 0, 1, 0, 0],
            [0, 1, 0, 1, 0, 0, 1, 0],
            [1, 0, 0, 0, 0, 1, 0, 1],
            [0, 1, 0, 0, 1, 0, 0, 0],
            [0, 0, 0, 1, 0, 1, 0, 1],
            [1, 0, 0, 0, 0, 0, 0, 0]
        ];
        $html = '<table id="board">';
        $button_counter = 0;
        for($r=0;  $r<count($values);  $r++) {
            $html .= '<tr>';
            $row = $values[$r];

            for($c=0; $c<count($row);  $c++) {
                $html .= '<td>';
                $html .= '<button type=button value="e" id=';
                $html .=  $button_counter;
                //$html .= '>';
                $html .= ' onclick=change(this.id)>';
                $html .= $row[$c];
                $html .= '</button>';
                $html .= '</td>';
                $button_counter += 1;

            }


            $html .= '</tr>';
        }

        $html .= '</table>';
        echo $html;
        ?>
        <p id="correct">Solution is correct!</p>
        <p><input type="button" id="Check" value="Check" onclick=check();></p>
        <p><input type="button" id="giveup" value="Give Up" onclick=give_up();></p>
        <p><input type="submit" name="newgame" value="New Game"></p>

        <p><a href="index.php">Goodbye!</a></p>

    </fieldset>
</form>
<script src = hitori.js>
</script>

</body>
</html>
