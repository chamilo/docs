# Configurações da Dropbox

Comportamento da ferramenta de troca de arquivos **Dropbox**.

Acesse estas configurações em **Administração > Configurações > Dropbox**. Esta categoria contém **8 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `dropbox_allow_group`

**Dropbox: permitir grupo**

Os usuários podem enviar arquivos para grupos

*Padrão: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Enviar para o próprio espaço da dropbox?**

Permitir que formadores e usuários enviem documentos para a própria dropbox sem enviar os documentos para si mesmos

*Padrão: `true`*

### `dropbox_allow_mailing`

**Dropbox: Permitir mala direta**

Com a funcionalidade de mala direta, você pode enviar a cada aluno um documento pessoal

*Padrão: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Os documentos podem ser sobrescritos**

O documento original pode ser sobrescrito quando um usuário ou formador envia um documento com o nome de um documento que já existe? Se você responder sim, o mecanismo de versionamento é perdido.

*Padrão: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Aluno <-> Aluno**

Permitir que os usuários enviem documentos a outros usuários (peer 2 peer). Os usuários podem usar isso também para documentos menos relevantes (mp3, soluções de testes, ...). Se você desativar isso, os usuários poderão enviar documentos apenas ao formador.

*Padrão: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar tutor do curso**

Ocultar o tutor do curso da sessão na Dropbox quando um documento é enviado pelo tutor aos alunos

*Padrão: `false`*

### `dropbox_hide_general_coach`

**Ocultar tutor geral na Dropbox**

Ocultar o nome do tutor geral na ferramenta Dropbox quando o tutor geral enviou o arquivo

*Padrão: `false`*


### `dropbox_max_filesize`

**Dropbox: Tamanho máximo de arquivo de um documento**

Qual o tamanho máximo (em MB) que um documento da dropbox pode ter?

*Padrão: `100000000`*