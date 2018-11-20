<h1>Rellena tus datos para comenzar la partida</h1>

<form name="comenzar" action="<?php $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="queryString" placeholder="Indique su nombre" />
    <input type="hidden" name="controller" value="Partida" />
    <input type="hidden" name="action" value="crear" />
    <button type="submit" name="btnComenzar" value="Submit">Comenzar Partida</button>
</form>