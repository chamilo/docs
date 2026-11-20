# MCP (Model Context Protocol)

O Chamilo 3.0 expõe um servidor MCP para que assistentes e agentes de IA (Claude, conectores do ChatGPT ou qualquer cliente compatível com MCP) possam atuar na plataforma em nome de um utilizador autenticado, utilizando as permissões desse próprio utilizador — não existe uma conta de serviço separada nem acesso elevado.

## O que o MCP acrescenta ao Chamilo

O MCP (Model Context Protocol) é um padrão aberto que permite a clientes de IA invocarem um conjunto definido de «ferramentas» expostas por um servidor. O servidor MCP do Chamilo está acessível num único endpoint, `/mcp`, e expõe um conjunto curado de ferramentas de gestão de cursos orientadas para o professor, em vez de toda a superfície da API.

## Capacidades disponíveis

Cada chamada é executada como o utilizador ligado, pelo que uma ferramenta apenas vê e modifica os cursos que esse utilizador gere. O conjunto atual de ferramentas:

| Ferramenta | O que faz |
|------|---------------|
| Current user | Devolve a identidade e os papéis do utilizador autenticado |
| Teacher courses | Lista os cursos que o utilizador gere como professor |
| Course overview | Devolve informação do curso-base e contagens de recursos |
| Create course | Cria um novo curso utilizando as regras de criação de cursos da plataforma |
| Create course assignment | Cria um trabalho (rascunho ou publicado) com uma descrição e pontuação máxima |
| Create course test | Cria um teste de escolha múltipla assistido por IA a partir da descrição de um tópico ou de um documento existente |
| Get course test response status | Indica quais os alunos que responderam, estão em progresso ou estão pendentes num teste |
| Get user course test score | Devolve as pontuações mais recente e melhor concluída de um aluno num teste |
| Create training satisfaction survey | Cria um inquérito de satisfação com sete perguntas |
| Create course learning path | Cria um percurso de aprendizagem a partir de páginas fornecidas pelo cliente MCP |
| List documents | Lista os documentos na ferramenta Documentos de um curso |
| Read course document | Devolve o conteúdo HTML, o título e os metadados de um documento editável |
| Edit course document | Substitui o conteúdo HTML completo de um documento editável existente |
| Create course document | Cria um documento HTML assistido por IA na pasta raiz de Documentos |
| Create course illustration | Gera uma ilustração por IA para um tópico e guarda-a como documento |
| Illustrate document paragraph | Insere uma imagem ou um vídeo existente antes ou depois de um parágrafo num documento |
| Find recent course forum activity | Encontra publicações recentes e visíveis no fórum relacionadas com um tópico |
| Review course quality | Analisa percursos de aprendizagem, documentos, testes, trabalhos e inquéritos de um curso e devolve recomendações de melhoria |

Esta lista é curada pela equipa principal do Chamilo e não é extensível pelo utilizador a partir da plataforma — os professores não podem adicionar as suas próprias ferramentas.

## Como os utilizadores se ligam

### Chave de API MCP pessoal

Cada utilizador gera a sua própria chave em **Rede social** > **MCP API key**:

![A página da chave de API MCP, mostrando uma chave inativa, o botão Generate API key e o bloco Remote MCP connection com o URL do endpoint e o formato do cabeçalho Authorization](/.gitbook/assets/admin-mcp-api-key.png)

* Clicar em **Generate API key** cria uma chave e apresenta-a uma única vez — o Chamilo guarda depois apenas uma versão mascarada, pelo que a chave completa deve ser copiada e armazenada de forma segura imediatamente.
* Gerar uma nova chave revoga imediatamente a anterior.
* A página mostra o estado da chave (ativa/inativa), o endpoint MCP a configurar no cliente e as datas de criação e de última utilização.
* O painel **Remote MCP connection** indica exatamente o que colocar no cliente MCP: o URL do endpoint e um cabeçalho `Authorization: Bearer <your MCP API key>`.

