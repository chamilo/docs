# Configurações da Plataforma

O Chamilo possui um sistema de configuração extenso com ajustes organizados em categorias. O conjunto completo de categorias abaixo reflete a página de **Configurações de configuração** no painel de administração — e o arquivo subjacente `SettingsCurrentFixtures.php` no código-fonte, que é a fonte de verdade para nomes de variáveis, títulos e descrições.

Acesse as configurações da plataforma a partir do painel de administração clicando em **Configurações de configuração**.

![Página de configurações da plataforma mostrando categorias de configuração organizadas por área funcional](/.gitbook/assets/admin-settings-categories.png)

## Todas as categorias

Existem **39 categorias de configuração** no total, listadas alfabeticamente abaixo. O número após cada link indica a quantidade de configurações naquela categoria.

### Abrangência da plataforma

* **[Identidade do Administrador](admin-settings.md)** (12) — Identidade e detalhes de contato do administrador da plataforma.
* **[Plataforma](platform-settings.md)** (29) — Identidade no nível da plataforma, fuso horário, política de registro, usuários online, flags de desempenho.
* **[Exibição](display-settings.md)** (24) — Layout da página inicial, gravatar, menus, comportamento de marca.
* **[Editor](editor-settings.md)** (26) — Barras de ferramentas do editor de texto rico (TinyMCE), plugins, assistentes de IA.
* **[Idiomas](language-settings.md)** (12) — Idiomas disponíveis, idioma padrão, alternativas.
* **[E-mail](mail-settings.md)** (18) — Layout de e-mails enviados, identidade do remetente, assinatura.
* **[Fluxos de Trabalho](workflows-settings.md)** (23) — Alternâncias de fluxos de trabalho transversais (criação de cursos, validação de matrículas...).

### Autenticação, segurança e privacidade

* **[Segurança](security-settings.md)** (31) — Proteção de login, política de senha, cabeçalhos, autenticação de dois fatores (2FA), IDS.
* **[Registro](registration-settings.md)** (20) — Política de auto-registro e redirecionamentos pós-registro.
* **[Privacidade](privacy-settings.md)** (6) — Consentimento, exportação de dados, solicitações de exclusão de conta.
* **[CAS](cas-settings.md)** (7) — Configuração legada de CAS mantida da versão 1.x.

### Ciclo de vida de cursos e sessões

* **[Curso](course-settings.md)** (45) — Padrões e políticas que se aplicam a cursos em toda a plataforma.
* **[Sessões](session-settings.md)** (68) — Ciclo de vida de sessões, janelas de acesso de instrutores, visibilidade.
* **[Catálogo de Cursos](catalog-settings.md)** (13) — Comportamento do catálogo público de cursos.
* **[Perfil](profile-settings.md)** (29) — Quais campos aparecem no perfil do usuário.

### Ferramentas de curso

* **[Agenda](agenda-settings.md)** (11)
* **[Anúncios](announcement-settings.md)** (9)
* **[Tarefas (Trabalhos)](work-settings.md)** (12)
* **[Frequência](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documentos](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercícios (Testes)](exercise-settings.md)** (63)
* **[Fóruns](forum-settings.md)** (9)
* **[Glossário](glossary-settings.md)** (3)
* **[Grupos](group-settings.md)** (3)
* **[Caminhos de Aprendizagem](lp-settings.md)** (51)
* **[Pesquisas](survey-settings.md)** (12)

### Avaliação e reconhecimento

* **[Boletim (Avaliações)](gradebook-settings.md)** (34) — Exibição de pontuações, decimais, limiares para certificados.
* **[Certificados](certificate-settings.md)** (9) — Padrões aplicados quando um aluno obtém um certificado.
* **[Habilidades](skill-settings.md)** (13) — Árvore de habilidades, regras de concessão, integração ao perfil.
* **[Rastreamento](tracking-settings.md)** (10) — O que é registrado, quais relatórios são expostos.

### Comunicação e comunidade

* **[Mensagens](message-settings.md)** (7)
* **[Rede Social](social-settings.md)** (7)

### IA

* **[Assistentes de IA](ai-helpers-settings.md)** (13) — Provedores por tipo de tarefa (texto, imagem, vídeo, tutor, avaliação).

### Operações e integração

* **[Tarefas Cron](crons-settings.md)** (3)
* **[Pesquisa](search-settings.md)** (3) — Configuração de pesquisa de texto completo Xapian.
* **[Tickets](ticket-settings.md)** (7) — Sistema de helpdesk.
* **[Serviços Web](webservice-settings.md)** (7) — Endpoints SOAP/REST legados.

## Como Funcionam as Configurações

* As configurações são armazenadas no banco de dados (tabela `settings`) e gerenciadas pela interface web.
* Algumas configurações são **bloqueadas por URL** em configurações multi-URL (seu valor se aplica a toda a plataforma e não pode ser sobrescrito por URL - veja as colunas `access_url_locked` e `access_url_changeable` na tabela `settings`); outras (a maioria) podem ser sobrescritas por URL de acesso.
* As alterações entram em vigor imediatamente (não é necessário reiniciar o servidor), embora sua sessão de usuário possa manter algumas delas em memória. Se as alterações não se refletirem imediatamente, faça logout e login novamente para limpar sua sessão.
* Algumas configurações têm dependências — alterar uma pode afetar o comportamento de outras.
* Os nomes de variáveis exibidos em cada página (por exemplo, `2fa_enable`) correspondem à linha na tabela de banco de dados `settings` (coluna `variable`) e às chaves usadas em substituições (`config/settings_overrides.yaml`), quando aplicável.

Para mais informações, consulte [Configurações](https://github.com/chamilo/chamilo-lms/wiki/Configurations) em nossa wiki.

## Dicas

* **Documente suas configurações** — Mantenha um registro das configurações não padrão e o motivo pelo qual você as alterou
* **Altere uma coisa de cada vez** — Ao solucionar problemas, modifique uma configuração por vez para que você possa identificar o efeito
* **Teste em um ambiente de staging** — Para mudanças significativas nas configurações, teste primeiro em um servidor de staging