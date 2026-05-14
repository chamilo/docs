# Configurações do Dropbox

Comportamento da ferramenta de troca de arquivos **Dropbox**.

Acesse essas configurações em **Administração > Configurações de configuração > Dropbox**. Esta categoria contém **8 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `dropbox_allow_group`

**Dropbox: permitir grupo**

Os usuários podem enviar arquivos para grupos

*Padrão: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Fazer upload para o próprio espaço do Dropbox?**

Permitir que treinadores e usuários façam upload de documentos para o seu Dropbox sem enviar os documentos para si mesmos

*Padrão: `true`*

### `dropbox_allow_mailing`

**Dropbox: Permitir envio por e-mail**

Com a funcionalidade de envio por e-mail, você pode enviar um documento pessoal para cada aluno

*Padrão: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Os documentos podem ser sobrescritos**

O documento original pode ser sobrescrito quando um usuário ou treinador faz upload de um documento com o nome de um documento que já existe? Se você responder sim, perderá o mecanismo de versionamento.

*Padrão: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Aluno <-> Aluno**

Permitir que os usuários enviem documentos para outros usuários (peer to peer). Os usuários podem usar isso também para documentos menos relevantes (mp3, soluções de testes, ...). Se você desativar isso, os usuários só poderão enviar documentos para o treinador.

*Padrão: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar treinador do curso**

Ocultar o treinador do curso na sessão do Dropbox quando um documento é enviado pelo treinador aos alunos

*Padrão: `false`*

### `dropbox_hide_general_coach`

**Ocultar treinador geral no Dropbox**

Ocultar o nome do treinador geral na ferramenta Dropbox quando o treinador geral fez upload do arquivo

*Padrão: `false`*

### `dropbox_max_filesize`

**Dropbox: Tamanho máximo de arquivo de um documento**

Qual o tamanho máximo (em MB) que um documento do Dropbox pode ter?

*Padrão: `100000000`*