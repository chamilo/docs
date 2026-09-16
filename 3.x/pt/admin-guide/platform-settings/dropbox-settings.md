# Definições da Dropbox

Comportamento da ferramenta de troca de ficheiros **Dropbox**.

Aceda a estas definições em **Administração > Definições de configuração > Dropbox**. Esta categoria contém **8 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `dropbox_allow_group`

**Dropbox: permitir grupo**

Os utilizadores podem enviar ficheiros para grupos

*Predefinição: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Carregar para o próprio espaço da dropbox?**

Permitir que formadores e utilizadores carreguem documentos para a sua dropbox sem enviarem os documentos a si próprios

*Predefinição: `true`*

### `dropbox_allow_mailing`

**Dropbox: Permitir mailing**

Com a funcionalidade de mailing pode enviar a cada formando um documento pessoal

*Predefinição: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Os documentos podem ser substituídos**

O documento original pode ser substituído quando um utilizador ou formador carrega um documento com o nome de um documento que já existe? Se responder sim, perde o mecanismo de versionamento.

*Predefinição: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Formando <-> Formando**

Permitir que os utilizadores enviem documentos a outros utilizadores (peer 2 peer). Os utilizadores poderão utilizar isto também para documentos menos relevantes (mp3, soluções de testes, ...). Se desativar isto, os utilizadores só poderão enviar documentos ao formador.

*Predefinição: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar tutor do curso**

Ocultar o tutor do curso da sessão na Dropbox quando um documento é enviado pelo tutor aos estudantes

*Predefinição: `false`*

### `dropbox_hide_general_coach`

**Ocultar tutor geral na Dropbox**

Ocultar o nome do tutor geral na ferramenta Dropbox quando o tutor geral carregou o ficheiro

*Predefinição: `false`*


### `dropbox_max_filesize`

**Dropbox: Tamanho máximo de ficheiro de um documento**

Qual o tamanho máximo (em MB) de um documento da dropbox?

*Predefinição: `100000000`*