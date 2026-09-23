# Configurações da plataforma

O Chamilo possui um sistema de configuração abrangente, com definições organizadas em categorias. O conjunto completo de categorias abaixo espelha a página **Configurações** no painel de administração — e o arquivo `SettingsCurrentFixtures.php` no código-fonte, que é a fonte da verdade para nomes de variáveis, títulos e descrições.

Acesse as configurações da plataforma no painel de administração clicando em **Configurações**.

![A página de configurações da plataforma mostrando as categorias de configuração organizadas por área funcional](../../.gitbook/assets/admin-settings-categories.png)

## Todas as categorias

Há **39 categorias de configuração** no total, listadas abaixo em ordem alfabética. O número após cada link é a quantidade de configurações nessa categoria.

### Em toda a plataforma

* **[Identidade do administrador](admin-settings.md)** (12) — Identidade e dados de contato do administrador da plataforma.
* **[Plataforma](platform-settings.md)** (29) — Identidade no nível da plataforma, fuso horário, política de registro, usuários online, flags de desempenho.
* **[Exibição](display-settings.md)** (24) — Layout da página inicial, gravatar, menus, comportamento da identidade visual.
* **[Editor](editor-settings.md)** (26) — Barras de ferramentas do editor de texto rico (TinyMCE), plugins, assistentes de IA.
* **[Idiomas](language-settings.md)** (12) — Idiomas disponíveis, idioma padrão, fallbacks.
* **[E-mail](mail-settings.md)** (18) — Layout do e-mail de saída, identidade do remetente, assinatura.
* **[Fluxos de trabalho](workflows-settings.md)** (23) — Interruptores de fluxo de trabalho transversais (criação de cursos, validação de matrícula…).

### Autenticação, segurança e privacidade

* **[Segurança](security-settings.md)** (31) — Proteção de login, política de senhas, cabeçalhos, 2FA, IDS.
* **[Registro](registration-settings.md)** (20) — Política de autorregistro e redirecionamentos pós-registro.
* **[Privacidade](privacy-settings.md)** (6) — Consentimento, exportação de dados, solicitações de exclusão de conta.
* **[CAS](cas-settings.md)** (7) — Configuração legado de CAS herdada da versão 1.x.

### Ciclo de vida de cursos e sessões

* **[Curso](course-settings.md)** (45) — Padrões e políticas que se aplicam aos cursos em toda a plataforma.
* **[Sessões](session-settings.md)** (68) — Ciclo de vida da sessão, janelas de acesso do tutor, visibilidade.
* **[Catálogo de cursos](catalog-settings.md)** (13) — Comportamento do catálogo público de cursos.
* **[Perfil](profile-settings.md)** (29) — Quais campos aparecem no perfil do usuário.

### Ferramentas do curso

* **[Agenda](agenda-settings.md)** (11)
* **[Anúncios](announcement-settings.md)** (9)
* **[Tarefas (Work)](work-settings.md)** (12)
* **[Frequência](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documentos](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercícios (Testes)](exercise-settings.md)** (63)
* **[Fóruns](forum-settings.md)** (9)
* **[Glossário](glossary-settings.md)** (3)
* **[Grupos](group-settings.md)** (3)
* **[Percursos de aprendizagem](lp-settings.md)** (51)
* **[Pesquisas](survey-settings.md)** (12)

### Avaliação e reconhecimento

* **[Boletim (Avaliações)](gradebook-settings.md)** (34) — Exibição de notas, casas decimais, limiares de certificado.
* **[Certificados](certificate-settings.md)** (9) — Padrões aplicados quando um aluno obtém um certificado.
* **[Competências](skill-settings.md)** (13) — Árvore de competências, regras de concessão, integração com o perfil.
* **[Acompanhamento](tracking-settings.md)** (10) — O que é registrado, quais relatórios são expostos.

### Comunicação e comunidade

* **[Mensagens](message-settings.md)** (7)
* **[Rede social](social-settings.md)** (7)

### IA

* **[Assistentes de IA](ai-helpers-settings.md)** (13) — Provedores por tipo de tarefa (texto, imagem, vídeo, tutor, correção).

### Operações e integração

* **[Tarefas cron](crons-settings.md)** (3)
* **[Busca](search-settings.md)** (3) — Configuração de busca full-text Xapian.
* **[Tickets](ticket-settings.md)** (7) — Sistema de helpdesk.
* **[Serviços web](webservice-settings.md)** (7) — Endpoints legado SOAP/REST.

## Como as configurações funcionam

* As configurações são armazenadas no banco de dados (tabela `settings`) e gerenciadas pela interface web
* Algumas configurações são **bloqueadas por URL** em instalações multi-URL (seu valor se aplica a toda a plataforma e não pode ser sobrescrito por URL — consulte as colunas `access_url_locked` e `access_url_changeable` na tabela `settings`); outras (a maioria) podem ser sobrescritas por URL de acesso
* As alterações entram em vigor imediatamente (não é necessário reiniciar o servidor), embora a sessão do usuário possa manter algumas delas em memória. Se as alterações não se refletirem de imediato, saia e entre novamente para limpar a sessão.
* Algumas configurações têm dependências — alterar uma pode afetar o comportamento de outras
* Os nomes de variáveis exibidos em cada página (por exemplo, `2fa_enable`) correspondem à linha na tabela `settings` do banco de dados (coluna `variable`) e às chaves usadas em sobrescritas (`config/settings_overrides.yaml`), quando aplicável.

Para mais informações, consulte [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) em nosso wiki.

## Dicas

* **Documente suas configurações** — Mantenha um registro das configurações que não são as padrão e do motivo pelo qual você as alterou
* **Altere uma coisa de cada vez** — Ao solucionar problemas, modifique uma configuração por vez para que você possa identificar o efeito
* **Teste em um ambiente de homologação** — Para alterações significativas de configuração, teste primeiro em um servidor de homologação