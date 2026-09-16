# Configurações de rastreamento

Padrões relacionados ao rastreamento — o que é registrado, quais relatórios são expostos, regras de cálculo de tempo.

Acesse estas configurações em **Administração > Configurações > Rastreamento**. Esta categoria contém **10 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `block_my_progress_page`

**Impedir acesso a 'Meu progresso'**

Em implementações específicas, como exames online, você pode querer impedir o acesso do usuário à página 'Meu progresso'.

*Padrão: `false`*

### `footer_extra_content`

**Conteúdo extra no rodapé**

Você pode adicionar código HTML, como meta tags

### `header_extra_content`

**Conteúdo extra no cabeçalho**

Você pode adicionar código HTML, como meta tags

### `meta_description`

**Meta description**

Isso exibirá uma meta OpenGraph Description (og:description) nos cabeçalhos do seu site

### `meta_image_path`

**Caminho da meta image**

Este caminho da Meta Image é o caminho para um arquivo dentro do diretório do Chamilo (por exemplo, home/image.png) que deve aparecer em um card do Twitter ou em um card OpenGraph ao exibir um link para o seu LMS. O Twitter recomenda uma imagem de 120 x 120 pixels, que às vezes pode ser recortada para 120x90.

### `meta_title`

**Título meta OpenGraph**

Isso exibirá uma meta OpenGraph Title (og:title) nos cabeçalhos do seu site

### `meta_twitter_creator`

**Conta Twitter Creator**

O Twitter Creator é uma conta do Twitter (por exemplo, @ywarnier) que representa a *pessoa* que criou o site. Este campo é opcional.

### `meta_twitter_site`

**Conta Twitter Site**

O Twitter site é uma conta do Twitter (por exemplo, @chamilo_news) relacionada ao seu site. Geralmente é uma conta mais temporária do que a conta Twitter creator, ou representa uma entidade (em vez de uma pessoa). Este campo é obrigatório se você quiser que os campos meta do card do Twitter sejam exibidos.

### `my_progress_course_tools_order`

**Ordem das ferramentas na página 'Meu progresso'**

Altere a ordem das ferramentas exibidas na página 'Meu progresso' para os alunos. As opções incluem 'quizzes', 'learning_paths' e 'skills'.

### `tracking_skip_generic_data`

**Omitir dados genéricos na página de autoacompanhamento do aluno**

Se a página 'Meu progresso' demorar demais para carregar, você pode querer remover o processamento de estatísticas genéricas do usuário. Nesse caso, ative esta configuração.

*Padrão: `false`*