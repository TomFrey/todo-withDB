todo project

with login
http://localhost:8888/ProjekteWebProf/Developer/php/todo
z.B. Joe, 12345
     Karoline, 12345


and a php api (funktioniert nur, wenn ein Benutzer eingeloggt ist)

Liefert alle Tasks:
http://localhost:8888/ProjekteWebProf/Developer/php/todo/api/tasklist.php

Liefert einen bestimmten Task:
http://localhost:8888/ProjekteWebProf/Developer/php/todo/api/tasklist.php?task=5

Löscht einen bestimmten Task:
http://localhost:8888/ProjekteWebProf/Developer/php/todo/api/deletetask.php?task=5

Advanced Rest Client verwenden. Login ist noch ein Problem.