<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 7</title>
</head>
<body>
    <?php
    $cities = array(
        array("City", "Country", "Continent"),
        array("Tokyo", "Japan", "Asia"),
        array("Mexico City", "Mexico", "North America"),
        array("New York City", "USA", "North America"),
        array("Mumbai", "India", "Asia"),
        array("Seoul", "Korea", "Asia"),
        array("Shanghai", "China", "Asia"),
        array("Lagos", "Nigeria", "Africa"),
        array("Buenos Aires", "Argentina", "South America"),
        array("Cairo", "Egypt", "Africa"),
        array("London", "UK", "Europe")
    );
    
    echo "<table>";
    foreach ($cities as $city) {
        echo "<tr>";
        echo "<td>";
        echo $city[0] . "<br>";
        echo "</td>";
        echo "<td>";
        echo $city[1] . "<br>";
        echo "</td>";
        echo "<td>";
        echo $city[2] . "<br>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>