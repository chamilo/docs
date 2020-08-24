# Diccionario de datos

## Encuestas

## `c_survey`
Almacena las encuestas en cursos

| Column name           | DataType     |  PK  |  NN  |  UQ  | BIN  |  UN  |  ZF  |  AI  | Default | Comment                                                  |
| --------------------- | ------------ | :--: | :--: | :--: | :--: | :--: | :--: | :--: | ------- | -------------------------------------------------------- |
| iid                   | INT(11)      |  ✔   |  ✔   |      |      |      |      |  ✔   |         | Identificador                                            |
| c_id                  | INT(11)      |      |  ✔   |      |      |      |      |      |         | Identificador del curso                                  |
| survey_id             | INT(11)      |      |  ✔   |      |      |      |      |      |         | Antiguo identificador de la tabla                        |
| code                  | VARCHAR(20)  |      |      |      |      |      |      |      | NULL    | Código de la encuesta                                    |
| title                 | LONGTEXT     |      |      |      |      |      |      |      | NULL    | Título de la encuesta                                    |
| subtitle              | LONGTEXT     |      |      |      |      |      |      |      | NULL    | Subtítulo de la encuesta                                 |
| author                | VARCHAR(20)  |      |      |      |      |      |      |      | NULL    | Identificador del usuario creador de la encuesta         |
| lang                  | VARCHAR(20)  |      |      |      |      |      |      |      | NULL    | Idioma de la encuesta                                    |
| avail_from            | DATE         |      |      |      |      |      |      |      | NULL    | Fecha de inicio de disponibilidad                        |
| avail_till            | DATE         |      |      |      |      |      |      |      | NULL    | Fecha de fin de disponibilidad                           |
| is_shared             | VARCHAR(1)   |      |      |      |      |      |      |      | NULL    | (Obsoleto)                                               |
| template              | VARCHAR(20)  |      |      |      |      |      |      |      | NULL    | (Obsoleto, pero requiere template como valor)            |
| intro                 | LONGTEXT     |      |      |      |      |      |      |      | NULL    | Texto de instroducción                                   |
| surveythanks          | LONGTEXT     |      |      |      |      |      |      |      | NULL    | Texto de agradecimiento                                  |
| creation_date         | DATETIME     |      |  ✔   |      |      |      |      |      |         | Fecha de creación                                        |
| invited               | INT(11)      |      |  ✔   |      |      |      |      |      |         | Número de invitados a la encuesta                        |
| answered              | INT(11)      |      |  ✔   |      |      |      |      |      |         | Número de usuarios que respondieron la encuesta          |
| invite_mail           | LONGTEXT     |      |  ✔   |      |      |      |      |      |         | Texto del correo electrónico de invitación               |
| reminder_mail         | LONGTEXT     |      |  ✔   |      |      |      |      |      |         |                                                          |
| mail_subject          | VARCHAR(255) |      |  ✔   |      |      |      |      |      |         | Asunto del correo electrónico de invitación              |
| anonymous             | VARCHAR(10)  |      |  ✔   |      |      |      |      |      |         | Indica si la encuesta puede ser respondidad anónimamente |
| access_condition      | LONGTEXT     |      |      |      |      |      |      |      | NULL    |                                                          |
| shuffle               | TINYINT(1)   |      |  ✔   |      |      |      |      |      |         | Indica si las preguntas se muestran aleatoriamente       |
| one_question_per_page | TINYINT(1)   |      |  ✔   |      |      |      |      |      |         | Opción de mostrar una pregunta por página                |
| survey_version        | VARCHAR(255) |      |  ✔   |      |      |      |      |      |         | Versión de la encuesta                                   |
| parent_id             | INT(11)      |      |  ✔   |      |      |      |      |      |         | Identificador de la encuesta madre                       |
| survey_type           | INT(11)      |      |  ✔   |      |      |      |      |      |         | Tipo de encuesta                                         |
| show_form_profile     | INT(11)      |      |  ✔   |      |      |      |      |      |         |                                                          |
| form_fields           | LONGTEXT     |      |  ✔   |      |      |      |      |      |         |                                                          |
| session_id            | INT(11)      |      |  ✔   |      |      |      |      |      |         | Identificador de la sesión                               |
| visible_results       | INT(11)      |      |      |      |      |      |      |      | NULL    | Visibilidad de los resultados                            |

## `c_survey_question`
Almacena las preguntas de las encuestas

| Column name             | DataType     | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment                                  |
|-------------------------|--------------|:--:|:--:|:--:|:---:|:--:|:--:|:--:|---------|------------------------------------------|
| iid                     | INT(11)      |  ✔ |  ✔ |    |     |    |    | ✔  |         | Identificador de la pregunta             |
| c_id                    | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador del curso                  |
| question_id             | INT(11)      |    |  ✔ |    |     |    |    |    |         | Antiguo identificador de la pregunta     |
| survey_id               | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador de la encuesta             |
| survey_question         | LONGTEXT     |    |  ✔ |    |     |    |    |    |         | Texto de la pregunta                     |
| survey_question_comment | LONGTEXT     |    |  ✔ |    |     |    |    |    |         | Comentario sobre la pregunta             |
| type                    | VARCHAR(250) |    |  ✔ |    |     |    |    |    |         | Tipo de pregunta                         |
| display                 | VARCHAR(10)  |    |  ✔ |    |     |    |    |    |         | Presentación de la pregunta              |
| sort                    | INT(11)      |    |  ✔ |    |     |    |    |    |         | Número de orden de la pregunta           |
| shared_question_id      | INT(11)      |    |    |    |     |    |    |    | NULL    | Identificador de pregunta compartida     |
| max_value               | INT(11)      |    |    |    |     |    |    |    | NULL    | Valor máximo (según el tipo de pregunta) |
| survey_group_pri        | INT(11)      |    |  ✔ |    |     |    |    |    |         |                                          |
| survey_group_sec1       | INT(11)      |    |  ✔ |    |     |    |    |    |         |                                          |
| survey_group_sec2       | INT(11)      |    |  ✔ |    |     |    |    |    |         |                                          |

