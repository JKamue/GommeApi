<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2019-01-06
 * Time: 9:28 PM
 */

?>
<html>
    <head>

    </head>

    <body>
        <table>
            <tr>
                <td>UUID zu Clannamen</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="toName">
                        UUID: <input name="uuid" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Clanname zu UUID</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="toUUID">
                        Name: <input name="name" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Clan Statistiken</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="clanStats">
                        Name: <input name="name" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Clan Mitglieder</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="clanMember">
                        Name: <input name="name" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>Clan "Geschichte"</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="clanHistory">
                        Name: <input name="name" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>CW Liste</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="clanCws">
                        UUID: <input name="uuid" type="text"><br>
                        Anzahl: <input name="amount" type="text"><br>
                        Bendet: <input name="finished" type="text"> true | false<br>
                        Spielmodus: <input name="game" type="text"> Bedwars | die anderen halt keine Ahnung<br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>CW Stats</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="cwStats">
                        CW ID: <input name="uuid" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>CW Spieler</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="cwPlayers">
                        CW ID: <input name="uuid" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>CW Geschehnisse</td>
                <td>
                    <form target="_blank" action="api.php" method="get">
                        <input type="hidden" name="function" value="cwActions">
                        CW ID: <input name="uuid" type="text"><br>
                        <input type="submit">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
