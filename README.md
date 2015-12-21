# prueba-git
Pruebas de Git Hub

Una ves que se instala git se debe configurar:

- git config --global user.name "lquintero019"
- git config --global user.email "lquintero019@gmail.com"

Generar tu Public Key:

- ssh-keygen

Leyendo tu llave para copiarlo a GitHub:

- cat ~/.ssh/id_rsa.pub

Arrancando tu proyecto:

- git init
- touch README
- git add README
- git commit -m "Primer commit"
- git push origin master