# URLs de Acesso

As URLs de Acesso permitem que uma única instalação do Chamilo atenda a vários portais separados.

Esta ferramenta também está acessível a partir do bloco [Plataforma](../platform/README.md) do painel de administração, como **Configurar várias URLs de acesso**.


## Casos de Uso

* **Implantações multi-inquilino** — Hospedar portais de treinamento separados para diferentes organizações em um único servidor
* **Portais departamentais** — Dar a cada departamento o seu próprio portal com identidade visual (p. ex., `hr.training.company.com`, `it.training.company.com`)
* **Portais regionais** — Portais separados para diferentes regiões ou idiomas

## Como Funciona

Cada URL de acesso é um ponto de entrada separado para a mesma instalação do Chamilo:

* Os usuários podem ser atribuídos a uma ou mais URLs de acesso
* Cursos e sessões pertencem a URLs de acesso específicas
* As configurações da plataforma podem ser personalizadas por URL de acesso
* A identidade visual e os temas podem diferir por URL
* Os usuários de um portal não conseguem ver usuários ou cursos de outro (a menos que sejam explicitamente compartilhados)

## Configuração

### Ativando Multi-URL

O Multi-URL deve ser ativado na configuração do Chamilo (normalmente nas configurações de ambiente). Isso geralmente é feito durante a configuração inicial.

### Criando uma URL de Acesso

1. No painel de administração, navegue até **URLs de Acesso**
2. Clique em **Adicionar URL**
3. Informe a URL (p. ex., `https://portal2.yoursite.com`) e uma descrição
4. Opcionalmente, escolha uma **URL pai** para aninhar esta URL sob outra — consulte [Hierarquia de URLs](#url-hierarchy) abaixo
5. Salve

### Atribuindo Usuários e Cursos

* **Usuários** — Atribua usuários a URLs de acesso específicas. Um usuário pode pertencer a várias URLs.
* **Cursos** — Atribua cursos a URLs de acesso específicas
* **Sessões** — Atribua sessões a URLs de acesso específicas

### Configurações por URL

Cada URL de acesso pode ter os seus próprios:

* **Tema de cores** — Identidade visual diferente
* **Nome da plataforma e logotipo** — Identidade personalizada
* **Substituições de configurações** — Determinadas configurações da plataforma podem ser personalizadas por URL

## Hierarquia de URLs

As URLs de acesso podem ser organizadas em uma árvore pai/filho em vez de uma lista plana. Ao criar ou editar uma URL, um Administrador Global irrestrito (consulte [Administradores de Subárvore](#subtree-administrators) abaixo) pode escolher qualquer outra URL como sua **URL pai**:

![Diálogo de edição de URL com a lista suspensa URL pai aberta, listando as outras URLs de acesso disponíveis como pai](../../.gitbook/assets/admin-access-url-parent-select.png)

* A lista suspensa nunca oferece a URL que está sendo editada, nem qualquer um dos seus próprios descendentes, como possível pai — isso impede a criação de um ciclo. O backend revalida isso independentemente do que a interface mostra.
* Se uma URL for criada sem escolher um pai, ela assume por padrão a **URL somente de login** se existir uma (consulte [Configurações por URL](#per-url-settings) acima), ou, caso contrário, a primeira URL de acesso — o mesmo comportamento padrão de antes desta funcionalidade existir.
* A URL mais alta de uma árvore — aquela sem pai — é a **raiz** dessa árvore. Uma única instalação do Chamilo pode hospedar mais de uma árvore independente.

Onde quer que as URLs de acesso sejam listadas — o painel Multi-URL e a página de gerenciamento de URLs de Acesso — a árvore é mostrada por meio de recuo, um pai imediatamente seguido pelos seus próprios filhos (irmãos ordenados alfabeticamente), em vez de uma coluna "Pai" separada:

![Lista de URLs de Acesso mostrando uma URL raiz com duas URLs filhas, uma das quais tem a sua própria URL filha, recuadas para refletir a hierarquia](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Administradores de Subárvore

A hierarquia de URLs também determina o que um [Administrador Global](../users/user-roles.md) pode gerenciar:

* Um registrado na URL **raiz** de uma árvore é **irrestrito**: ele gerencia todas as URLs de acesso, exatamente como antes desta funcionalidade existir.
* Um registrado apenas em uma URL **não raiz** é **com escopo**: as páginas Multi-URL e URLs de Acesso mostram apenas essa URL e os seus descendentes, e o gráfico de logins no painel Multi-URL lê "Logins (suas URLs)" em vez de "Logins (todas as URLs combinadas)".

Independentemente do escopo, o seguinte permanece reservado a um Administrador Global **irrestrito** — um administrador com escopo não pode executá-los mesmo para URLs dentro da sua própria subárvore:

* Criar uma nova URL de acesso
* Editar a própria URL, a descrição ou o pai de uma URL de acesso
* Ativar ou desativar uma URL de acesso
* Excluir uma URL de acesso (a URL raiz de toda a instalação nunca pode ser excluída, por ninguém)
* Registrar-se em todas as URLs de acesso de uma só vez

Um administrador com escopo ainda pode gerenciar tudo o que está *atribuído às* URLs da sua subárvore — usuários, cursos, sessões, identidade visual e configurações — apenas não as próprias entradas de URL de acesso.

## Dicas

* **Decida cedo** — Se optar por uma configuração multi-URL, você deve fazer isso no início do seu projeto Chamilo, pois é necessário deixar a primeira URL relativamente vazia de conteúdo. Ativar o multi-URL depois é mais desafiador (exige alterações manuais nos bancos de dados).
* **Planeje a estrutura de URLs** — Defina o esquema de URLs antes de criar as URLs de acesso, pois alterar URLs posteriormente afeta todos os links e favoritos existentes
* **Configuração de DNS** — Cada URL de acesso deve resolver para o mesmo servidor Chamilo. Configure os registros DNS de acordo.
* **Administrador global** — Use o papel de Administrador Global para gerenciar em todas as URLs de acesso. Para delegar a gestão de apenas um ramo, registre o administrador em uma URL que não seja a raiz — consulte [Administradores de subárvore](#subtree-administrators)