<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = floatval($_POST["amount"]);
    $direction = $_POST["direction"];

    $kursi = 100; // Shembull: 1 Euro = 100 Lek (ndrysho sipas kursit real)

    if ($direction === "euro_to_lek") {
        $result = $amount * $kursi;
        echo "<p>$amount Euro = $result Lek</p>";
    } elseif ($direction === "lek_to_euro") {
        $result = $amount / $kursi;
        echo "<p>$amount Lek = $result Euro</p>";
    } else {
        echo "<p>Drejtim i pavlefshëm.</p>";
    }

    echo '<p><a href="index.html">Kthehu mbrapa</a></p>';
} else {
    echo "<p>Ky faqe pranon vetëm POST requests.</p>";
}
?>
