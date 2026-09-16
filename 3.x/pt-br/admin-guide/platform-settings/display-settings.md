# Configurações de exibição

Como a plataforma é exibida aos usuários — layout da página inicial, gravatar, menus, comportamento da identidade visual e preferências visuais semelhantes.

Acesse estas configurações em **Administração > Configurações de configuração > Exibição**. Esta categoria contém **28 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `accessibility_font_resize`

**Recurso de acessibilidade para redimensionar fonte**

Ative esta opção para exibir um conjunto de opções de redimensionamento de fonte no canto superior direito do campus. Isso permitirá que pessoas com deficiência visual leiam o conteúdo dos cursos com mais facilidade.

*Padrão: `false`*

### `display_categories_on_homepage`

**Exibir categorias na página inicial**

Esta opção exibirá ou ocultará as categorias de cursos na página inicial do portal

*Padrão: `false`*

### `enable_help_link`

**Ativar link de ajuda**

O link Ajuda está localizado na parte superior direita da tela

*Padrão: `true`*

### `gravatar_enabled`

**Fotos de usuário do Gravatar**

Ative esta opção para pesquisar no repositório Gravatar fotos do usuário atual, caso o usuário não tenha definido uma foto localmente. Isso é excelente para preencher automaticamente as fotos no seu site, em particular se seus usuários forem usuários ativos da internet. As fotos do Gravatar podem ser configuradas facilmente, com base no endereço de e-mail do usuário, em http://en.gravatar.com/

*Padrão: `false`*

### `gravatar_type`

**Tipo de avatar do Gravatar**

Se a opção Gravatar estiver ativada e o usuário não tiver uma foto configurada no Gravatar, esta opção permite escolher o tipo de avatar que o Gravatar gerará para cada usuário. Consulte <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> para exemplos de tipos de avatar.

*Padrão: `mm`*

### `hide_complete_name_in_whoisonline`

**Ocultar o nome completo de usuário em 'quem está online'**

A página 'quem está online' (se ativada) exibirá uma foto e um nome para cada usuário atualmente online. Ative esta opção para ocultar os nomes.

*Padrão: `false`*

### `hide_home_top_when_connected` **v3**

**Ocultar o conteúdo superior da página inicial quando autenticado**

Na página inicial da plataforma, esta opção permite ocultar o bloco de introdução (para deixar apenas os anúncios, por exemplo), para todos os usuários que já estão autenticados. O bloco de introdução geral ainda aparecerá para os usuários que ainda não estão autenticados.

*Padrão: `false`*

### `hide_logout_button`

**Ocultar botão de sair**

Oculta o botão de sair. Isso geralmente só é interessante ao usar um método externo de login/logout, por exemplo ao usar algum tipo de Single Sign On.

*Padrão: `false`*

### `hide_main_navigation_menu`

**Ocultar menu principal de navegação**

Ao usar o Chamilo para um propósito específico (como um exame online massivo), você pode querer reduzir ainda mais as distrações removendo o menu lateral.

*Padrão: `false`*

### `hide_social_media_links`

**Ocultar links de redes sociais**

Algumas páginas permitem promover o portal ou um curso em redes sociais. Ative esta configuração para remover os links.

*Padrão: `false`*

### `order_user_list_by_official_code`

**Ordenar usuários pelo código oficial**

Use o 'código oficial' para ordenar a maioria das listas de estudantes na plataforma, em vez do sobrenome ou do nome.

*Padrão: `false`*

### `pdf_logo_header`

**Logotipo do cabeçalho PDF**

Se deve usar a imagem em var/themes/[your-theme]/images/pdf_logo_header.png como logotipo do cabeçalho PDF para todas as exportações em PDF (em vez do logotipo normal do portal)

### `show_admin_toolbar`

**Exibir barra de ferramentas de administração**

Exibe uma barra de ferramentas global no topo da página para os papéis de usuário designados. Esta barra de ferramentas, muito semelhante às barras pretas do Wordpress e do Google, pode realmente acelerar ações complicadas e melhorar o espaço disponível para o conteúdo de aprendizagem, mas pode ser confusa para alguns usuários

*Padrão: `do_not_show`*

### `show_administrator_data` **v3**

**Informações do administrador da plataforma no rodapé**

Exibir as informações do administrador da plataforma no rodapé?

*Padrão: `true`*

### `show_back_link_on_top_of_tree`

**Exibir links de voltar a partir de categorias/cursos**

Exibe um link para voltar na hierarquia de cursos. Um link está disponível na parte inferior da lista de qualquer forma.

*Padrão: `false`*

### `show_closed_courses`

**Exibir cursos fechados na página de login e na página inicial do portal?**

Exibir cursos fechados na página de login e na página inicial dos cursos? Na página inicial do portal, um ícone aparecerá ao lado dos cursos para inscrição rápida em cada um. Isso só aparecerá na página inicial do portal quando o usuário estiver autenticado e quando o usuário ainda não estiver inscrito no portal.

*Padrão: `false`*

### `show_email_addresses`

**Exibir endereços de e-mail**

Exibir endereços de e-mail para os usuários

*Padrão: `false`*

### `show_empty_course_categories`

**Exibir categorias de cursos vazias**

Exibir as categorias de cursos na página inicial, mesmo que estejam vazias

*Padrão: `true`*

### `show_hot_courses`

**Exibir cursos em destaque**

A lista de cursos em destaque será adicionada à página inicial

*Padrão: `true`*

### `show_number_of_courses`

**Exibir número de cursos**

Exibir o número de cursos em cada categoria nas categorias de cursos da página inicial

*Padrão: `false`*

### `show_tabs`

**Itens do menu principal**

Marque os itens que deseja que apareçam no menu principal

*Padrão:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Itens do menu principal por papel**

Definir a visibilidade das abas do cabeçalho por papel.

*Padrão: `{}`*

### `show_teacher_data` **v3**

**Exibir informações do professor no rodapé**

Exibir a referência do professor (nome e e-mail, se disponível) no rodapé?

*Padrão: `true`*

### `show_tutor_data` **v3**

**Os dados do tutor da sessão são exibidos no rodapé.**

Exibir a referência do tutor da sessão (nome e e-mail, se disponível) no rodapé?

*Padrão: `true`*

### `showonline`

**Quem está online**

Exibir o número de pessoas que estão online?

*Padrão: `world`*

### `table_default_row`

**Número padrão de linhas da tabela**

Quantas linhas devem ser exibidas em todas as tabelas por padrão.

*Padrão: `20`*

### `table_row_list`

**Números de paginação oferecidos por padrão nas tabelas**

Defina as opções que deseja que apareçam na navegação ao redor de uma tabela para exibir menos ou mais linhas em uma página. p. ex. [50, 100, 200, 500].

*Padrão: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite de tempo em Quem está online**

Este limite de tempo define por quantos minutos após sua última ação um usuário será considerado *online*

*Padrão: `30`*