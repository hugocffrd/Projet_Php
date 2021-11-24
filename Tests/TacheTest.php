<html>
    <body>
        <h1>Test création tâche</h1>
        <?php

            class TacheTest
            {


                public function testCreation ()
                {
                    $tacheTest = new Tache(003, "Nourrir les hugo", "Il faut les nourrir pour les manger après", 10 / 12 / 2021);
                    $tacheTest->show();
                }


            }



        ?>
    </body>
</html>

x   x