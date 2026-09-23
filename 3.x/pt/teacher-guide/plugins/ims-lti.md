# Cliente IMS/LTI

O Cliente IMS/LTI <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="Cliente IMS/LTI" data-size="line"> permite iniciar uma ferramenta externa ou um fornecedor de conteúdos a partir do interior do seu curso, utilizando o padrão LTI (versões 1.1 e 1.3) — por exemplo, um manual interativo de uma editora, uma ferramenta de simulação especializada ou outra plataforma que suporte LTI. O Chamilo atua como a plataforma de lançamento; o serviço externo é a «ferramenta».

## Aceder à ferramenta

Uma vez ativada, aparece um botão **Configurar ferramentas externas** nas **Definições** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Definições" data-size="line"> do seu curso. A partir daí, pode:

* **Adicionar uma nova ferramenta externa** — Registar uma você mesmo: nome, URL de lançamento, versão LTI e as credenciais que o serviço externo lhe forneceu (ID de cliente/chaves para LTI 1.3, ou uma chave de consumidor e um segredo para LTI 1.1)
* **Adicionar uma ferramenta global existente** — Se o seu administrador já tiver registado uma ferramenta para toda a plataforma, adicione-a ao seu curso em vez de criar a sua própria ligação

Uma vez adicionada, a ferramenta aparece como uma ferramenta/atalho regular na página inicial do seu curso.

## O que pode configurar

Para uma ferramenta que registou você mesmo: se abre num iframe ou numa nova janela, se o nome, o e-mail e a fotografia do formando são partilhados com o serviço externo, parâmetros de lançamento personalizados e (para LTI 1.3) suporte a Deep Linking. Se a ferramenta suportar o Assignment and Grades Service, também pode criar uma coluna associada no livro de notas para que as pontuações que ela devolve alimentem o livro de notas do Chamilo.

Para uma ferramenta adicionada a partir de uma definição «global» da plataforma, só pode ajustar estas opções de apresentação e privacidade ao nível do curso — as credenciais de ligação pertencem a quem registou a ferramenta de base (normalmente o seu administrador).

## Dicas

* **Obtenha primeiro as credenciais junto do fornecedor da ferramenta** — Precisará do URL de lançamento e dos detalhes de cliente/chave LTI 1.3 ou de uma chave de consumidor e um segredo LTI 1.1 antes de poder registar uma nova ferramenta
* **Seja deliberado quanto ao que partilha** — Ative a partilha do nome, e-mail ou fotografia de um formando com um serviço externo apenas se a ferramenta realmente precisar disso
* **Pergunte ao seu administrador sobre ferramentas globais** — Se a mesma ferramenta externa for utilizada em muitos cursos, um registo ao nível da plataforma evita que cada professor configure a sua própria ligação em separado