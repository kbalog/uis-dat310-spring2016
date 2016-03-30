<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercise #4: Booking availability</title>
    <link rel="stylesheet" href="exercise4.css"/>
    <script src="exercise4.js"></script>
</head>
<body onload="init()">

<header>
    <div id="logo">
        <h1>MyBooking</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.html">Properties</a></li>
            <li><a href="property.html">Special deals</a></li>
            <li><a href="checkout.html">Checkout</a></li>
        </ul>
    </nav>
</header>

<main>

    <div class="framed">
        <div class="prop_left">
            <img src="images/property_1.png" alt="Property 1" width="200px"/>

            <div class="place">Røros, Sør-Trøndelag</div>
        </div>
        <div class="prop_right">
            <h3>Holiday home Røros</h3>

            <p>The property features views of the sea and is 23 km from Røros.</p>
        </div>
        <div class="prop_booking">
            <form>
                Check-in:
                <?php
                require_once "exercise4.inc.php";
                // initialize selects with today's date
                year_select("year", date("Y"));
                month_select("month", date("m"));
                day_select("day", date("d"));

                ?>
                Nights:
                <?php
                days_select("days");
                ?>
            </form>
        </div>
    </div>

    <div id="availability">
        <h1>Availability</h1>
        <div class="framed" id="avail_details"></div>
    </div>

    <h1>Details</h1>

    <div class="framed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales neque quis nisi facilisis lobortis. Nam
        efficitur eget nisi sit amet bibendum. Vestibulum elementum faucibus quam ut posuere. Vivamus pellentesque
        luctus nunc at bibendum. Mauris viverra ultrices nisi, sit amet imperdiet lectus accumsan eu. Morbi ornare diam
        nulla, nec aliquet nisl accumsan dictum. Mauris sit amet tellus in ipsum commodo hendrerit. Nunc at mollis
        magna. Proin felis nibh, venenatis non lobortis quis, ullamcorper nec dolor. Vivamus tempus volutpat fringilla.
        Praesent volutpat sit amet massa nec ultricies. Curabitur sollicitudin pharetra tortor in dictum. In mattis orci
        vel augue vehicula rutrum. Nullam vitae sollicitudin orci.
    </div>

</main>

<footer>
    <div class="contact">
        <span class="strong">Customer service:</span> |
        +47 321 09 87654 |
        <a href="#">contact@noreply.com</a>
    </div>
</footer>

</body>
</html>