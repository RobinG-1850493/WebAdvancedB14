<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welkom</title>
    <link rel="stylesheet" href="EventsStyle.css"/>

</head>
<body>


<div class="container">
    <header>
        <a href="index.php"><h1>Monkey Business</span></h1></a>
    </header>

    <form method="get" action="../../app.php">
    <input type="submit" style="width: 100%" value="Alles">
    </form>

    <form method="get" action="../../app.php">
        <label for="idFilter">Id van event: </label>
        <input type="text" name="id" id="idFilter" size="30" /> <br>
        <input type="submit" value="Zoek">
    </form>

    <form method="get" action="../../app.php">
        <label for="k_idFilter">Id van klant: </label>
        <input type="text" name="k_id" id="k_idFilter" size="30" /> <br>
        <label for="k_idFilter">Locatie: </label>
        <input type="text" name="locatie" id="locatieFilter" size="30" /> <br>
        <input type="submit" value="Zoek">
    </form>


    <form method="post" action="../../app.php">
        <h1 style="font-size: 200%; color: darkkhaki">Voeg nieuw event toe</h1>
        <label for="naam">Naam van event</label>
        <input type="text" name="naam" id="naam" size="30" /> <br>
        <label for="k_id">Id van klant</label>
        <input type="text" name="k_id" id="k_id" size="30" /> <br>
        <label for="name">Datum</label><br>
        <label>van</label>
        <input type="date" name="b_datum" id="b_datum" size="30" /> <br>
        <label>tot</label>
        <input type="date" name="e_datum" id="e_datum" size="30" /> <br>
        <label for="name">Locatie</label>
        <input type="text" name="locatie" id="locatie" size="30" /> <br>
        <input type="submit" value="Toevoegen">
    </form>

</div>
</body>
</html>