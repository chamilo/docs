# Definições de apresentação

Como a plataforma é apresentada aos utilizadores — disposição da página inicial, gravatar, menus, comportamento da identidade visual e preferências visuais semelhantes.

Aceda a estas definições em **Administração > Definições de configuração > Apresentação**. Esta categoria contém **28 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts via API ou quando precisar de alterar essas definições a um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `accessibility_font_resize`

**Funcionalidade de acessibilidade para redimensionar o tipo de letra**

Ative esta opção para mostrar um conjunto de opções de redimensionamento do tipo de letra no canto superior direito do seu campus. Isto permitirá que pessoas com deficiência visual leiam mais facilmente os conteúdos dos seus cursos.

*Predefinição: `false`*

### `display_categories_on_homepage`

**Mostrar categorias na página inicial**

Esta opção mostrará ou ocultará as categorias de cursos na página inicial do portal

*Predefinição: `false`*

### `enable_help_link`

**Ativar ligação de ajuda**

A ligação Ajuda encontra-se na parte superior direita do ecrã

*Predefinição: `true`*

### `gravatar_enabled`

**Imagens de utilizador Gravatar**

Ative esta opção para procurar no repositório Gravatar imagens do utilizador atual, caso o utilizador não tenha definido uma imagem localmente. Isto é excelente para preencher automaticamente as imagens no seu sítio, em particular se os seus utilizadores forem utilizadores ativos da Internet. As imagens Gravatar podem ser configuradas facilmente, com base no endereço de e-mail de um utilizador, em http://en.gravatar.com/

*Predefinição: `false`*

### `gravatar_type`

**Tipo de avatar Gravatar**

Se a opção Gravatar estiver ativada e o utilizador não tiver uma imagem configurada no Gravatar, esta opção permite-lhe escolher o tipo de avatar que o Gravatar gerará para cada utilizador. Consulte <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> para exemplos de tipos de avatar.

*Predefinição: `mm`*

### `hide_complete_name_in_whoisonline`

**Ocultar o nome de utilizador completo em «quem está em linha»**

A página «quem está em linha» (se estiver ativada) mostrará uma imagem e um nome para cada utilizador atualmente em linha. Ative esta opção para ocultar os nomes.

*Predefinição: `false`*

### `hide_home_top_when_connected` **v3**

**Ocultar o conteúdo superior na página inicial quando autenticado**

Na página inicial da plataforma, esta opção permite-lhe ocultar o bloco de introdução (para deixar apenas os anúncios, por exemplo), para todos os utilizadores que já estejam autenticados. O bloco de introdução geral continuará a aparecer para os utilizadores que ainda não estejam autenticados.

*Predefinição: `false`*

### `hide_logout_button`

**Ocultar botão de terminar sessão**

Ocultar o botão de terminar sessão. Isto normalmente só é interessante quando se utiliza um método externo de início/término de sessão, por exemplo ao utilizar Single Sign On de algum tipo.

*Predefinição: `false`*

### `hide_main_navigation_menu`

**Ocultar menu de navegação principal**

Ao utilizar o Chamilo para um fim específico (como um exame em linha massivo), poderá querer reduzir ainda mais as distrações removendo o menu lateral.

*Predefinição: `false`*

### `hide_social_media_links`

**Ocultar ligações de redes sociais**

Algumas páginas permitem-lhe promover o portal ou um curso nas redes sociais. Ative esta definição para remover as ligações.

*Predefinição: `false`*

### `order_user_list_by_official_code`

**Ordenar utilizadores pelo código oficial**

Utilizar o «código oficial» para ordenar a maioria das listas de estudantes na plataforma, em vez do apelido ou do nome próprio.

*Predefinição: `false`*

### `pdf_logo_header`

**Logótipo do cabeçalho PDF**

Se deve utilizar a imagem em var/themes/[your-theme]/images/pdf_logo_header.png como logótipo do cabeçalho PDF para todas as exportações PDF (em vez do logótipo normal do portal)

### `show_admin_toolbar`

**Mostrar barra de ferramentas de administração**

Mostra uma barra de ferramentas global no topo da página para os papéis de utilizador designados. Esta barra de ferramentas, muito semelhante às barras pretas do Wordpress e do Google, pode realmente acelerar ações complicadas e melhorar o espaço disponível para o conteúdo de aprendizagem, mas pode ser confusa para alguns utilizadores

*Predefinição: `do_not_show`*

### `show_administrator_data` **v3**

**Informação do administrador da plataforma no rodapé**

Mostrar a informação do administrador da plataforma no rodapé?

*Predefinição: `true`*

### `show_back_link_on_top_of_tree`

**Mostrar ligações de regresso a partir de categorias/cursos**

Mostrar uma ligação para voltar atrás na hierarquia de cursos. Uma ligação está disponível na parte inferior da lista de qualquer forma.

*Predefinição: `false`*

### `show_closed_courses`

**Mostrar cursos fechados na página de início de sessão e na página inicial do portal?**

Mostrar cursos fechados na página de início de sessão e na página inicial dos cursos? Na página inicial do portal aparecerá um ícone junto aos cursos para se inscrever rapidamente em cada um. Isto só aparecerá na página inicial do portal quando o utilizador estiver autenticado e quando o utilizador ainda não estiver inscrito no portal.

*Predefinição: `false`*

### `show_email_addresses`

**Mostrar endereços de e-mail**

Mostrar os endereços de e-mail aos utilizadores

*Default: `false`*

### `show_empty_course_categories`

**Mostrar categorias de cursos vazias**

Mostrar as categorias de cursos na página inicial, mesmo que estejam vazias

*Default: `true`*

### `show_hot_courses`

**Mostrar cursos em destaque**

A lista de cursos em destaque será adicionada à página de índice

*Default: `true`*

### `show_number_of_courses`

**Mostrar o número de cursos**

Mostrar o número de cursos em cada categoria nas categorias de cursos da página inicial

*Default: `false`*

### `show_tabs`

**Entradas do menu principal**

Marque as entradas que pretende que apareçam no menu principal

*Default:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entradas do menu principal por papel**

Definir a visibilidade dos separadores do cabeçalho por papel.

*Default: `{}`*

### `show_teacher_data` **v3**

**Mostrar informação do professor no rodapé**

Mostrar a referência do professor (nome e e-mail, se disponível) no rodapé?

*Default: `true`*

### `show_tutor_data` **v3**

**Os dados do tutor da sessão são apresentados no rodapé.**

Mostrar a referência do tutor da sessão (nome e e-mail, se disponível) no rodapé?

*Default: `true`*

### `showonline`

**Quem está online**

Apresentar o número de pessoas que estão online?

*Default: `world`*

### `table_default_row`

**Número predefinido de linhas da tabela**

Quantas linhas devem ser apresentadas, por predefinição, em todas as tabelas.

*Default: `20`*

### `table_row_list`

**Números de paginação oferecidos por predefinição nas tabelas**

Defina as opções que pretende que apareçam na navegação em torno de uma tabela para mostrar menos ou mais linhas numa página. p. ex. [50, 100, 200, 500].

*Default: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite de tempo em Quem está online**

Este limite de tempo define durante quantos minutos após a sua última ação um utilizador será considerado *online*

*Default: `30`*