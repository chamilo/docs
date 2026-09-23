# Definições da plataforma

O Chamilo dispõe de um sistema de configuração alargado, com definições organizadas por categorias. O conjunto completo de categorias abaixo espelha a página **Definições de configuração** no painel de administração — e o ficheiro `SettingsCurrentFixtures.php` no código-fonte, que é a fonte de verdade para nomes de variáveis, títulos e descrições.

Aceda às definições da plataforma a partir do painel de administração clicando em **Definições de configuração**.

![A página de definições da plataforma a mostrar as categorias de configuração organizadas por área funcional](../../.gitbook/assets/admin-settings-categories.png)

## Todas as categorias

Existem **39 categorias de configuração** no total, listadas abaixo por ordem alfabética. O número após cada ligação é a contagem de definições nessa categoria.

### Ao nível da plataforma

* **[Identidade do administrador](admin-settings.md)** (12) — Identidade e dados de contacto do administrador da plataforma.
* **[Plataforma](platform-settings.md)** (29) — Identidade ao nível da plataforma, fuso horário, política de registo, utilizadores em linha, indicadores de desempenho.
* **[Apresentação](display-settings.md)** (24) — Disposição da página inicial, gravatar, menus, comportamento da identidade visual.
* **[Editor](editor-settings.md)** (26) — Barras de ferramentas do editor de texto avançado (TinyMCE), plugins, assistentes de IA.
* **[Idiomas](language-settings.md)** (12) — Idiomas disponíveis, idioma predefinido, alternativas.
* **[Correio](mail-settings.md)** (18) — Disposição do correio de saída, identidade do remetente, assinatura.
* **[Fluxos de trabalho](workflows-settings.md)** (23) — Interruptores de fluxo de trabalho transversais (criação de cursos, validação de inscrições…).

### Autenticação, segurança e privacidade

* **[Segurança](security-settings.md)** (31) — Proteção de início de sessão, política de palavras-passe, cabeçalhos, 2FA, IDS.
* **[Registo](registration-settings.md)** (20) — Política de autorregisto e redirecionamentos após o registo.
* **[Privacidade](privacy-settings.md)** (6) — Consentimento, exportação de dados, pedidos de eliminação de conta.
* **[CAS](cas-settings.md)** (7) — Configuração CAS legada herdada da versão 1.x.

### Ciclo de vida de cursos e sessões

* **[Curso](course-settings.md)** (45) — Predefinições e políticas que se aplicam aos cursos em toda a plataforma.
* **[Sessões](session-settings.md)** (68) — Ciclo de vida das sessões, janelas de acesso do tutor, visibilidade.
* **[Catálogo de cursos](catalog-settings.md)** (13) — Comportamento do catálogo público de cursos.
* **[Perfil](profile-settings.md)** (29) — Quais os campos que aparecem no perfil do utilizador.

### Ferramentas de curso

* **[Agenda](agenda-settings.md)** (11)
* **[Anúncios](announcement-settings.md)** (9)
* **[Trabalhos (Work)](work-settings.md)** (12)
* **[Assiduidade](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documentos](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercícios (Testes)](exercise-settings.md)** (63)
* **[Fóruns](forum-settings.md)** (9)
* **[Glossário](glossary-settings.md)** (3)
* **[Grupos](group-settings.md)** (3)
* **[Percursos de aprendizagem](lp-settings.md)** (51)
* **[Inquéritos](survey-settings.md)** (12)

### Avaliação e reconhecimento

* **[Boletim de notas (Avaliações)](gradebook-settings.md)** (34) — Apresentação de pontuações, casas decimais, limiares de certificado.
* **[Certificados](certificate-settings.md)** (9) — Predefinições aplicadas quando um formando obtém um certificado.
* **[Competências](skill-settings.md)** (13) — Árvore de competências, regras de atribuição, integração no perfil.
* **[Acompanhamento](tracking-settings.md)** (10) — O que é registado, que relatórios são expostos.

### Comunicação e comunidade

* **[Mensagens](message-settings.md)** (7)
* **[Rede social](social-settings.md)** (7)

### IA

* **[Assistentes de IA](ai-helpers-settings.md)** (13) — Fornecedores por tipo de tarefa (texto, imagem, vídeo, tutor, classificação).

### Operações e integração

* **[Tarefas Cron](crons-settings.md)** (3)
* **[Pesquisa](search-settings.md)** (3) — Configuração da pesquisa de texto integral Xapian.
* **[Tickets](ticket-settings.md)** (7) — Sistema de helpdesk.
* **[Serviços Web](webservice-settings.md)** (7) — Endpoints SOAP/REST legados.

## Como funcionam as definições

* As definições são armazenadas na base de dados (tabela `settings`) e geridas através da interface web
* Algumas definições estão **bloqueadas por URL** em instalações multi-URL (o respetivo valor aplica-se a toda a plataforma e não pode ser substituído por URL — ver as colunas `access_url_locked` e `access_url_changeable` na tabela `settings`); outras (a maioria) podem ser substituídas por URL de acesso
* As alterações entram em vigor imediatamente (não é necessário reiniciar o servidor), embora a sessão do utilizador possa manter algumas delas em memória. Se as alterações não se refletirem de imediato, termine a sessão e inicie sessão novamente para limpar a sessão.
* Algumas definições têm dependências — alterar uma pode afetar o comportamento de outras
* Os nomes de variáveis apresentados em cada página (p. ex. `2fa_enable`) correspondem à linha na tabela `settings` da base de dados (coluna `variable`) e às chaves usadas nas substituições (`config/settings_overrides.yaml`), quando aplicável.

Para mais informações, consulte [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) no nosso wiki.

## Dicas

* **Documente as suas definições** — Mantenha um registo das definições que não são as predefinidas e do motivo por que as alterou
* **Altere uma coisa de cada vez** — Ao resolver problemas, modifique uma definição de cada vez para poder identificar o efeito
* **Teste num ambiente de preparação** — Para alterações significativas de definições, teste primeiro num servidor de preparação