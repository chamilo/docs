# Páginas

Páginas é a ferramenta integrada do Chamilo, semelhante a um CMS, para os blocos de conteúdo que compõem as áreas públicas do seu portal — a página inicial, o rodapé, os menus de navegação e posicionamentos semelhantes — sem precisar alterar um arquivo de modelo.

## Acessando Páginas

No painel de administração, clique em **Plataforma > Páginas**.

## Como as Páginas Funcionam

Cada página possui:

* **Título** e **conteúdo** em texto rico
* Um **slug**, gerado automaticamente a partir do título
* **Habilitada** — se a página está visível no momento
* **Posição** — ordenação por arrastar e soltar dentro da sua categoria
* **Localidade** — o conteúdo é por idioma: o mesmo posicionamento pode conter uma página por idioma, e o site recorre ao idioma padrão da plataforma se não existir página para o idioma do visitante
* Uma **categoria** — é o que determina *onde* a página é renderizada (por exemplo `index`, `home`, `footer_public` ou `menu_links`); o Chamilo cria automaticamente as categorias de que precisa

Em uma instalação com vários URLs (vários portais), as páginas também são delimitadas por URL de acesso, de modo que cada portal gerencia o próprio conteúdo.

## A Página de Introdução ao Cadastro

**Plataforma > Definir a página de cadastro** é um atalho para este mesmo sistema de Páginas, para um posicionamento específico: o texto introdutório exibido acima do formulário público de inscrição. Está restrito a Administradores do Portal. Ao clicar, o sistema:

* Abre a página de introdução existente para edição, se já houver uma para o seu URL de acesso e idioma, ou
* Cria o posicionamento na hora e leva você diretamente à criação do conteúdo

Tudo o que você salvar aqui é renderizado como uma caixa de informações diretamente acima do formulário de cadastro — um lugar natural para instruções, termos específicos da sua organização ou contexto que os usuários em potencial devem ler antes de se inscrever. Deixe-a desabilitada (ou nunca a crie) para exibir o formulário de cadastro simples, sem texto introdutório.