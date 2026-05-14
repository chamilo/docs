# Configurações de Exibição

Como a plataforma é exibida para os usuários — layout da página inicial, gravatar, menus, comportamento de marca e preferências visuais semelhantes.

Acesse essas configurações em **Administração > Configurações de configuração > Exibição**. Esta categoria contém **24 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `accessibility_font_resize`

**Recurso de acessibilidade para redimensionamento de fonte**

Habilite esta opção para mostrar um conjunto de opções de redimensionamento de fonte no canto superior direito do seu campus. Isso permitirá que pessoas com deficiência visual leiam o conteúdo dos cursos com mais facilidade.

*Padrão: `false`*

### `display_categories_on_homepage`

**Exibir categorias na página inicial**

Esta opção exibirá ou ocultará as categorias de cursos na página inicial do portal.

*Padrão: `false`*

### `enable_help_link`

**Habilitar link de ajuda**

O link de Ajuda está localizado na parte superior direita da tela.

*Padrão: `true`*

### `gravatar_enabled`

**Fotos de usuário do Gravatar**

Habilite esta opção para buscar fotos do usuário atual no repositório do Gravatar, caso o usuário não tenha definido uma foto localmente. Isso é ótimo para preencher automaticamente fotos no seu site, especialmente se seus usuários são ativos na internet. As fotos do Gravatar podem ser configuradas facilmente com base no endereço de e-mail de um usuário em http://en.gravatar.com/

*Padrão: `false`*

### `gravatar_type`

**Tipo de avatar do Gravatar**

Se a opção Gravatar estiver habilitada e o usuário não tiver uma foto configurada no Gravatar, esta opção permite escolher o tipo de avatar que o Gravatar gerará para cada usuário. Verifique <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> para exemplos de tipos de avatar.

*Padrão: `mm`*

### `hide_complete_name_in_whoisonline`

**Ocultar o nome completo do usuário em 'quem está online'**

A página 'quem está online' (se habilitada) mostrará uma foto e um nome para cada usuário atualmente online. Habilite esta opção para ocultar os nomes.

*Padrão: `false`*

### `hide_logout_button`

**Ocultar botão de logout**

Oculte o botão de logout. Isso geralmente só é interessante ao usar um método de login/logout externo, por exemplo, ao usar Single Sign On de algum tipo.

*Padrão: `false`*

### `hide_main_navigation_menu`

**Ocultar menu de navegação principal**

Ao usar o Chamilo para um propósito específico (como um grande exame online), você pode querer reduzir ainda mais as distrações removendo o menu lateral.

*Padrão: `false`*

### `hide_social_media_links`

**Ocultar links de redes sociais**

Algumas páginas permitem que você promova o portal ou um curso em redes sociais. Habilite esta configuração para remover os links.

*Padrão: `false`*

### `order_user_list_by_official_code`

**Ordenar usuários por código oficial**

Use o 'código oficial' para classificar a maioria das listas de alunos na plataforma, em vez de usar o sobrenome ou nome.

*Padrão: `false`*

### `pdf_logo_header`

**Logotipo do cabeçalho em PDF**

Se deve usar a imagem em var/themes/[seu-tema]/images/pdf_logo_header.png como o logotipo do cabeçalho em PDF para todas as exportações de PDF (em vez do logotipo normal do portal).

### `show_admin_toolbar`

**Mostrar barra de ferramentas do administrador**

Mostra uma barra de ferramentas global no topo da página para os papéis de usuário designados. Esta barra de ferramentas, muito semelhante às barras do Wordpress e do Google, pode realmente acelerar ações complicadas e melhorar o espaço disponível para o conteúdo de aprendizado, mas pode ser confusa para alguns usuários.

*Padrão: `do_not_show`*

### `show_back_link_on_top_of_tree`

**Mostrar links de retorno de categorias/cursos**

Mostra um link para voltar na hierarquia de cursos. Um link está disponível na parte inferior da lista de qualquer forma.

*Padrão: `false`*

### `show_closed_courses`

**Exibir cursos fechados na página de login e na página inicial do portal?**

Exibir cursos fechados na página de login e na página inicial de cursos? Na página inicial do portal, um ícone aparecerá ao lado dos cursos para se inscrever rapidamente em cada curso. Isso só aparecerá na página inicial do portal quando o usuário estiver logado e quando o usuário ainda não estiver inscrito no portal.

*Padrão: `false`*

### `show_email_addresses`

**Mostrar endereços de e-mail**

Mostrar endereços de e-mail para os usuários.

*Padrão: `false`*

### `show_empty_course_categories`

**Mostrar categorias de cursos vazias**

Mostrar as categorias de cursos na página inicial, mesmo que estejam vazias.

*Padrão: `true`*

### `show_hot_courses`

**Mostrar cursos em destaque**

A lista de cursos em destaque será adicionada na página inicial.

*Padrão: `true`*

### `show_number_of_courses`

**Mostrar número de cursos**

Mostrar o número de cursos em cada categoria nas categorias de cursos na página inicial.

*Padrão: `false`*

---
### `show_tabs`

**Entradas do menu principal**

Marque as entradas que deseja ver aparecer no menu principal.

*Padrão:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Entradas do menu principal por função**

Defina a visibilidade das abas do cabeçalho por função.

*Padrão: `{}`*

### `showonline`

**Quem está Online**

Exibir o número de pessoas que estão online?

*Padrão: `world`*

### `table_default_row`

**Número padrão de linhas na tabela**

Quantas linhas devem ser exibidas por padrão em todas as tabelas.

*Padrão: `20`*

### `table_row_list`

**Números de paginação oferecidos por padrão nas tabelas**

Defina as opções que deseja que apareçam na navegação ao redor de uma tabela para mostrar menos ou mais linhas em uma página. Por exemplo, [50, 100, 200, 500].

*Padrão: `[10,20,50,100]`*

### `time_limit_whosonline`

**Limite de tempo para Quem está Online**

Esse limite de tempo define por quantos minutos após sua última ação um usuário será considerado *online*.

*Padrão: `30`*