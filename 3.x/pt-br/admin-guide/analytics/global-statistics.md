# Estatísticas globais

Estatísticas globais é o hub de estatísticas da plataforma — um menu de relatórios de toda a plataforma agrupados por tópico, em vez de um único relatório.

## Acessando as Estatísticas globais

No painel de administração, clique em **Analytics > Global statistics**.

## Como está organizado

Abrir a página sem nenhum relatório selecionado exibe um menu das estatísticas disponíveis, agrupadas em Cursos, Usuários, Sistema, Social e Sessão. Selecionar uma entrada do menu carrega aquele relatório específico na mesma página. Cada um é uma visão de toda a plataforma, exclusiva para administradores — não há recorte por curso ou sessão aqui; para isso, consulte [Learning Analytics](learning-analytics.md).

## Cursos

* **Courses** — Número total de cursos, detalhado por categoria de curso
* **Tools access** — Contagem em toda a plataforma de eventos de acesso a ferramentas (anúncios, documentos, fóruns, questionários, chat e assim por diante)
* **Tool-based resource count** — Escolha uma ou mais ferramentas e veja todos os cursos/sessões que as utilizam, com uma contagem de recursos e a data da última atualização, ordenados por uso
* **Latest access** — Cursos com a data do último acesso, limitados àqueles visitados dentro de um número configurável de dias (60 por padrão)
* **Number of courses by language** — Cursos agrupados pelo idioma da interface
* **Courses usage** — Contagens de visitas por curso em períodos móveis (hoje, esta semana, este mês, 6 meses, 1 ano, 2 anos, todo o período), separadas entre visitas dentro e fora de sessões

## Usuários

* **Number of users** — Total de formadores e aprendizes em toda a plataforma, e o mesmo detalhamento por categoria de curso
* **Logins** — Contagens de login de hoje, dos últimos 7 dias, dos últimos 31 dias e de todo o período, tanto para logins totais quanto para usuários distintos; pode ser filtrado para uma duração mínima de sessão
* **Logins (Month)** — Os mesmos dados de login totalizados por mês civil em todo o histórico
* **Logins (Day)** — Totais de login por dia da semana, mais um detalhamento separado apenas para os últimos 7 dias
* **Logins (Hour)** — Totais de login por hora do dia, mais um detalhamento separado apenas para as últimas 24 horas
* **Number of users (Picture)** — Quantas contas ativas enviaram uma foto de perfil versus quantas não enviaram
* **Logins by date** — Tempo total conectado de cada usuário (login até logout) em um intervalo de datas escolhido, exportável para XLS
* **Not logged in for some time** — Quantos usuários não fizeram login em janelas recentes (hoje, 7 dias, 31 dias, 6 meses) e quantos nunca fizeram login
* **Zombies** — Contas cujo último login é na data de corte escolhida ou anterior (não há limiar fixo — você escolhe a data a cada vez), opcionalmente restritas a contas ativas, com botões para ativar, desativar ou excluir as contas listadas diretamente
* **Users statistics** — Usuários registrados em um intervalo de datas escolhido, com detalhes completos do perfil e gráficos resumidos, exportável para XLS
* **Users online** — Contagens ao vivo de usuários atualmente online e de usuários atualmente fazendo um questionário, cada uma exibida em quatro janelas de tempo (3, 5, 30 e 120 minutos)
* **New users registrations** — Novos cadastros em um intervalo de datas escolhido (diário se o intervalo for de um mês ou menos, mensal com detalhamento caso contrário), mais um detalhamento de quem criou cada conta
* **Course/Session subscriptions by day** — Inscrições versus cancelamentos de inscrição por dia em um intervalo de datas escolhido
* **Duplicate users** — Encontra contas que compartilham o mesmo nome, e-mail ou um valor de campo de perfil escolhido; permite desativar, ativar ou unificar (mesclar) duplicatas — a mesclagem exclui permanentemente as contas incorporadas à que você mantém

## Sistema

* **Portal user session stats** — Uma grade de contagens de usuários detalhada por URL de acesso (em portais com várias URLs), sessão e curso, para um intervalo de datas escolhido, exportável para XLS

A entrada **Quarterly report** que também aparece em Sistema é tratada separadamente em [Corporate Reports](corporate-reports.md).

## Social

* **Number of messages received** — Mensagens internas recebidas, por usuário
* **Number of messages sent** — Mensagens internas enviadas, por usuário
* **Contacts count** — Contatos da rede social por usuário (excluindo relacionamentos do tipo RH/supervisor)

## Sessão

* **Sessions by date** — Sessões que começam ou terminam em um intervalo de datas escolhido (opcionalmente filtradas por status): contagem, média de sessões por semana, média de usuários por sessão, média de sessões por tutor, detalhamentos por categoria/idioma/status e uma tabela de contagem de sessões por curso