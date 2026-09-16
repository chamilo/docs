# Configurações de privacidade

Controles de privacidade e proteção de dados (estilo GDPR) — consentimento, exportação de dados, solicitações de exclusão de conta e similares.

Acesse estas configurações em **Administração > Configurações > Privacidade**. Esta categoria contém **6 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `data_protection_officer_email`

**Endereço de e-mail do encarregado de proteção de dados**

Endereço de e-mail do encarregado de proteção de dados designado, exibido nas seções de GDPR/privacidade.

### `data_protection_officer_name`

**Nome do encarregado de proteção de dados**

Nome completo do encarregado de proteção de dados designado, exibido nas páginas de dados pessoais e privacidade.

### `data_protection_officer_role`

**Função do encarregado de proteção de dados**

Cargo ou função do encarregado de proteção de dados designado, exibido junto ao nome nas informações de privacidade.

### `disable_change_user_visibility_for_public_courses`

**Desativar a visibilidade da ferramenta de usuários em cursos públicos**

Impede que qualquer pessoa torne a ferramenta 'users' visível em um curso público.

*Padrão: `true`*

### `disable_gdpr`

**Desativar recursos de GDPR**

Se você já gerencia a declaração de proteção de dados pessoais para os usuários em outro lugar, pode desativar este recurso com segurança.

*Padrão: `true`*

### `hide_user_field_from_list`

**Ocultar campos da lista de usuários no curso**

Por padrão, exibimos todos os dados dos usuários na ferramenta de usuários do curso. Este array permite especificar quais campos você não deseja exibir. Afeta apenas os campos principais (não os campos extras).