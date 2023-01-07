# PlusTask
Administrador de Proyectos en Ajax, PHP, MySQL y JavaScript


Este proyecto es un administrador de proyectos que utiliza Ajax, PHP, MySQL y JavaScript. Se encarga de permitir a un usuario iniciar sesión, registrarse y recuperar una contraseña olvidada de manera segura mediante el uso de técnicas de hasheo de contraseña y tokens únicos. Para enviar correos electrónicos, se utiliza el servicio MailTrap.

https://user-images.githubusercontent.com/81719352/211157456-2ca95776-3631-4fb3-92a0-0ff52afb9a75.mp4

![image](https://user-images.githubusercontent.com/81719352/211157481-9079eeda-dae2-4dfc-a91c-70fefa612585.png)

   <hr>
   
Una vez iniciada la sesión, el usuario puede ver su lista de proyectos y, si no tiene ninguno, puede crear uno a través de la sección "crear proyecto". Dentro de cada proyecto, el usuario puede agregar, modificar y eliminar tareas y marcarlas como pendientes o completadas. Además, puede filtrar las tareas por estado mediante un buscador. Si el usuario desea, también puede eliminar el proyecto completo.

![image](https://user-images.githubusercontent.com/81719352/211157511-0534f928-0930-4507-9b5c-c22a9383b41d.png)
![image](https://user-images.githubusercontent.com/81719352/211157720-59eb2a21-917c-4fc7-b66b-ad8a12dea895.png)



El proyecto también cuenta con una sección de perfil, donde el usuario puede cambiar su nombre de usuario, correo electrónico y contraseña. Para evitar fraudes, estas acciones están protegidas por medidas de seguridad que verifican que el usuario no está intentando cambiar la información de otra persona o la contraseña de manera no autorizada.

![image](https://user-images.githubusercontent.com/81719352/211157743-56b505c4-200f-4906-8a87-cc021c729a58.png)
![image](https://user-images.githubusercontent.com/81719352/211157760-97e1d41e-0aa2-423a-8335-a599217bdd48.png)

Este proyecto está diseñado para ser responsive, con un menú de opciones desplegable para navegar entre las diferentes secciones. Además, cuenta con un modo oscuro y claro, que se activa en función de la configuración de modo oscuro del sistema operativo del usuario.





https://user-images.githubusercontent.com/81719352/211158327-22015714-684d-45bf-a8e0-d095c19f585c.mp4

   <hr>

Sobre lo técnico, para desarrollar este proyecto se ha utilizado Ajax para permitir la comunicación asíncrona con el servidor y mejorar la experiencia del usuario al no tener que recargar la página completa cada vez que se realiza una acción. PHP se ha utilizado como lenguaje de programación del lado del servidor, encargándose de procesar las solicitudes del usuario y realizar las operaciones necesarias con la base de datos MySQL. JavaScript se ha utilizado para implementar la lógica del lado del usuario y mejorar la interfaz de usuario.

Además de las funcionalidades mencionadas, se han implementado medidas de seguridad adicionales para proteger la información del usuario y evitar ataques. Esto incluye la validación de datos en el lado del servidor, la utilización de sentencias preparadas en las consultas a la base de datos y la encriptación de la información sensibles, como las contraseñas.

En cuanto al diseño de la interfaz de usuario, se ha procurado crear una experiencia intuitiva y agradable para el usuario. Esto incluye la utilización de elementos visuales atractivos y una disposición lógica de la información. Además, se ha tenido en cuenta la accesibilidad, garantizando que el proyecto sea utilizable para personas con discapacidades visuales o motrices.


Grcias y Saludos!
