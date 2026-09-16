# Diccionario de datos

## Encuestas

## `c_survey`

Almacena las encuestas en cursos

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Identificador |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| survey\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Antiguo identificador de la tabla |
| code | VARCHAR\(20\) |  |  |  |  |  |  |  | NULL | Código de la encuesta |
| title | LONGTEXT |  |  |  |  |  |  |  | NULL | Título de la encuesta |
| subtitle | LONGTEXT |  |  |  |  |  |  |  | NULL | Subtítulo de la encuesta |
| author | VARCHAR\(20\) |  |  |  |  |  |  |  | NULL | Identificador del usuario creador de la encuesta |
| lang | VARCHAR\(20\) |  |  |  |  |  |  |  | NULL | Idioma de la encuesta |
| avail\_from | DATE |  |  |  |  |  |  |  | NULL | Fecha de inicio de disponibilidad |
| avail\_till | DATE |  |  |  |  |  |  |  | NULL | Fecha de fin de disponibilidad |
| is\_shared | VARCHAR\(1\) |  |  |  |  |  |  |  | NULL | \(Obsoleto\) |
| template | VARCHAR\(20\) |  |  |  |  |  |  |  | NULL | \(Obsoleto, pero requiere template como valor\) |
| intro | LONGTEXT |  |  |  |  |  |  |  | NULL | Texto de instroducción |
| surveythanks | LONGTEXT |  |  |  |  |  |  |  | NULL | Texto de agradecimiento |
| creation\_date | DATETIME |  | ✔ |  |  |  |  |  |  | Fecha de creación |
| invited | INT\(11\) |  | ✔ |  |  |  |  |  |  | Número de invitados a la encuesta |
| answered | INT\(11\) |  | ✔ |  |  |  |  |  |  | Número de usuarios que respondieron la encuesta |
| invite\_mail | LONGTEXT |  | ✔ |  |  |  |  |  |  | Texto del correo electrónico de invitación |
| reminder\_mail | LONGTEXT |  | ✔ |  |  |  |  |  |  |  |
| mail\_subject | VARCHAR\(255\) |  | ✔ |  |  |  |  |  |  | Asunto del correo electrónico de invitación |
| anonymous | VARCHAR\(10\) |  | ✔ |  |  |  |  |  |  | Indica si la encuesta puede ser respondidad anónimamente |
| access\_condition | LONGTEXT |  |  |  |  |  |  |  | NULL |  |
| shuffle | TINYINT\(1\) |  | ✔ |  |  |  |  |  |  | Indica si las preguntas se muestran aleatoriamente |
| one\_question\_per\_page | TINYINT\(1\) |  | ✔ |  |  |  |  |  |  | Opción de mostrar una pregunta por página |
| survey\_version | VARCHAR\(255\) |  | ✔ |  |  |  |  |  |  | Versión de la encuesta |
| parent\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la encuesta madre |
| survey\_type | INT\(11\) |  | ✔ |  |  |  |  |  |  | Tipo de encuesta |
| show\_form\_profile | INT\(11\) |  | ✔ |  |  |  |  |  |  |  |
| form\_fields | LONGTEXT |  | ✔ |  |  |  |  |  |  |  |
| session\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la sesión |
| visible\_results | INT\(11\) |  |  |  |  |  |  |  | NULL | Visibilidad de los resultados |

## `c_survey_question`

Almacena las preguntas de las encuestas

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Identificador de la pregunta |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| question\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Antiguo identificador de la pregunta |
| survey\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la encuesta |
| survey\_question | LONGTEXT |  | ✔ |  |  |  |  |  |  | Texto de la pregunta |
| survey\_question\_comment | LONGTEXT |  | ✔ |  |  |  |  |  |  | Comentario sobre la pregunta |
| type | VARCHAR\(250\) |  | ✔ |  |  |  |  |  |  | Tipo de pregunta |
| display | VARCHAR\(10\) |  | ✔ |  |  |  |  |  |  | Presentación de la pregunta |
| sort | INT\(11\) |  | ✔ |  |  |  |  |  |  | Número de orden de la pregunta |
| shared\_question\_id | INT\(11\) |  |  |  |  |  |  |  | NULL | Identificador de pregunta compartida |
| max\_value | INT\(11\) |  |  |  |  |  |  |  | NULL | Valor máximo \(según el tipo de pregunta\) |
| survey\_group\_pri | INT\(11\) |  | ✔ |  |  |  |  |  |  |  |
| survey\_group\_sec1 | INT\(11\) |  | ✔ |  |  |  |  |  |  |  |
| survey\_group\_sec2 | INT\(11\) |  | ✔ |  |  |  |  |  |  |  |

## `c_survey_question_option`

Almacena las opciones de cada pregunta de la encuesta

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Identificador de la opción de pregunta |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| question\_option\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Antiguo identificador de la opción de pregunta |
| question\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la pregunta |
| survey\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la encuesta |
| option\_text | LONGTEXT |  | ✔ |  |  |  |  |  |  | Texto de la opción |
| sort | INT\(11\) |  | ✔ |  |  |  |  |  |  | Número de orden de la opción |
| value | INT\(11\) |  | ✔ |  |  |  |  |  |  | Valor de la opción |

## `c_survey_group`

\(No usado actualmente\)

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Identificador del grupo |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| id | INT\(11\) |  |  |  |  |  |  |  | NULL | Antiguo identificador del grupo |
| name | VARCHAR\(20\) |  | ✔ |  |  |  |  |  |  | Nombre del grupo |
| description | VARCHAR\(255\) |  | ✔ |  |  |  |  |  |  | Descripción del grupo |
| survey\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la encuesta |

## `c_survey_invitation`

Almacena las invitaciones de cada usuario para llenar la encuesta

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Identificador de la invitación |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| survey\_invitation\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Antiguo identificador de la invitación |
| survey\_code | VARCHAR\(20\) |  | ✔ |  |  |  |  |  |  | Código de la encuesta |
| user | VARCHAR\(250\) |  | ✔ |  |  |  |  |  |  | Identificador del usuario invitado |
| invitation\_code | VARCHAR\(250\) |  | ✔ |  |  |  |  |  |  | Código de la invitación |
| invitation\_date | DATETIME |  | ✔ |  |  |  |  |  |  | Fecha de la invitación |
| reminder\_date | DATETIME |  | ✔ |  |  |  |  |  |  | Fecha del recordatorio de la invitación |
| answered | INT\(11\) |  | ✔ |  |  |  |  |  |  | Indica si la invitación fue respondida |
| session\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la sesión |
| group\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del grupo |

## `c_survey_answer`

Almancena las respuestas a cada pregunta la encuesta por los usuarios

| Column name | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment |
| :--- | :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :--- | :--- |
| iid | INT\(11\) | ✔ | ✔ |  |  |  |  | ✔ |  | Ideitificador de la respuesta |
| c\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador del curso |
| answer\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Antiguo identificador de la respuesta |
| survey\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la encuesta |
| question\_id | INT\(11\) |  | ✔ |  |  |  |  |  |  | Identificador de la pregunta |
| option\_id | LONGTEXT |  | ✔ |  |  |  |  |  |  | Identificador de la opción |
| value | INT\(11\) |  | ✔ |  |  |  |  |  |  | Valor de la respuesta |
| user | VARCHAR\(250\) |  | ✔ |  |  |  |  |  |  | Usuario que hizo la repuesta |

