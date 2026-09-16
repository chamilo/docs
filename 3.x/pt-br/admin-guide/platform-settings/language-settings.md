# Configurações de idiomas

Idiomas disponíveis, idioma padrão e como o Chamilo resolve qual idioma exibir.

Acesse essas configurações em **Administração > Configurações > Idiomas**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_course_multiple_languages`

**Cursos em vários idiomas**

Permite cursos gerenciados em mais de um idioma. Esta opção adiciona um seletor de idioma na página do curso para que os usuários possam alternar facilmente e adiciona um campo extra 'multiple_language' aos cursos, o que permite procedimentos de gerenciamento remoto.

*Padrão: `false`*


### `allow_use_sub_language`

**Permitir definição e uso de subidiomas**

Ao ativar esta opção, você poderá definir variações para cada um dos termos de idioma usados na interface da plataforma, na forma de um novo idioma baseado em e que estende um idioma existente. Você encontrará esta opção na seção de idiomas do painel de administração.

*Padrão: `false`*

### `auto_detect_language_custom_pages`

**Ativar detecção automática de idioma em páginas personalizadas**

Se você usa páginas personalizadas, ative esta opção se quiser que um detector de idioma apresente a página no idioma do navegador do usuário, ou desative para forçar o idioma a ser o idioma padrão da plataforma.

*Padrão: `true`*


### `language_by_resource` **v3**

**Idioma por recurso**

Permite atribuir um idioma específico a recursos individuais.

*Padrão: `false`*

### `language_flags_by_country`

**Bandeiras de idiomas**

Usar bandeiras de países para os idiomas. Isso não está ativado por padrão porque alguns idiomas não estão estritamente vinculados a um país, o que pode gerar frustração para alguns usuários.

*Padrão: `false`*


### `language_priority_1`

**Idioma de maior prioridade**

Idioma principal selecionado quando vários contextos de idioma estão definidos.

*Padrão: `course_lang`*


### `language_priority_2`

**Idioma de prioridade secundária**

Idioma de fallback secundário se a primeira prioridade estiver indisponível ou fora de contexto.

*Padrão: `user_profil_lang`*


### `language_priority_3`

**Idioma de terceira prioridade**

Fallback terciário de idioma se as prioridades superiores falharem.

*Padrão: `user_selected_lang`*


### `language_priority_4`

**Idioma de quarta prioridade**

Última opção de fallback de idioma por ordem de prioridade.

*Padrão: `platform_lang`*


### `platform_language`

**Idioma padrão da plataforma**

Idioma principal, usado por padrão quando nenhum idioma de usuário está definido.

*Padrão: `en`*


### `show_different_course_language`

**Exibir idiomas dos cursos**

Exibir o idioma de cada curso, ao lado do título do curso, na lista de cursos da página inicial

*Padrão: `true`*


### `show_language_selector_in_menu`

**Seletor de idioma no menu principal**

Exibir um seletor de idioma no menu principal que atualiza imediatamente a preferência de idioma do usuário. Isso pode ser útil em portais multilíngues em que os aprendizes precisam alternar de um idioma para outro para o aprendizado.

*Padrão: `true`*


### `template_activate_language_filter`

**Modelos de documentos em vários idiomas**

Permite que modelos de documentos (no nível da plataforma ou do curso) sejam configurados para idiomas específicos.

*Padrão: `false`*