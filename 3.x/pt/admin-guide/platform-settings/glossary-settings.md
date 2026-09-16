# Definições do Glossário

Comportamento da ferramenta **Glossário** do curso.

Aceda a estas definições em **Administração > Definições de configuração > Glossário**. Esta categoria contém **3 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_remove_tags_in_glossary_export`

**Remover etiquetas HTML na exportação do glossário**

Quando ativada, as etiquetas HTML são removidas das definições dos termos do glossário ao exportar.

*Predefinição: `false`*

### `default_glossary_view`

**Vista predefinida do glossário**

Escolha qual a vista ('table' ou 'list') que será utilizada por predefinição na ferramenta de glossário.

*Predefinição: `table`*

### `show_glossary_in_extra_tools`

**Mostrar os termos do glossário em ferramentas extra**

A partir daqui pode configurar como adicionar os termos do glossário em ferramentas extra, como o percurso de aprendizagem e a ferramenta de exercícios