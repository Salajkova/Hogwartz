<?php
//celočíselný dělelní intdiv(12,5); -> ty co zbydou vezme čert

try {
    echo intdiv(12,0);
}catch (DivisionByZeroError $e) {
    echo "Chyba: " . $e->getMessage();

} finally {
     //uzavři soubor. Výdy se provede
}

//try může být jen jednou. Catch může být vícekrát