Como a própria página indica, a chave autentica o cliente como a conta desse utilizador — não concede qualquer permissão que a conta ainda não possua.

### OAuth 2.1 (clientes remotos e conectores)

Para clientes MCP que suportam descoberta OAuth e registo dinâmico de clientes (em vez de uma chave colada manualmente), o Chamilo atua também como servidor de autorização OAuth 2.1: o cliente descobre os endpoints do Chamilo, regista-se e redireciona o utilizador para `/oauth/authorize` para aprovar o acesso. As aplicações aprovadas aparecem em **Rede social** > **Authorized applications**, onde o utilizador pode revogar qualquer uma que já não utilize ou não reconheça.

## Considerações de Segurança

* **Sem escalonamento de privilégios.** Cada chamada a uma ferramenta MCP e cada aplicação autorizada via OAuth é executada com as próprias permissões Chamilo do utilizador que se liga — uma chave de API pessoal ou uma aplicação autorizada nunca pode fazer mais do que esse utilizador já poderia fazer manualmente.
* **Apenas Bearer, com limitação de taxa.** `/mcp` aceita apenas uma credencial Bearer — uma chave de API MCP pessoal, um token de acesso OAuth ou (em desenvolvimento) um JWT. As tentativas de autenticação são limitadas por taxa por endereço IP para atrasar a adivinhação de credenciais.
* **Superfície pública reduzida.** O único tráfego não autenticado que `/mcp` aceita é o preflight `OPTIONS`; cada chamada efetiva exige `ROLE_USER`. Os endpoints de descoberta OAuth, de registo dinâmico de clientes e de tokens são intencionalmente públicos, conforme exigido pelas especificações OAuth 2.1 / MCP — isto, por si só, não concede acesso; apenas permite que um cliente saiba como iniciar o fluxo de autorização.
* **A proteção contra DNS-rebinding está deliberadamente desativada para `/mcp`.** O bundle que implementa o MCP restringe normalmente o endpoint a `localhost`, salvo se estiver configurada uma lista estática de nomes de anfitrião permitidos — uma solução inadequada para um portal Chamilo com vários URLs, acessível sob muitos nomes de anfitrião. O Chamilo desativa essa verificação porque aqui é redundante: cada pedido a `/mcp` já exige uma credencial Bearer independentemente do cabeçalho `Host`/`Origin`, e um ataque de DNS-rebinding (que depende de autenticação ambiente, ao estilo de cookies, que acompanha um Host falsificado) não consegue forjar um token bearer que ainda não possua.

## Configurar o Servidor MCP

Ao contrário da maioria das integrações neste guia, o MCP não tem uma página de definições no painel de administração — é configurado ao nível do ficheiro, em `config/packages/mcp.yaml`, e requer acesso à consola do servidor:

| Key | Purpose |
|-----|---------|
| `app`, `version`, `description` | Identidade que o Chamilo reporta aos clientes MCP que se ligam |
| `client_transports.stdio` / `client_transports.http` | Quais os transportes ativos; o Chamilo ativa ambos por predefinição |
| `http.path` | O endpoint HTTP do MCP (`/mcp` por predefinição) |
| `http.allowed_hosts` | Lista de anfitriões permitidos para DNS-rebinding — definida como `false` no Chamilo (ver Considerações de Segurança acima) |
| `http.session.store`, `.directory`, `.ttl` | Onde o estado da sessão MCP é persistido e durante quanto tempo |

Para desativar completamente o servidor MCP, defina `client_transports.http: false` (e `stdio: false` se o transporte CLI também deve ser desligado) e limpe a cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Dicas

* Trate uma chave de API MCP como uma palavra-passe — qualquer pessoa que a possua pode atuar como esse utilizador através de qualquer cliente MCP.
* Incentive os utilizadores a rever periodicamente **Aplicações autorizadas** e a revogar tudo o que não reconheçam.
* Consulte [Configuração de IA](integrations/ai-configuration.md) para os fornecedores de IA que suportam as ferramentas de geração de conteúdos (criação de testes, criação de documentos, ilustrações) listadas acima.