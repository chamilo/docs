# URLs de Acesso

As URLs de Acesso permitem que uma única instalação do Chamilo sirva vários portais separados.

Esta ferramenta também está acessível a partir do bloco [Plataforma](../platform/README.md) do painel de administração, como **Configurar múltiplas URLs de acesso**.


## Casos de Uso

* **Implantações multi-inquilino** — Alojar portais de formação separados para diferentes organizações num único servidor
* **Portais departamentais** — Dar a cada departamento o seu próprio portal com identidade visual (p. ex., `hr.training.company.com`, `it.training.company.com`)
* **Portais regionais** — Portais separados para diferentes regiões ou idiomas

## Como Funciona

Cada URL de acesso é um ponto de entrada separado para a mesma instalação do Chamilo:

* Os utilizadores podem ser atribuídos a uma ou mais URLs de acesso
* Os cursos e as sessões pertencem a URLs de acesso específicas
* As definições da plataforma podem ser personalizadas por URL de acesso
* A identidade visual e os temas podem diferir por URL
* Os utilizadores de um portal não conseguem ver utilizadores ou cursos de outro (salvo se forem partilhados explicitamente)

## Configuração

### Ativar Multi-URL

A funcionalidade Multi-URL deve ser ativada na configuração do Chamilo (normalmente nas definições de ambiente). Isto é geralmente feito durante a configuração inicial.

### Criar uma URL de Acesso

1. A partir do painel de administração, navegue até **URLs de Acesso**
2. Clique em **Adicionar URL**
3. Introduza a URL (p. ex., `https://portal2.yoursite.com`) e uma descrição
4. Opcionalmente, escolha uma **URL principal** para aninhar esta URL sob outra — consulte [Hierarquia de URLs](#url-hierarchy) abaixo
5. Guarde

### Atribuir Utilizadores e Cursos

* **Utilizadores** — Atribua utilizadores a URLs de acesso específicas. Um utilizador pode pertencer a várias URLs.
* **Cursos** — Atribua cursos a URLs de acesso específicas
* **Sessões** — Atribua sessões a URLs de acesso específicas

### Definições por URL

Cada URL de acesso pode ter as suas próprias:

* **Tema de cores** — Identidade visual diferente
* **Nome e logótipo da plataforma** — Identidade personalizada
* **Substituições de definições** — Determinadas definições da plataforma podem ser personalizadas por URL

## Hierarquia de URLs

As URLs de acesso podem ser organizadas numa árvore pai/filho em vez de numa lista plana. Ao criar ou editar uma URL, um Administrador Global sem restrições (consulte [Administradores de Subárvore](#subtree-administrators) abaixo) pode escolher qualquer outra URL como **URL principal**:

![Diálogo Editar URL com a lista pendente URL principal aberta, listando as outras URLs de acesso disponíveis como principal](../../.gitbook/assets/admin-access-url-parent-select.png)

* A lista pendente nunca oferece a URL que está a ser editada, nem qualquer um dos seus próprios descendentes, como possível principal — isto impede a criação de um ciclo. O backend revalida isto independentemente do que a interface mostra.
* Se uma URL for criada sem escolher uma principal, assume por omissão a **URL apenas de início de sessão** se existir uma (consulte [Definições por URL](#per-url-settings) acima), ou, caso contrário, a primeira URL de acesso — o mesmo comportamento predefinido de antes desta funcionalidade existir.
* A URL mais elevada de uma árvore — aquela sem principal — é a **raiz** dessa árvore. Uma única instalação do Chamilo pode alojar mais do que uma árvore independente.

Onde quer que as URLs de acesso sejam listadas — o painel Multi-URL e a página de gestão de URLs de Acesso — a árvore é mostrada através de indentação, um principal imediatamente seguido pelos seus próprios filhos (irmãos ordenados alfabeticamente), em vez de uma coluna separada "Principal":

![Lista de URLs de Acesso a mostrar uma URL raiz com duas URLs filhas, uma das quais tem a sua própria URL filha, indentadas para refletir a hierarquia](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Administradores de Subárvore

A hierarquia de URLs também determina o que um [Administrador Global](../users/user-roles.md) pode gerir:

* Um registado na URL **raiz** de uma árvore é **sem restrições**: gere todas as URLs de acesso, exatamente como antes desta funcionalidade existir.
* Um registado apenas numa URL **não raiz** é **com âmbito limitado**: as páginas Multi-URL e URLs de Acesso mostram apenas essa URL e os seus descendentes, e o gráfico de inícios de sessão no painel Multi-URL lê "Inícios de sessão (as suas URLs)" em vez de "Inícios de sessão (todas as URLs combinadas)".

Independentemente do âmbito, o seguinte permanece reservado a um Administrador Global **sem restrições** — um administrador com âmbito limitado não as pode executar mesmo para URLs dentro da sua própria subárvore:

* Criar uma nova URL de acesso
* Editar a própria URL, a descrição ou a principal de uma URL de acesso
* Ativar ou desativar uma URL de acesso
* Eliminar uma URL de acesso (a URL raiz de toda a instalação nunca pode ser eliminada, por ninguém)
* Registar-se a si próprios em todas as URLs de acesso de uma só vez

Um administrador com âmbito limitado pode ainda gerir tudo o que está *atribuído a* as URLs na sua subárvore — utilizadores, cursos, sessões, identidade visual e definições — apenas não as próprias entradas de URL de acesso.

## Dicas

* **Decida cedo** — Se optar por uma configuração de múltiplos URLs, deve fazê-lo no início do seu projeto Chamilo, pois é necessário deixar o primeiro URL relativamente vazio de conteúdo. Ativar o multi-URL posteriormente é mais complexo (exige alterações manuais nas bases de dados).
* **Planeie a estrutura de URLs** — Decida o esquema de URLs antes de criar os URLs de acesso, pois alterar URLs mais tarde afeta todas as ligações e marcadores existentes
* **Configuração de DNS** — Cada URL de acesso deve resolver para o mesmo servidor Chamilo. Configure os registos DNS em conformidade.
* **Administrador global** — Utilize o papel de Global Administrator para gerir em todos os URLs de acesso. Para delegar a gestão de apenas um ramo, registe o administrador num URL que não seja o raiz — consulte [Administradores de subárvore](#subtree-administrators)