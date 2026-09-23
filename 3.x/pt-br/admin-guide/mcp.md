# MCP (Model Context Protocol)

O Chamilo 3.0 expõe um servidor MCP para que assistentes e agentes de IA (conectores do Claude, do ChatGPT ou qualquer cliente compatível com MCP) possam atuar na plataforma em nome de um usuário autenticado, usando as permissões desse próprio usuário — não há conta de serviço separada nem acesso elevado.

## O que o MCP acrescenta ao Chamilo

O MCP (Model Context Protocol) é um padrão aberto que permite que clientes de IA invoquem um conjunto definido de "ferramentas" expostas por um servidor. O servidor MCP do Chamilo é acessível em um único endpoint, `/mcp`, e expõe um conjunto selecionado de ferramentas de gestão de cursos voltadas ao professor, em vez de toda a superfície da API.

## Capacidades disponíveis

Toda chamada é executada como o usuário conectado, de modo que uma ferramenta só vê e modifica os cursos que esse usuário gerencia. O conjunto atual de ferramentas:

| Ferramenta | O que faz |
|------|---------------|
| Current user | Retorna a identidade e os papéis do usuário autenticado |
| Teacher courses | Lista os cursos que o usuário gerencia como professor |
| Course overview | Retorna informações do curso-base e contagens de recursos |
| Create course | Cria um novo curso usando as regras de criação de curso da plataforma |
| Create course assignment | Cria uma tarefa em rascunho ou publicada, com descrição e pontuação máxima |
| Create course test | Cria um teste de múltipla escolha assistido por IA a partir da descrição de um tópico ou de um documento existente |
| Get course test response status | Informa quais alunos responderam, estão em andamento ou pendentes em um teste |
| Get user course test score | Retorna as pontuações mais recente e melhor concluída de um aluno em um teste |
| Create training satisfaction survey | Cria uma pesquisa de satisfação com sete perguntas |
| Create course learning path | Cria um percurso de aprendizagem a partir de páginas fornecidas pelo cliente MCP |
| List documents | Lista os documentos na ferramenta Documentos de um curso |
| Read course document | Retorna o conteúdo HTML, o título e os metadados de um documento editável |
| Edit course document | Substitui o conteúdo HTML completo de um documento editável existente |
| Create course document | Cria um documento HTML assistido por IA na pasta raiz de Documentos |
| Create course illustration | Gera uma ilustração por IA para um tópico e a salva como documento |
| Illustrate document paragraph | Insere uma imagem ou um vídeo existente antes ou depois de um parágrafo em um documento |
| Find recent course forum activity | Encontra publicações recentes e visíveis no fórum relacionadas a um tópico |
| Review course quality | Analisa percursos de aprendizagem, documentos, testes, tarefas e pesquisas de um curso e retorna recomendações de melhoria |

Esta lista é curada pela equipe principal do Chamilo e não é extensível pelo usuário de dentro da plataforma — os professores não podem adicionar suas próprias ferramentas.

## Como os usuários se conectam

### Chave de API MCP pessoal

Cada usuário gera a própria chave em **Rede social** > **Chave de API MCP**:

![A página da chave de API MCP, mostrando uma chave inativa, o botão Gerar chave de API e o bloco Conexão MCP remota com a URL do endpoint e o formato do cabeçalho Authorization](../.gitbook/assets/admin-mcp-api-key.png)

* Clicar em **Gerar chave de API** cria uma chave e a exibe uma única vez — o Chamilo armazena depois apenas uma versão mascarada, portanto a chave completa deve ser copiada e guardada com segurança imediatamente.
* Gerar uma nova chave revoga imediatamente a anterior.
* A página mostra o status da chave (ativa/inativa), o endpoint MCP a configurar no cliente e as datas de criação e de último uso.
* O painel **Conexão MCP remota** indica exatamente o que colocar no cliente MCP: a URL do endpoint e um cabeçalho `Authorization: Bearer <your MCP API key>`.

