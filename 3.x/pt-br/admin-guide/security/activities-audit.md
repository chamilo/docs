# Auditoria de Atividades

O relatório de Auditoria de Atividades permite navegar por atividades administrativas e da plataforma importantes, filtradas por tipo de evento. É o mesmo relatório subjacente anteriormente acessível em **Acompanhamento > Auditoria de atividade administrativa**; agora também está vinculado diretamente a partir do bloco Segurança, pois se trata principalmente de uma ferramenta de segurança e responsabilização.

## Acessando a Auditoria de Atividades

No painel de administração, clique em **Segurança > Auditoria de atividades**.

## O Que Ele Mostra

![A página de auditoria de atividades listando categorias de tipos de evento como Curso, Sessão, Usuário, Social, Mensagem, Recurso, Wiki e Outros, cada uma expansível em tipos de evento individuais](../../.gitbook/assets/admin-security-activities-audit.png)

Os eventos são agrupados em categorias:

* **Course** — Criação, exclusão e alterações de configurações de cursos
* **Session** — Criação, exclusão e alterações de matrícula de sessões e categorias de sessão
* **User** — Criação e exclusão de contas, atualizações de senha, alterações de campos e muito mais
* **Social** — Criação, exclusão e alterações de associação de grupos sociais
* **Message** — Alterações e exclusões de dados de mensagens
* **Resource** — Criação e exclusão de recursos e vínculos de recursos
* **Wiki** — Visualizações de páginas wiki
* **Other** — Todo o restante, incluindo atividade de plugins, bloqueio de boletins, exclusões de tentativas de exercícios, tentativas de login forçado e alterações de configurações no nível da plataforma

Clique em um chip de tipo de evento (por exemplo, **Attempted Forced Login**) para filtrar o relatório até uma tabela de entradas correspondentes. Você também pode pesquisar diretamente por palavra-chave usando o campo **Search** acima da lista de tipos de evento.

## Casos de Uso

* Investigar quem excluiu um curso, uma sessão ou uma conta de usuário, e quando
* Confirmar se uma alteração administrativa específica (uma atualização de configurações, uma instalação de plugin) foi feita por um administrador esperado
* Acompanhar eventos **Attempted Forced Login** em conjunto com o relatório [Tentativas de login](login-attempts.md)