## `c_survey_question_option`
Almacena las opciones de cada pregunta de la encuesta

| Column name        | DataType | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment                                        |
|--------------------|----------|:--:|:--:|:--:|:---:|:--:|:--:|:--:|---------|------------------------------------------------|
| iid                | INT(11)  | ✔  | ✔  |    |     |    |    | ✔  |         | Identificador de la opción de pregunta         |
| c_id               | INT(11)  |    | ✔  |    |     |    |    |    |         | Identificador del curso                        |
| question_option_id | INT(11)  |    | ✔  |    |     |    |    |    |         | Antiguo identificador de la opción de pregunta |
| question_id        | INT(11)  |    | ✔  |    |     |    |    |    |         | Identificador de la pregunta                   |
| survey_id          | INT(11)  |    | ✔  |    |     |    |    |    |         | Identificador de la encuesta                   |
| option_text        | LONGTEXT |    | ✔  |    |     |    |    |    |         | Texto de la opción                             |
| sort               | INT(11)  |    | ✔  |    |     |    |    |    |         | Número de orden de la opción                   |
| value              | INT(11)  |    | ✔  |    |     |    |    |    |         | Valor de la opción                             |

## `c_survey_group`
(No usado actualmente)

| Column name | DataType     | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment                         |
|-------------|--------------|:--:|:--:|:--:|:---:|:--:|:--:|:--:|---------|---------------------------------|
| iid         | INT(11)      | ✔  | ✔  |    |     |    |    | ✔  |         | Identificador del grupo         |
| c_id        | INT(11)      |    | ✔  |    |     |    |    |    |         | Identificador del curso         |
| id          | INT(11)      |    |    |    |     |    |    |    | NULL    | Antiguo identificador del grupo |
| name        | VARCHAR(20)  |    | ✔  |    |     |    |    |    |         | Nombre del grupo                |
| description | VARCHAR(255) |    | ✔  |    |     |    |    |    |         | Descripción del grupo           |
| survey_id   | INT(11)      |    | ✔  |    |     |    |    |    |         | Identificador de la encuesta    |

## `c_survey_invitation`
Almacena las invitaciones de cada usuario para llenar la encuesta

| Column name          | DataType     | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment                                 |
|----------------------|--------------|:--:|:--:|:--:|:---:|:--:|:--:|:--:|---------|-----------------------------------------|
| iid                  | INT(11)      |  ✔ |  ✔ |    |     |    |    |  ✔ |         | Identificador de la invitación          |
| c_id                 | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador del curso                 |
| survey_invitation_id | INT(11)      |    |  ✔ |    |     |    |    |    |         | Antiguo identificador de la invitación  |
| survey_code          | VARCHAR(20)  |    |  ✔ |    |     |    |    |    |         | Código de la encuesta                   |
| user                 | VARCHAR(250) |    |  ✔ |    |     |    |    |    |         | Identificador del usuario invitado      |
| invitation_code      | VARCHAR(250) |    |  ✔ |    |     |    |    |    |         | Código de la invitación                 |
| invitation_date      | DATETIME     |    |  ✔ |    |     |    |    |    |         | Fecha de la invitación                  |
| reminder_date        | DATETIME     |    |  ✔ |    |     |    |    |    |         | Fecha del recordatorio de la invitación |
| answered             | INT(11)      |    |  ✔ |    |     |    |    |    |         | Indica si la invitación fue respondida  |
| session_id           | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador de la sesión              |
| group_id             | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador del grupo                 |

## `c_survey_answer`
Almancena las respuestas a cada pregunta la encuesta por los usuarios

| Column name | DataType     | PK | NN | UQ | BIN | UN | ZF | AI | Default | Comment                               |
|-------------|--------------|:--:|:--:|:--:|:---:|:--:|:--:|:--:|---------|---------------------------------------|
| iid         | INT(11)      |  ✔ |  ✔ |    |     |    |    |  ✔ |         | Ideitificador de la respuesta         |
| c_id        | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador del curso               |
| answer_id   | INT(11)      |    |  ✔ |    |     |    |    |    |         | Antiguo identificador de la respuesta |
| survey_id   | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador de la encuesta          |
| question_id | INT(11)      |    |  ✔ |    |     |    |    |    |         | Identificador de la pregunta          |
| option_id   | LONGTEXT     |    |  ✔ |    |     |    |    |    |         | Identificador de la opción            |
| value       | INT(11)      |    |  ✔ |    |     |    |    |    |         | Valor de la respuesta                 |
| user        | VARCHAR(250) |    |  ✔ |    |     |    |    |    |         | Usuario que hizo la repuesta          |

