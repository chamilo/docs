# Definições de privacidade

Controlos de privacidade e proteção de dados (estilo RGPD) — consentimento, exportação de dados, pedidos de eliminação de conta e semelhantes.

Aceda a estas definições em **Administração > Definições de configuração > Privacidade**. Esta categoria contém **6 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaço. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `data_protection_officer_email`

**Endereço de e-mail do encarregado da proteção de dados**

Endereço de e-mail do encarregado da proteção de dados designado, apresentado nas secções de RGPD/privacidade.

### `data_protection_officer_name`

**Nome do encarregado da proteção de dados**

Nome completo do encarregado da proteção de dados designado, apresentado nas páginas de dados pessoais e de privacidade.

### `data_protection_officer_role`

**Função do encarregado da proteção de dados**

Cargo ou função do encarregado da proteção de dados designado, apresentado juntamente com o respetivo nome nas informações de privacidade.

### `disable_change_user_visibility_for_public_courses`

**Desativar a visibilidade dos utilizadores da ferramenta em cursos públicos**

Evitar que alguém torne a ferramenta «utilizadores» visível num curso público.

*Predefinição: `true`*

### `disable_gdpr`

**Desativar funcionalidades RGPD**

Se já gerir noutro local a declaração de proteção de dados pessoais dirigida aos utilizadores, pode desativar esta funcionalidade em segurança.

*Predefinição: `true`*

### `hide_user_field_from_list`

**Ocultar campos da lista de utilizadores no curso**

Por predefinição, mostramos todos os dados dos utilizadores na ferramenta de utilizadores do curso. Este array permite especificar quais os campos que não pretende apresentar. Afeta apenas os campos principais (não os campos extra).