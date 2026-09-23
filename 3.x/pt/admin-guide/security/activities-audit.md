# Auditoria de Atividades

O relatório de Auditoria de Atividades permite consultar atividades administrativas e da plataforma importantes, filtradas por tipo de evento. É o mesmo relatório subjacente anteriormente acessível em **Acompanhamento > Auditoria de atividade administrativa**; agora também está ligado diretamente a partir do bloco Segurança, uma vez que se trata principalmente de uma ferramenta de segurança e responsabilização.

## Aceder à Auditoria de Atividades

No painel de administração, clique em **Segurança > Auditoria de atividades**.

## O Que Mostra

![A página de auditoria de atividades listando categorias de tipos de evento como Curso, Sessão, Utilizador, Social, Mensagem, Recurso, Wiki e Outro, cada uma expansível em tipos de evento individuais](../../.gitbook/assets/admin-security-activities-audit.png)

Os eventos estão agrupados em categorias:

* **Curso** — Criação, eliminação e alterações de definições de cursos
* **Sessão** — Criação, eliminação e alterações de inscrição de sessões e categorias de sessão
* **Utilizador** — Criação e eliminação de contas, atualizações de palavra-passe, alterações de campos e mais
* **Social** — Criação, eliminação e alterações de adesão de grupos sociais
* **Mensagem** — Alterações e eliminações de dados de mensagens
* **Recurso** — Criação e eliminação de recursos e ligações a recursos
* **Wiki** — Visualizações de páginas wiki
* **Outro** — Tudo o resto, incluindo atividade de plugins, bloqueio do boletim de notas, eliminações de tentativas de exercícios, tentativas de início de sessão forçado e alterações de definições ao nível da plataforma

Clique num chip de tipo de evento (por exemplo **Tentativa de início de sessão forçado**) para filtrar o relatório até uma tabela de entradas correspondentes. Também pode pesquisar diretamente por palavra-chave utilizando o campo **Pesquisar** acima da lista de tipos de evento.

## Casos de Utilização

* Investigar quem eliminou um curso, uma sessão ou uma conta de utilizador, e quando
* Confirmar se uma alteração administrativa específica (uma atualização de definições, uma instalação de plugin) foi feita por um administrador esperado
* Acompanhar eventos de **Tentativa de início de sessão forçado** em conjunto com o relatório [Tentativas de início de sessão](login-attempts.md)