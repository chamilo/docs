# Definições de idiomas

Idiomas disponíveis, idioma predefinido e a forma como o Chamilo determina qual o idioma a apresentar.

Aceda a estas definições em **Administração > Definições de configuração > Idiomas**. Esta categoria contém **13 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_course_multiple_languages`

**Cursos em vários idiomas**

Permite cursos geridos em mais do que um idioma. Esta opção adiciona um seletor de idioma na página do curso para que os utilizadores possam mudar facilmente, e adiciona um campo extra `multiple_language` aos cursos, o que permite procedimentos de gestão remota.

*Predefinição: `false`*


### `allow_use_sub_language`

**Permitir a definição e a utilização de subidiomas**

Ao ativar esta opção, poderá definir variações para cada um dos termos de idioma utilizados na interface da plataforma, na forma de um novo idioma baseado num idioma existente e que o estende. Encontrará esta opção na secção de idiomas do painel de administração.

*Predefinição: `false`*

### `auto_detect_language_custom_pages`

**Ativar a deteção automática de idioma em páginas personalizadas**

Se utilizar páginas personalizadas, ative esta opção se pretender que um detetor de idioma apresente a página no idioma do navegador do utilizador, ou desative-a para forçar o idioma predefinido da plataforma.

*Predefinição: `true`*


### `language_by_resource` **v3**

**Idioma por recurso**

Permite atribuir um idioma específico a recursos individuais.

*Predefinição: `false`*

### `language_flags_by_country`

**Bandeiras de idiomas**

Utilizar bandeiras de países para os idiomas. Esta opção não está ativada por predefinição porque alguns idiomas não estão estritamente associados a um país, o que pode gerar frustração em alguns utilizadores.

*Predefinição: `false`*


### `language_priority_1`

**Idioma de prioridade mais alta**

Idioma principal selecionado quando existem vários contextos de idioma.

*Predefinição: `course_lang`*


### `language_priority_2`

**Idioma de prioridade secundária**

Idioma de recurso secundário se a primeira prioridade não estiver disponível ou estiver fora de contexto.

*Predefinição: `user_profil_lang`*


### `language_priority_3`

**Idioma de terceira prioridade**

Idioma de recurso terciário se as prioridades superiores falharem.

*Predefinição: `user_selected_lang`*


### `language_priority_4`

**Idioma de quarta prioridade**

Última opção de idioma de recurso, por ordem de prioridade.

*Predefinição: `platform_lang`*


### `platform_language`

**Idioma predefinido da plataforma**

Idioma principal, utilizado por predefinição quando nenhum idioma de utilizador está definido.

*Predefinição: `en`*


### `show_different_course_language`

**Mostrar idiomas dos cursos**

Mostrar o idioma de cada curso, junto ao título do curso, na lista de cursos da página inicial

*Predefinição: `true`*


### `show_language_selector_in_menu`

**Seletor de idioma no menu principal**

Apresentar um seletor de idioma no menu principal que atualiza imediatamente a preferência de idioma do utilizador. Pode ser útil em portais multilingues em que os formandos têm de mudar de um idioma para outro na aprendizagem.

*Predefinição: `true`*


### `template_activate_language_filter`

**Modelos de documentos em vários idiomas**

Permitir que os modelos de documentos (ao nível da plataforma ou do curso) sejam configurados para idiomas específicos.

*Predefinição: `false`*