# Configurações de Idiomas

Idiomas disponíveis, idioma padrão e como o Chamilo determina qual idioma exibir.

Acesse essas configurações em **Administração > Configurações de configuração > Idiomas**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_course_multiple_languages`

**Cursos em múltiplos idiomas**

Habilita cursos gerenciados em mais de um idioma. Esta opção adiciona um seletor de idioma dentro da página do curso para permitir que os usuários alternem facilmente, e adiciona um campo extra 'multiple_language' aos cursos, o que permite procedimentos de gerenciamento remoto.

*Padrão: `false`*

### `allow_use_sub_language`

**Permitir definição e uso de subidiomas**

Ao habilitar esta opção, você poderá definir variações para cada um dos termos de idioma usados na interface da plataforma, na forma de um novo idioma baseado e que estende um idioma existente. Você encontrará esta opção na seção de idiomas do painel de administração.

*Padrão: `false`*

### `auto_detect_language_custom_pages`

**Habilitar detecção automática de idioma em páginas personalizadas**

Se você usa páginas personalizadas, habilite esta opção se quiser que um detector de idioma apresente a página no idioma do navegador do usuário, ou desabilite para forçar o idioma a ser o idioma padrão da plataforma.

*Padrão: `true`*

### `language_flags_by_country`

**Bandeiras de idioma**

Usar bandeiras de países para idiomas. Isso não está habilitado por padrão porque alguns idiomas não estão estritamente ligados a um país, o que pode causar frustração para alguns usuários.

*Padrão: `false`*

### `language_priority_1`

**Idioma de maior prioridade**

Idioma principal selecionado quando múltiplos contextos de idioma estão definidos.

*Padrão: `course_lang`*

### `language_priority_2`

**Idioma de prioridade secundária**

Idioma de fallback secundário se a primeira prioridade não estiver disponível ou fora de contexto.

*Padrão: `user_profil_lang`*

### `language_priority_3`

**Idioma de terceira prioridade**

Idioma de fallback terciário se as prioridades mais altas falharem.

*Padrão: `user_selected_lang`*

### `language_priority_4`

**Idioma de quarta prioridade**

Última opção de idioma de fallback por ordem de prioridade.

*Padrão: `platform_lang`*

### `platform_language`

**Idioma padrão da plataforma**

Idioma principal, usado por padrão quando nenhum idioma do usuário está definido.

*Padrão: `en`*

### `show_different_course_language`

**Mostrar idiomas dos cursos**

Mostrar o idioma de cada curso ao lado do título do curso, na lista de cursos da página inicial.

*Padrão: `true`*

### `show_language_selector_in_menu`

**Seletor de idioma no menu principal**

Exibir um seletor de idioma no menu principal que atualiza imediatamente a preferência de idioma do usuário. Isso pode ser útil em portais multilíngues onde os alunos precisam alternar de um idioma para outro durante o aprendizado.

*Padrão: `true`*

### `template_activate_language_filter`

**Modelos de documentos em múltiplos idiomas**

Habilitar modelos de documentos (no nível da plataforma ou do curso) a serem configurados para idiomas específicos.

*Padrão: `false`*