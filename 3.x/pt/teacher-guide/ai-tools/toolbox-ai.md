# AI Toolbox

A **AI Toolbox** é uma ferramenta do curso que gera aplicações educativas interativas a partir das instruções de um professor. O Chamilo empacota cada aplicação gerada como **SCORM 1.2**, para que o progresso, a pontuação e os dados de retoma do aluno sejam registados pela plataforma.

> O administrador deve ativar tanto `ai_helpers.enable_ai_helpers` como `ai_helpers.toolbox` em **Administração > Definições de configuração > Assistentes de IA**, e pelo menos um fornecedor de IA de texto deve estar configurado.

## Criar uma aplicação interativa

1. Abra a **AI Toolbox** no curso.
2. Clique em **Criar**.
3. Introduza um **Título** e, opcionalmente, uma **Descrição**.
4. Em **O que deve fazer a aplicação?**, descreva a atividade completa que pretende. Inclua o objetivo de aprendizagem, as regras, os níveis, a pontuação e o que deve acontecer quando o aluno termina.
5. Escolha o **fornecedor de IA** quando existir mais do que um disponível.
6. Clique em **Gerar**.

A primeira geração é armazenada como **versão 1**. Começa como rascunho, pelo que pode pré-visualizá-la antes de a tornar visível para os alunos.

## Melhorar e gerir versões

Abra as **Definições** de uma aplicação para a gerir. Pode:

* pré-visualizar ou descarregar a aplicação atual;
* utilizar **Melhorar com IA** para descrever uma alteração e gerar uma nova versão;
* rever o **Histórico de versões**;
* pré-visualizar, descarregar ou restaurar uma versão anterior;
* publicar ou ocultar a aplicação;
* abrir **Relatórios** para rever o acompanhamento dos alunos.

Gerar uma melhoria não elimina as versões anteriores. Restaurar uma versão anterior torna essa versão novamente a atual.

## Adicionar uma aplicação a um percurso de aprendizagem

No [construtor de Percursos de aprendizagem](../adding-content/learning-paths.md), os professores podem selecionar uma aplicação gerada pela AI Toolbox como recurso. A aplicação deve ter uma versão gerada, mas não precisa de estar publicada antes de o professor a adicionar ao percurso de aprendizagem. Uma aplicação não publicada continua indisponível para os alunos até ser publicada.

Quando um professor autorizado abre o conteúdo da Toolbox no **modo de pré-visualização**, o Chamilo apresenta **“O progresso e a pontuação não são guardados no modo de pré-visualização.”** Testar a atividade desta forma não cria acompanhamento do aluno nem atualiza uma pontuação. Utilize a experiência normal do aluno para verificar o progresso e as pontuações SCORM após a publicação.

## Validação da geração e resolução de problemas

Após a geração por IA, o Chamilo verifica o código-fonte da aplicação gerada antes de disponibilizar uma versão. Isto inclui verificações de sintaxe ou estrutura de JavaScript e restrições a APIs de navegador inseguras. Se a validação falhar, o Chamilo pede ao fornecedor de IA que **repare o resultado uma vez**; se a versão reparada continuar a falhar, a geração termina com um erro. Uma validação bem-sucedida não substitui o teste das regras de aprendizagem da atividade, da acessibilidade e da pontuação SCORM antes da publicação.

Se a geração comunicar **HTTP 504**, o servidor web ou o gateway deixou de aguardar o pedido. Isto é diferente de um tempo limite imposto pelo fornecedor de texto de IA. O erro pode incluir o tempo aproximado decorrido; experimente um pedido de atividade mais simples e peça ao administrador que verifique os tempos limite do gateway, do PHP/servidor web e do fornecedor. Um erro de tempo limite ou de limite de taxa do fornecedor exige a verificação do modelo configurado e das definições do fornecedor. Não presuma que a aplicação foi guardada com êxito após um erro.

Estas melhorias de validação e diagnóstico foram introduzidas no [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Experiência do aluno

Os alunos apenas veem as aplicações que foram publicadas. A partir da Toolbox, podem abrir uma aplicação, continuar a partir do seu estado SCORM mais recente e ver o seu **Progresso** e a sua **Pontuação**. Quando uma nova tentativa é permitida, **Tentar novamente** inicia uma nova tentativa.

As aplicações da Toolbox são executadas no ambiente de execução do Percurso de aprendizagem, num iframe restrito, e comunicam o seu estado SCORM de volta ao Chamilo. São geridas a partir da Toolbox e não a partir da lista normal de Percursos de aprendizagem.

Clientes MCP autorizados também podem criar ou atualizar aplicações da Toolbox quando as mesmas definições da AI Toolbox estão ativadas.