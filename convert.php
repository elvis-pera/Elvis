<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = floatval($_POST["amount"]);
    $from = $_POST["from"];
    $to = $_POST["to"];

    // Kurset (1 njësi e monedhës në raport me LEKË)
    $rates = [
        "EUR" => 100.00, // 1 Euro = 100 Lekë
        "USD" => 95.00,  // 1 Dollar = 95 Lekë
        "GBP" => 115.00, // 1 Paund = 115 Lekë
        "CHF" => 105.00, // 1 Frang Zviceran = 105 Lekë
        "ALL" => 1.00    // Lekë = bazë
    ];

    // Kontrollo nëse monedhat janë të vlefshme
    if (!isset($rates[$from]) || !isset($rates[$to])) {
        echo "<p>Monedhë e pavlefshme.</p>";
        echo '<p><a href="index.html">Kthehu mbrapa</a></p>';
        exit;
    }

    // Konvertimi bëhet duke kaluar përmes Lekëve
    $inLek = $amount * $rates[$from]; // nga monedha burimore në Lekë
    $result = $inLek / $rates[$to];   // nga Lekë në monedhën e destinuar

    // Formatim rezultati
    $formattedResult = number_format($result, 2);
    $formattedAmount = number_format($amount, 2);

    echo "<h2>Rezultati i Konvertimit</h2>";
    echo "<p>$formattedAmount $from = $formattedResult $to</p>";
    echo '<p><a href="index.html">Kthehu mbrapa</a></p>';
} else {
    echo "<p>Ky faqe pranon vetëm POST requests.</p>";
}
?>
