# Configurações de Pesquisa

Configuração do sistema de busca de texto completo (Xapian).

Acesse essas configurações em **Administração > Configurações de configuração > Pesquisa**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `search_enabled`

**Recurso de busca de texto completo**

Selecione 'Sim' para habilitar este recurso. Ele depende fortemente da extensão Xapian para PHP, portanto, não funcionará se essa extensão não estiver instalada no seu servidor, na versão 1.x no mínimo.

*Padrão: `false`*

### `search_prefilter_prefix`

**Campo Específico para pré-filtro**

Esta opção permite que você escolha o campo específico a ser usado no tipo de busca com pré-filtro.

### `search_show_unlinked_results`

**Busca de texto completo: mostrar resultados não vinculados**

Ao exibir os resultados de uma busca de texto completo, o que deve ser feito com os resultados que não estão acessíveis ao usuário atual?

*Padrão: `true`*