# Configurações de Privacidade

Controles de privacidade e proteção de dados (estilo GDPR) — consentimento, exportação de dados, solicitações de exclusão de conta e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Privacidade**. Esta categoria contém **6 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `data_protection_officer_email`

**Endereço de e-mail do responsável pela proteção de dados**

Endereço de e-mail do responsável designado pela proteção de dados, exibido nas seções de GDPR/privacidade.

### `data_protection_officer_name`

**Nome do responsável pela proteção de dados**

Nome completo do responsável designado pela proteção de dados, exibido nas páginas de dados pessoais e privacidade.

### `data_protection_officer_role`

**Função do responsável pela proteção de dados**

Cargo ou função do responsável designado pela proteção de dados, exibido ao lado do nome nas informações de privacidade.

### `disable_change_user_visibility_for_public_courses`

**Desativar a visibilidade de usuários de ferramentas em cursos públicos**

Evitar que qualquer pessoa torne a ferramenta 'usuários' visível em um curso público.

*Padrão: `true`*

### `disable_gdpr`

**Desativar recursos de GDPR**

Se você já gerencia a declaração de proteção de dados pessoais para usuários em outro lugar, pode desativar este recurso com segurança.

*Padrão: `true`*

### `hide_user_field_from_list`

**Ocultar campos da lista de usuários no curso**

Por padrão, mostramos todos os dados dos usuários na ferramenta de usuários no curso. Este array permite especificar quais campos você não deseja exibir. Afeta apenas os campos principais (não os campos extras).