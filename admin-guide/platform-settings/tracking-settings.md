# Configurações de Rastreamento

Padrões relacionados ao rastreamento — o que é registrado, quais relatórios são expostos, regras de cálculo de tempo.

Acesse essas configurações em **Administração > Configurações de configuração > Rastreamento**. Esta categoria contém **10 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `block_my_progress_page`

**Impedir acesso à página 'Meu progresso'**

Em implementações específicas, como exames online, você pode querer impedir o acesso dos usuários à página 'Meu progresso'.

*Padrão: `false`*

### `footer_extra_content`

**Conteúdo extra no rodapé**

Você pode adicionar código HTML, como meta tags.

### `header_extra_content`

**Conteúdo extra no cabeçalho**

Você pode adicionar código HTML, como meta tags.

### `meta_description`

**Descrição meta**

Isso exibirá uma meta descrição OpenGraph (og:description) nos cabeçalhos do seu site.

### `meta_image_path`

**Caminho da imagem meta**

Este caminho de imagem meta é o caminho para um arquivo dentro do seu diretório Chamilo (por exemplo, home/image.png) que deve aparecer em um cartão do Twitter ou em um cartão OpenGraph ao exibir um link para o seu LMS. O Twitter recomenda uma imagem de 120 x 120 pixels, que às vezes pode ser cortada para 120x90.

### `meta_title`

**Título meta OpenGraph**

Isso exibirá um meta título OpenGraph (og:title) nos cabeçalhos do seu site.

### `meta_twitter_creator`

**Conta do Criador no Twitter**

O Criador do Twitter é uma conta do Twitter (por exemplo, @ywarnier) que representa a *pessoa* que criou o site. Este campo é opcional.

### `meta_twitter_site`

**Conta do Site no Twitter**

O site do Twitter é uma conta do Twitter (por exemplo, @chamilo_news) que está relacionada ao seu site. Geralmente é uma conta mais temporária do que a conta do criador do Twitter ou representa uma entidade (em vez de uma pessoa). Este campo é obrigatório se você quiser que os campos meta do cartão do Twitter sejam exibidos.

### `my_progress_course_tools_order`

**Ordem das ferramentas na página 'Meu progresso'**

Altere a ordem das ferramentas exibidas na página 'Meu progresso' para os alunos. As opções incluem 'quizzes', 'learning_paths' e 'skills'.

### `tracking_skip_generic_data`

**Omitir dados genéricos na página de auto-rastreamento do aluno**

Se a página 'Meu progresso' demorar muito para carregar, você pode querer remover o processamento de estatísticas genéricas para o usuário. Nesse caso, ative esta configuração.

*Padrão: `false`*