# Configurações de pesquisa

Configuração do sistema de pesquisa em texto completo (Xapian).

Acesse estas configurações em **Administração > Configurações > Pesquisa**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `search_enabled`

**Recurso de pesquisa em texto completo**

Selecione 'Sim' para ativar este recurso. Ele depende fortemente da extensão Xapian para PHP, portanto não funcionará se essa extensão não estiver instalada no seu servidor, na versão 1.x no mínimo.

*Padrão: `false`*


### `search_prefilter_prefix`

**Campo específico para pré-filtro**

Esta opção permite escolher o campo específico a ser usado no tipo de pesquisa com pré-filtro.

### `search_show_unlinked_results`

**Pesquisa em texto completo: exibir resultados sem vínculo**

Ao exibir os resultados de uma pesquisa em texto completo, o que deve ser feito com os resultados que não estão acessíveis ao usuário atual?

*Padrão: `true`*