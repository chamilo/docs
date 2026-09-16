# Configurações do Glossário

Comportamento da ferramenta **Glossário** do curso.

Acesse estas configurações em **Administração > Configurações > Glossário**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_remove_tags_in_glossary_export`

**Remover tags HTML na exportação do glossário**

Quando habilitada, as tags HTML são removidas das definições dos termos do glossário na exportação.

*Padrão: `false`*

### `default_glossary_view`

**Visualização padrão do glossário**

Escolha qual visualização ('table' ou 'list') será usada por padrão na ferramenta de glossário.

*Padrão: `table`*

### `show_glossary_in_extra_tools`

**Exibir os termos do glossário em ferramentas extras**

A partir daqui você pode configurar como adicionar os termos do glossário em ferramentas extras, como percursos de aprendizagem e a ferramenta de exercícios