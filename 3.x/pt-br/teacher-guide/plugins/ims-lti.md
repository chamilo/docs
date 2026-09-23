# Cliente IMS/LTI

O Cliente IMS/LTI <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="Cliente IMS/LTI" data-size="line"> permite iniciar uma ferramenta externa ou um provedor de conteúdo de dentro do seu curso usando o padrão LTI (versões 1.1 e 1.3) — por exemplo, o livro interativo de uma editora, uma ferramenta de simulação especializada ou outra plataforma que suporte LTI. O Chamilo atua como a plataforma de lançamento; o serviço externo é a “ferramenta”.

## Acessando a ferramenta

Depois de habilitado, um botão **Configurar ferramentas externas** aparece em **Configurações** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Configurações" data-size="line"> do seu curso. A partir daí você pode:

* **Adicionar uma nova ferramenta externa** — Registrar uma você mesmo: nome, URL de lançamento, versão LTI e as credenciais que o serviço externo lhe forneceu (ID de cliente/chaves para LTI 1.3, ou uma chave de consumidor e um segredo para LTI 1.1)
* **Adicionar uma ferramenta global existente** — Se o administrador já registrou uma ferramenta em toda a plataforma, adicione-a ao seu curso em vez de criar sua própria conexão

Depois de adicionada, a ferramenta aparece como uma ferramenta/atalho regular na página inicial do curso.

## O que você pode configurar

Para uma ferramenta que você mesmo registrou: se ela abre em um iframe ou em uma nova janela, se o nome, o e-mail e a foto do aluno são compartilhados com o serviço externo, parâmetros de lançamento personalizados e (para LTI 1.3) suporte a Deep Linking. Se a ferramenta suportar o Assignment and Grades Service, você também pode criar uma coluna vinculada no boletim para que as pontuações que ela reportar alimentem o boletim do Chamilo.

Para uma ferramenta adicionada a partir de uma definição “global” da plataforma, você só pode ajustar essas opções de apresentação e privacidade no nível do curso — as credenciais de conexão pertencem a quem registrou a ferramenta base (geralmente o administrador).

## Dicas

* **Obtenha as credenciais do provedor da ferramenta primeiro** — Você precisará da URL de lançamento e dos detalhes de cliente/chave LTI 1.3 ou de uma chave de consumidor e um segredo LTI 1.1 antes de registrar uma nova ferramenta
* **Seja criterioso sobre o que você compartilha** — Habilite o compartilhamento do nome, e-mail ou foto do aluno com um serviço externo somente se a ferramenta realmente precisar disso
* **Pergunte ao administrador sobre ferramentas globais** — Se a mesma ferramenta externa for usada em muitos cursos, um registro em toda a plataforma evita que cada professor configure sua própria conexão separadamente