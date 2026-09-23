# Certificados e Competências

O Chamilo permite que você emita certificados para os alunos que atendem a critérios específicos de desempenho e que valide as competências associadas a esses resultados.

## Como Funcionam os Certificados

Os certificados estão vinculados às **Avaliações** (também chamadas de Gradebook). Quando a nota de um aluno atinge ou supera o limiar mínimo que você define, um certificado fica disponível para download.

O fluxo de trabalho é:

1. Configure as [Avaliações](../assessing-learners/gradebook.md) com seus exercícios, tarefas e outras atividades pontuadas
2. Defina uma **pontuação mínima para certificação** (por exemplo, 70%)
3. Quando um aluno atinge essa pontuação, ele pode baixar o certificado (seja na própria ferramenta de Avaliações, ou a partir de um percurso de aprendizagem se você tiver configurado a etapa final para isso). Como professor, você também pode usar a ação **Gerar certificados** no boletim para criar os PDFs em lote para todos os alunos elegíveis.

## Modelos de Certificado

Os certificados usam modelos definidos pelo administrador da plataforma. O modelo normalmente inclui:

* O nome do aluno
* O nome do curso
* A data de conclusão
* A pontuação obtida
* Um código QR ou URL para verificação on-line

## Validade e Expiração dos Certificados

Os certificados podem ser configurados para expirar após um determinado número de dias. Nas configurações das [Avaliações](../assessing-learners/gradebook.md) da categoria raiz, depois que **Gerar certificados** está habilitado, aparece o campo **Validade do certificado (dias)**. Deixe em `0` (o padrão) para certificados que nunca expiram, ou defina um número de dias para que o certificado expire essa quantidade de dias após a emissão.

A data de expiração de cada certificado é calculada automaticamente a partir dessa configuração quando ele é gerado (ou regenerado) — você não a define certificado a certificado. A lista de **Certificados** exibe uma coluna **Data de expiração** para cada aluno, com a indicação **Nunca expira** quando nenhum período de validade se aplica.

Se a categoria não tiver período de validade configurado, você ainda pode definir (ou alterar) manualmente a data de expiração de um aluno individual: clique no botão de lápis **Editar data de expiração** ao lado da entrada e escolha uma data. Esse botão só está disponível quando a própria categoria não tem período de validade — uma vez definido um período de validade, as datas de expiração são gerenciadas automaticamente e não podem mais ser editadas certificado a certificado.

![A lista de Certificados mostrando a coluna Data de expiração para três alunos](../../.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Lembrar os Alunos de uma Expiração Próxima ou Já Ocorrida

Abra a lista de **Certificados** da sua avaliação e clique no botão **Certificados a expirar** <img src="../../.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Certificados a expirar" data-size="line"> para ver quais certificados dos alunos expiraram ou estão prestes a expirar. A página mostra, por aluno: a **Data de expiração** do certificado, o **Status** (**Expirado** ou **Expirando em breve**) e quando um lembrete sobre isso foi **Último lembrete enviado** (ou **Nunca**). Use **Dias de antecedência** para ampliar ou reduzir até onde no futuro se considera “expirando em breve”.

![A página Certificados a expirar listando um certificado expirado e um prestes a expirar](../../.gitbook/assets/gradebook-certificate-expirations.png)

Para notificar os alunos você mesmo:

1. Selecione os alunos que deseja lembrar (ou selecione todos)
2. Clique em **Enviar notificação**
3. Revise a prévia do e-mail que será enviado — prévias separadas são exibidas para os textos de “expirando em breve” e “expirado”, conforme os alunos selecionados se enquadrem em cada caso
4. Confirme clicando novamente em **Enviar notificação** no diálogo

![O diálogo de confirmação Enviar notificação com prévia dos textos de e-mail de expirando e expirado](../../.gitbook/assets/gradebook-certificate-expiry-notification.png)

Cada aluno é notificado no idioma configurado para ele, tanto por e-mail quanto por uma mensagem interna do Chamilo. Enviar novamente para o mesmo certificado e a mesma data de expiração é seguro — o Chamilo registra o que já foi enviado por certificado e não enviará lembretes duplicados a um aluno, a menos que você reenvie explicitamente.

Os administradores também podem agendar esses mesmos lembretes automaticamente, de forma recorrente, sem que um professor precise acioná-los manualmente — consulte [Configurações de Cron Jobs](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Competências

As competências (skills) representam as competências que os alunos adquirem. No Chamilo:

* As competências podem ser vinculadas a resultados do boletim
* Quando um aluno obtém um certificado, quaisquer competências associadas são validadas automaticamente
* As competências se acumulam no perfil do aluno, criando um registro de competências
* As competências podem ser organizadas hierarquicamente (por exemplo, “Análise de Dados” sob “Métodos de Pesquisa”)
* As competências podem ser avaliadas adicionalmente por pares (avaliação 360°)

## Visualização do Status de Certificados e Competências

Como professor, você pode ver:

* Quais aprendizes obtiveram certificados no seu curso
* Quais competências foram validadas
* O progresso dos aprendizes em direção ao limiar de certificação
* Quais certificados expiraram ou estão prestes a expirar, e se um lembrete já foi enviado para eles

Os aprendizes podem visualizar seus próprios certificados e competências validadas a partir do perfil, e podem acessar a Roda de Competências para verificar quais competências estão em demanda na sua organização.

## Dicas

* **Defina expectativas claras** — Informe aos aprendizes no início do curso o que eles precisam alcançar para obter um certificado
* **Use nomes de competências significativos** — As competências devem descrever o que o aprendiz é capaz de fazer, e não apenas o nome do curso
* **Combine com portfólios** — Incentive os aprendizes a adicionar seus certificados ao portfólio
* **Estenda os certificados** — Peça ao administrador para habilitar o plugin [Custom Certificate](../plugins/custom-certificate.md) para liberar ainda mais poder de modelagem de certificados
* **Defina um período de validade para certificações orientadas à conformidade** — Se uma certificação precisar de renovação periódica (por exemplo, treinamento de segurança), defina **Validade do certificado (dias)** para que os aprendizes sejam lembrados antes que ela expire