# Definições de pesquisa

Configuração do sistema de pesquisa de texto integral (Xapian).

Aceda a estas definições em **Administração > Definições de configuração > Pesquisa**. Esta categoria contém **3 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `search_enabled`

**Funcionalidade de pesquisa de texto integral**

Selecione «Sim» para ativar esta funcionalidade. Depende fortemente da extensão Xapian para PHP, pelo que não funcionará se esta extensão não estiver instalada no seu servidor, na versão 1.x no mínimo.

*Predefinição: `false`*


### `search_prefilter_prefix`

**Campo específico para pré-filtro**

Esta opção permite-lhe escolher o campo específico a utilizar no tipo de pesquisa com pré-filtro.

### `search_show_unlinked_results`

**Pesquisa de texto integral: mostrar resultados sem ligação**

Ao apresentar os resultados de uma pesquisa de texto integral, o que deve ser feito com os resultados que não estão acessíveis ao utilizador atual?

*Predefinição: `true`*