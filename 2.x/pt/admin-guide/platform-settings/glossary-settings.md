# Configurações do Glossário

Comportamento da ferramenta **Glossário** do curso.

Acesse essas configurações em **Administração > Configurações de configuração > Glossário**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_remove_tags_in_glossary_export`

**Remover tags HTML na exportação do glossário**

Quando ativado, as tags HTML são removidas das definições dos termos do glossário ao exportar.

*Padrão: `false`*

### `default_glossary_view`

**Visualização padrão do glossário**

Escolha qual visualização ('table' ou 'list') será usada por padrão na ferramenta de glossário.

*Padrão: `table`*

### `show_glossary_in_extra_tools`

**Mostrar os termos do glossário em ferramentas extras**

A partir daqui, você pode configurar como adicionar os termos do glossário em ferramentas extras, como o caminho de aprendizagem e a ferramenta de exercícios.