# Definições de acompanhamento

Predefinições relacionadas com o acompanhamento — o que é registado, que relatórios são expostos, regras de cálculo de tempo.

Aceda a estas definições em **Administração > Definições de configuração > Acompanhamento**. Esta categoria contém **10 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `block_my_progress_page`

**Impedir o acesso a «O meu progresso»**

Em implementações específicas, como exames em linha, poderá querer impedir o acesso dos utilizadores à página «O meu progresso».

*Predefinição: `false`*

### `footer_extra_content`

**Conteúdo extra no rodapé**

Pode adicionar código HTML, como meta tags

### `header_extra_content`

**Conteúdo extra no cabeçalho**

Pode adicionar código HTML, como meta tags

### `meta_description`

**Meta description**

Isto mostrará uma meta OpenGraph Description (og:description) nos cabeçalhos do seu sítio

### `meta_image_path`

**Caminho da imagem meta**

Este caminho da imagem meta é o caminho para um ficheiro dentro do seu diretório Chamilo (p. ex. home/image.png) que deverá aparecer num cartão do Twitter ou num cartão OpenGraph ao mostrar uma hiperligação para o seu LMS. O Twitter recomenda uma imagem de 120 x 120 píxeis, que por vezes pode ser recortada para 120x90.

### `meta_title`

**Título meta OpenGraph**

Isto mostrará uma meta OpenGraph Title (og:title) nos cabeçalhos do seu sítio

### `meta_twitter_creator`

**Conta Twitter Creator**

O Twitter Creator é uma conta do Twitter (p. ex. @ywarnier) que representa a *pessoa* que criou o sítio. Este campo é opcional.

### `meta_twitter_site`

**Conta Twitter Site**

O Twitter site é uma conta do Twitter (p. ex. @chamilo_news) relacionada com o seu sítio. Costuma ser uma conta mais temporária do que a conta Twitter creator, ou representa uma entidade (em vez de uma pessoa). Este campo é obrigatório se pretender que os campos meta do cartão do Twitter sejam apresentados.

### `my_progress_course_tools_order`

**Ordem das ferramentas na página «O meu progresso»**

Altere a ordem das ferramentas apresentadas na página «O meu progresso» para os formandos. As opções incluem 'quizzes', 'learning_paths' e 'skills'.

### `tracking_skip_generic_data`

**Omitir dados genéricos na página de autoacompanhamento do formando**

Se a página «O meu progresso» demorar demasiado a carregar, poderá querer remover o processamento de estatísticas genéricas do utilizador. Nesse caso, ative esta definição.

*Predefinição: `false`*