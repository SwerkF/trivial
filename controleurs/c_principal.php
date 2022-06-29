<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'accueil' : {  include "c_page.php" ; break ;
    };
    
    case 'auth' : { include "c_auth.php" ; break ;
    };

    case 'gestion' : { include "c_gestion.php" ; break ;
    };

    case 'partie' : { include "c_partie.php" ; break ;
    };
    
    case 'test' : { include "c_test.php" ; break ;
    };
}

?>


