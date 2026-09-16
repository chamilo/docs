# Compreendendo a Interface

O Chamilo 2.0 possui uma interface limpa e moderna, projetada para manter a navegação simples. Esta página explica cada parte da interface em detalhes.

## A Barra Superior

![A barra superior com elementos anotados incluindo logotipo, caixa de entrada, ticket de suporte e avatar do usuário](/.gitbook/assets/top-bar-annotated.png)

A barra superior está sempre visível no topo de todas as páginas. Ela contém:

* **Logotipo da plataforma** — Clique nele para retornar à página inicial a qualquer momento.
* **Ícone da caixa de entrada** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Caixa de entrada" data-size="line"> — Mostra suas mensagens. Um distintivo vermelho indica mensagens não lidas. Clique para abrir sua caixa de entrada.
* **Ícone de ticket de suporte** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Suporte" data-size="line"> — Se habilitado pelo administrador, isso dá acesso ao sistema de tickets de suporte.
* **Seu avatar** — Uma imagem circular no canto superior direito. Clique nela para abrir um menu suspenso com links para seu perfil, configurações de conta e logout.

## A Barra Lateral

A barra lateral à esquerda é sua principal navegação. Ela pode ser recolhida para dar mais espaço à área de conteúdo. Clique na seta de alternância na borda direita para expandi-la ou recolhê-la. O Chamilo lembra sua preferência.

A barra lateral contém os seguintes links (alguns podem estar ocultos dependendo da configuração da sua plataforma):

![O painel de navegação da barra lateral em seu estado expandido mostrando todos os itens do menu](/.gitbook/assets/sidebar-expanded.png)

| Item do menu | Ícone | Descrição |
|--------------|-------|-----------|
| **Início** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Início" data-size="line"> | Retorna ao painel principal |
| **Meus cursos** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Cursos" data-size="line"> | Lista todos os cursos nos quais você está inscrito |
| **Minhas sessões** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessões" data-size="line"> | Lista suas sessões de treinamento (atuais, passadas, futuras) |
| **Explorar mais cursos** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catálogo" data-size="line"> | Navegue pelo catálogo de cursos para encontrar novos cursos |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Seu calendário pessoal e de cursos |
| **Relatórios** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Relatórios" data-size="line"> | Acesse o rastreamento de alunos e relatórios de cursos |
| **Rede social** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Rede social" data-size="line"> | Conecte-se com outros usuários, envie mensagens, participe de grupos |
| **Videoconferência** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Vídeo" data-size="line"> | Acesse sessões de vídeo ao vivo (se configurado) |
| **Administração** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administração da plataforma (visível apenas para administradores) |

Na parte inferior da barra lateral, você encontrará uma opção de **Sair** para encerrar a sessão rapidamente quando terminar. Essa opção também está disponível no menu suspenso do ícone do seu avatar no canto superior direito.
Se a plataforma for gerenciada por métodos de autenticação externos, essas opções de logout podem não estar disponíveis.

## A Área de Conteúdo Principal

A área central da tela exibe o conteúdo da página atual. No topo, você frequentemente verá um **caminho de navegação** (breadcrumb trail) mostrando sua localização atual na plataforma (por exemplo: Início > Música Rock > Documentos). Use os breadcrumbs para navegar de volta a uma página anterior.

## A Página Inicial do Curso

Ao entrar em um curso, você verá a **página inicial do curso**. Isso é abordado em detalhes na seção [Criando Seu Curso](../creating-your-course/), mas aqui está uma visão geral rápida:

* **Título do curso** — Exibido de forma proeminente no topo
* **Introdução ao curso** — Uma descrição opcional em texto rico que você pode editar
* **Grade de ferramentas** — Uma grade de ícones representando as ferramentas do curso (Documentos, Exercícios, Fóruns, etc.)

Como professor, você verá controles adicionais:

* **Visão do aluno** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visão do aluno" data-size="line"> — Alterne isso para ver o curso como um aluno o veria
* **Editar introdução** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> — Edite o texto de introdução do curso
* **Mostrar tudo / Ocultar tudo** — Altere rapidamente a visibilidade de todas as ferramentas para os alunos
* **Ordenar** — Habilite arrastar e soltar para reordenar as ferramentas na página inicial

## Cores dos ícones

Isso ainda é experimental e não está totalmente completo no Chamilo 2.0, mas estamos tentando seguir as seguintes regras para todos os botões e ícones de ação na interface:

* **Verde** para ações de criação. Isso inclui adicionar, criar, importar, avaliar, salvar e copiar conteúdo.
* **Azul** para ações de visualização. Isso inclui exportar, visualizar, pré-visualizar em listas ou em visualizações detalhadas, pesquisar e fazer download.
* **Laranja** para ações de edição. Isso inclui editar, mover, configurar, ativar/desativar, ocultar e exibir.
* **Vermelho** para ações de exclusão/remoção. Isso inclui deletar, remover, cancelar inscrição.
* **Cinza** para ações de cancelamento. Apenas deixando as coisas no status quo.

## Design Responsivo

O Chamilo 2.0 se adapta a diferentes tamanhos de tela. Em um dispositivo móvel ou janela de navegador estreita:

* A barra lateral fica oculta por padrão e pode ser aberta ao tocar no ícone de menu
* Os cartões de curso são exibidos em uma única coluna em vez de uma grade
* As tabelas tornam-se roláveis horizontalmente

Isso significa que você e seus alunos podem acessar a plataforma a partir de um telefone, tablet ou computador, mas podem experimentar a interface de maneira ligeiramente diferente.