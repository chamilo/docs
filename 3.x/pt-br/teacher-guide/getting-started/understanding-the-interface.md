# Entendendo a Interface

O Chamilo 3.0 tem uma interface limpa e moderna, projetada para manter a navegação simples. Esta página explica cada parte da interface em detalhe.

## A Barra Superior

![A barra superior com elementos anotados, incluindo logotipo, caixa de entrada, chamado de suporte e avatar do usuário](../../.gitbook/assets/top-bar-annotated.png)

A barra superior fica sempre visível no topo de todas as páginas. Ela contém:

* **Logotipo da plataforma** — Clique nele para voltar à página inicial a qualquer momento.
* **Ícone da caixa de entrada** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Exibe suas mensagens. Um distintivo vermelho indica mensagens não lidas. Clique para abrir sua caixa de entrada.
* **Ícone de chamado de suporte** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Se habilitado pelo administrador, dá acesso ao sistema de chamados de suporte.
* **Seu avatar** — Uma imagem circular no canto superior direito. Clique nela para abrir um menu suspenso com links para o seu perfil, as configurações da conta e a saída.

## A Barra Lateral

A barra lateral à esquerda é a sua navegação principal. Ela pode ser recolhida para dar mais espaço à área de conteúdo. Clique na seta de alternância na borda direita para expandi-la ou recolhê-la. O Chamilo memoriza a sua preferência.

A barra lateral contém os seguintes links (alguns podem estar ocultos, dependendo da configuração da plataforma):

![O painel de navegação da barra lateral no estado expandido, mostrando todos os itens de menu](../../.gitbook/assets/sidebar-expanded.png)

| Item de menu | Ícone | Descrição |
|-----------|------|-------------|
| **Início** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Retorna ao painel principal |
| **Meus cursos** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Lista todos os cursos em que você está inscrito |
| **Minhas sessões** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Lista as suas sessões de formação (atuais, passadas, futuras) |
| **Explorar mais cursos** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Percorra o catálogo de cursos para encontrar novos cursos |
| **Agenda** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | O seu calendário pessoal e de cursos |
| **Relatórios** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Acesse o acompanhamento de aprendizes e os relatórios de cursos |
| **Rede social** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Conecte-se com outros usuários, envie mensagens, participe de grupos |
| **Videoconferência** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Acesse sessões de vídeo ao vivo (se configurado) |
| **Administração** | <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administração da plataforma (visível apenas para administradores) |

Na parte inferior da barra lateral, você encontrará a opção **Sair** para encerrar a sessão rapidamente quando terminar. Esta opção também está disponível no menu suspenso do ícone do avatar, no canto superior direito.
Se a plataforma for gerida por métodos de autenticação externos, essas opções de saída podem não estar disponíveis.

## A Área de Conteúdo Principal

A área central da tela exibe o conteúdo da página atual. No topo, você verá frequentemente um **caminho de navegação (breadcrumb)** mostrando a sua localização atual na plataforma (por exemplo: Início > Rock music > Documentos). Use os breadcrumbs para voltar a uma página superior.

## A Página Inicial do Curso

Ao entrar em um curso, você vê a **página inicial do curso**. Isso é tratado em detalhe na seção [Criando o Seu Curso](../creating-your-course/), mas aqui vai uma visão geral rápida:

* **Título do curso** — Exibido em destaque no topo
* **Introdução do curso** — Uma descrição opcional em texto rico que você pode editar
* **Grade de ferramentas** — Uma grade de ícones que representam as ferramentas do curso (Documentos, Exercícios, Fóruns etc.)

Como professor, você verá controles adicionais:

* **Visão do aluno** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Alterne isto para ver o curso como um aluno o veria
* **Editar introdução** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Edite o texto de introdução do curso
* **Mostrar tudo / Ocultar tudo** — Altere rapidamente a visibilidade de todas as ferramentas para os alunos
* **Ordenar** — Ative arrastar e soltar para reordenar as ferramentas na página inicial

## Cores dos ícones

Isto ainda é experimental e não está totalmente completo no Chamilo 3.0, mas estamos tentando usar as seguintes regras para todos os botões e ícones de ação na interface:

* **Verde** para ações de criação. Isso inclui adicionar, criar, importar, avaliar, salvar e copiar conteúdo.
* **Azul** para ações de visualização. Isso inclui exportar, visualizar, pré-visualizar em listas ou em visualizações detalhadas, pesquisar e baixar.
* **Laranja** para ações de edição. Isso inclui editar, mover, configurar, ativar/desativar, ocultar e mostrar.
* **Vermelho** para ações de exclusão/remoção. Isso inclui excluir, remover, cancelar inscrição.
* **Cinza** para ações de cancelamento. Apenas deixar as coisas como estão.

## Design responsivo

O Chamilo 3.0 se adapta a diferentes tamanhos de tela. Em um dispositivo móvel ou janela de navegador estreita:

* A barra lateral fica oculta por padrão e pode ser aberta tocando no ícone de menu
* Os cartões de curso são exibidos em uma única coluna em vez de uma grade
* As tabelas tornam-se roláveis horizontalmente

Isso significa que você e seus alunos podem acessar a plataforma a partir de um telefone, tablet ou computador, mas podem experimentar a interface de forma um pouco diferente.