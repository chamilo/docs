# Compreendendo a Interface

O Chamilo 3.0 possui uma interface limpa e moderna, concebida para manter a navegação simples. Esta página explica cada parte da interface em detalhe.

## A Barra Superior

![A barra superior com elementos anotados, incluindo logótipo, caixa de entrada, ticket de suporte e avatar do utilizador](/.gitbook/assets/top-bar-annotated.png)

A barra superior está sempre visível no topo de todas as páginas. Contém:

* **Logótipo da plataforma** — Clique nele para regressar à página inicial a qualquer momento.
* **Ícone da caixa de entrada** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Caixa de entrada" data-size="line"> — Mostra as suas mensagens. Um distintivo vermelho indica mensagens não lidas. Clique para abrir a caixa de entrada.
* **Ícone de ticket de suporte** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Suporte" data-size="line"> — Se estiver ativado pelo administrador, dá-lhe acesso ao sistema de tickets de suporte.
* **O seu avatar** — Uma imagem circular no canto superior direito. Clique nela para abrir um menu pendente com ligações para o seu perfil, definições da conta e terminar sessão.

## A Barra Lateral

A barra lateral à esquerda é a sua navegação principal. Pode ser recolhida para dar mais espaço à área de conteúdo. Clique na seta de alternância na sua extremidade direita para expandir ou recolher. O Chamilo memoriza a sua preferência.

A barra lateral contém as seguintes ligações (algumas podem estar ocultas consoante a configuração da plataforma):

![O painel de navegação da barra lateral no estado expandido, mostrando todos os itens de menu](/.gitbook/assets/sidebar-expanded.png)

| Item de menu | Ícone | Descrição |
|-----------|------|-------------|
| **Início** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Início" data-size="line"> | Regressa ao painel principal |
| **Os meus cursos** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Cursos" data-size="line"> | Lista todos os cursos em que está inscrito |
| **As minhas sessões** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessões" data-size="line"> | Lista as suas sessões de formação (atuais, passadas, futuras) |
| **Explorar mais cursos** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catálogo" data-size="line"> | Percorra o catálogo de cursos para encontrar novos cursos |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | O seu calendário pessoal e de cursos |
| **Relatórios** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Relatórios" data-size="line"> | Aceda ao acompanhamento dos formandos e aos relatórios dos cursos |
| **Rede social** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Rede social" data-size="line"> | Ligue-se a outros utilizadores, envie mensagens, junte-se a grupos |
| **Videoconferência** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Vídeo" data-size="line"> | Aceda a sessões de vídeo em direto (se configurado) |
| **Administração** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administração da plataforma (visível apenas para administradores) |

No fundo da barra lateral, encontrará a opção **Terminar sessão** para sair rapidamente quando terminar. Esta opção também está disponível no menu pendente do ícone do avatar, no canto superior direito.
Se a plataforma for gerida através de métodos de autenticação externos, estas opções de terminar sessão poderão não estar disponíveis.

## A Área de Conteúdo Principal

A área central do ecrã apresenta o conteúdo da página atual. No topo, verá frequentemente uma **trilha de navegação** que indica a sua localização atual na plataforma (por exemplo: Início > Rock music > Documents). Utilize a trilha de navegação para regressar a uma página superior.

## A Página Inicial do Curso

Quando entra num curso, vê a **página inicial do curso**. Isto é tratado em detalhe na secção [Criar o Seu Curso](../creating-your-course/), mas aqui fica uma visão geral rápida:

* **Título do curso** — Apresentado de forma destacada no topo
* **Introdução do curso** — Uma descrição opcional em texto formatado que pode editar
* **Grelha de ferramentas** — Uma grelha de ícones que representam as ferramentas do curso (Documents, Exercises, Forums, etc.)

Como professor, verá controlos adicionais:

* **Vista de estudante** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Vista de estudante" data-size="line"> — Alterne isto para ver o curso como um estudante o veria
* **Editar introdução** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> — Edite o texto de introdução do curso
* **Mostrar tudo / Ocultar tudo** — Altere rapidamente a visibilidade de todas as ferramentas para os estudantes
* **Ordenar** — Ative arrastar e largar para reordenar as ferramentas na página inicial

## Cores dos ícones

Isto ainda é experimental e não está completamente implementado no Chamilo 3.0, mas estamos a tentar aplicar as seguintes regras a todos os botões e ícones de ação da interface:

* **Verde** para ações de criação. Inclui adicionar, criar, importar, classificar, guardar e copiar conteúdo.
* **Azul** para ações de visualização. Inclui exportar, visualizar, pré-visualizar em listas ou em vistas detalhadas, pesquisar e descarregar.
* **Laranja** para ações de edição. Inclui editar, mover, configurar, ativar/desativar, ocultar e mostrar.
* **Vermelho** para ações de eliminação/remoção. Inclui eliminar, remover, anular a inscrição.
* **Cinzento** para ações de cancelamento. Apenas deixar as coisas no estado atual.

## Design responsivo

O Chamilo 3.0 adapta-se a diferentes tamanhos de ecrã. Num dispositivo móvel ou numa janela de navegador estreita:

* A barra lateral fica oculta por predefinição e pode ser aberta ao tocar no ícone de menu
* Os cartões de curso são apresentados numa única coluna em vez de numa grelha
* As tabelas tornam-se deslocáveis horizontalmente

Isto significa que você e os seus formandos podem aceder à plataforma a partir de um telemóvel, tablet ou computador, mas poderão experienciar a interface de forma ligeiramente diferente.