Como a própria página observa, a chave autentica o cliente como a conta daquele usuário — ela não concede nenhuma permissão que a conta já não possua.

### OAuth 2.1 (clientes remotos e conectores)

Para clientes MCP que suportam descoberta OAuth e registro dinâmico de cliente (em vez de uma chave colada manualmente), o Chamilo também atua como servidor de autorização OAuth 2.1: o cliente descobre os endpoints do Chamilo, registra-se e redireciona o usuário para `/oauth/authorize` para aprovar o acesso. Os aplicativos aprovados aparecem em **Rede social** > **Aplicativos autorizados**, onde o usuário pode revogar qualquer um que não use mais ou não reconheça.

## Considerações de Segurança

* **Sem escalonamento de privilégios.** Toda chamada de ferramenta MCP e todo aplicativo autorizado via OAuth é executado com as próprias permissões Chamilo do usuário que se conecta — uma chave de API pessoal ou um aplicativo autorizado nunca pode fazer mais do que aquele usuário já poderia fazer manualmente.
* **Somente Bearer, com limitação de taxa.** `/mcp` aceita apenas uma credencial Bearer — uma chave de API MCP pessoal, um token de acesso OAuth ou (em desenvolvimento) um JWT. As tentativas de autenticação são limitadas por taxa por endereço IP para retardar a adivinhação de credenciais.
* **Superfície pública restrita.** O único tráfego não autenticado que `/mcp` aceita é o preflight `OPTIONS`; toda chamada efetiva exige `ROLE_USER`. Os endpoints de descoberta OAuth, registro dinâmico de cliente e token são intencionalmente públicos, conforme exigido pelas especificações OAuth 2.1 / MCP — isso, por si só, não concede acesso; apenas permite que um cliente saiba como iniciar o fluxo de autorização.
* **A proteção contra DNS-rebinding está deliberadamente desativada para `/mcp`.** O bundle que implementa o MCP normalmente restringe o endpoint a `localhost`, a menos que uma lista estática de nomes de host permitidos esteja configurada — um encaixe inadequado para um portal Chamilo com várias URLs, acessível sob muitos nomes de host. O Chamilo desativa essa verificação porque ela é redundante neste caso: toda requisição `/mcp` já exige uma credencial Bearer independentemente do cabeçalho `Host`/`Origin`, e um ataque de DNS-rebinding (que se baseia em autenticação ambiente, no estilo de cookie, acompanhando um Host falsificado) não consegue forjar um token bearer que ainda não possui.

## Configurando o Servidor MCP

Ao contrário da maioria das integrações neste guia, o MCP não possui uma página de configurações no painel administrativo — ele é configurado no nível de arquivo, em `config/packages/mcp.yaml`, e exige acesso ao shell do servidor:

| Key | Purpose |
|-----|---------|
| `app`, `version`, `description` | Identidade que o Chamilo informa aos clientes MCP que se conectam |
| `client_transports.stdio` / `client_transports.http` | Quais transportes estão ativos; o Chamilo habilita ambos por padrão |
| `http.path` | O endpoint HTTP do MCP (`/mcp` por padrão) |
| `http.allowed_hosts` | Lista de permissão de hosts contra DNS-rebinding — definida como `false` no Chamilo (veja Considerações de Segurança acima) |
| `http.session.store`, `.directory`, `.ttl` | Onde o estado da sessão MCP é persistido e por quanto tempo |

Para desativar o servidor MCP por completo, defina `client_transports.http: false` (e `stdio: false` se o transporte CLI também deve ser desligado) e limpe o cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Dicas

* Trate uma chave de API MCP como uma senha — qualquer pessoa que a possua pode agir como aquele usuário por meio de qualquer cliente MCP.
* Incentive os usuários a revisar periodicamente **Aplicativos autorizados** e revogar qualquer coisa que não reconheçam.
* Consulte [Configuração de IA](integrations/ai-configuration.md) para os provedores de IA que sustentam as ferramentas de geração de conteúdo (criação de testes, criação de documentos, ilustrações) listadas acima.