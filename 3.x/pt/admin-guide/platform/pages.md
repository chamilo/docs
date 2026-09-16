# Páginas

Páginas é a ferramenta integrada do Chamilo, semelhante a um CMS, para os blocos de conteúdo que constituem as áreas públicas do seu portal — a página inicial, o rodapé, os menus de navegação e posicionamentos semelhantes — sem necessidade de alterar um ficheiro de modelo.

## Aceder às Páginas

No painel de administração, clique em **Plataforma > Páginas**.

## Como funcionam as Páginas

Cada página tem:

* **Título** e **conteúdo** em texto rico
* Um **slug**, gerado automaticamente a partir do título
* **Ativada** — se a página está visível no momento
* **Posição** — ordenação por arrastar e largar dentro da respetiva categoria
* **Locale** — o conteúdo é por idioma: o mesmo posicionamento pode conter uma página por idioma, e o sítio recorre ao idioma predefinido da plataforma se não existir página para o idioma do visitante
* Uma **categoria** — é isto que determina *onde* a página é apresentada (por exemplo `index`, `home`, `footer_public` ou `menu_links`); o Chamilo cria automaticamente as categorias de que necessita

Numa instalação multi-URL (multi-portal), as páginas também estão delimitadas por URL de acesso, pelo que cada portal gere o seu próprio conteúdo.

## A página de introdução ao registo

**Plataforma > Definir a página de registo** é um atalho para este mesmo sistema de Páginas, para um posicionamento específico: o texto introdutório apresentado acima do formulário público de inscrição. Está restrito a Administradores do Portal. Ao clicar, o sistema:

* Abre a página de introdução existente para edição, se já existir uma para o seu URL de acesso e idioma, ou
* Cria o posicionamento no momento e leva-o diretamente à criação do respetivo conteúdo

O que guardar aqui é apresentado como uma caixa informativa imediatamente acima do formulário de registo — um lugar natural para instruções, termos específicos da sua organização ou contexto que os utilizadores potenciais devem ler antes de se inscreverem. Deixe-a desativada (ou nunca a crie) para mostrar o formulário de registo simples, sem texto introdutório.