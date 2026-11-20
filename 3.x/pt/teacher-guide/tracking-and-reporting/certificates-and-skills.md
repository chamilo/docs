# Certificados e Competências

O Chamilo permite atribuir certificados aos formandos que cumpram critérios específicos de aproveitamento e validar competências associadas a esses resultados.

## Como Funcionam os Certificados

Os certificados estão ligados às **Avaliações** (também designadas Gradebook). Quando a nota de um formando atinge ou ultrapassa o limiar mínimo que definir, o certificado fica disponível para descarregar.

O fluxo de trabalho é:

1. Configure as [Avaliações](../assessing-learners/gradebook.md) com os seus exercícios, trabalhos e outras atividades cotadas
2. Defina uma **pontuação mínima de certificação** (por exemplo, 70%)
3. Quando um formando atingir essa pontuação, pode descarregar o certificado (na própria ferramenta de Avaliações ou a partir de um percurso de aprendizagem, se tiver configurado o passo final para isso). Como professor, também pode utilizar a ação **Gerar certificados** no gradebook para criar os PDF em lote para todos os formandos elegíveis.

## Modelos de Certificado

Os certificados utilizam modelos definidos pelo administrador da plataforma. O modelo inclui normalmente:

* O nome do formando
* O nome do curso
* A data de conclusão
* A pontuação obtida
* Um código QR ou URL para verificação em linha

## Validade e Caducidade dos Certificados

Os certificados podem ser configurados para caducar após um determinado número de dias. Nas definições das [Avaliações](../assessing-learners/gradebook.md) da categoria raiz, depois de ativar **Gerar certificados**, aparece o campo **Validade do certificado (dias)**. Deixe-o em `0` (o valor predefinido) para certificados que nunca caducam, ou defina um número de dias para que o certificado caduque esse número de dias após a emissão.

A data de caducidade de cada certificado é calculada automaticamente a partir dessa definição quando é gerado (ou regenerado) — não a define certificado a certificado. A lista **Certificados** mostra uma coluna **Data de caducidade** para cada formando, com a indicação **Nunca caduca** quando não se aplica nenhum período de validade.

Se a categoria não tiver período de validade configurado, ainda pode definir (ou alterar) manualmente a data de caducidade de um formando individual: clique no botão de lápis **Editar data de caducidade** junto à respetiva entrada e escolha uma data. Este botão só está disponível quando a própria categoria não tem período de validade — depois de definido um período de validade, as datas de caducidade são geridas automaticamente e deixam de poder ser editadas certificado a certificado.

![A lista de Certificados a mostrar a coluna Data de caducidade para três formandos](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Recordar os Formandos de uma Caducidade Próxima ou Já Ocorrida

Abra a lista **Certificados** da sua avaliação e clique no botão **Certificados a caducar** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Certificados a caducar" data-size="line"> para ver quais os certificados dos formandos que já caducaram ou estão prestes a caducar. A página mostra, por formando: a **Data de caducidade** do certificado, o respetivo **Estado** (**Caducado** ou **A caducar em breve**) e quando foi enviado o **Último lembrete** sobre o mesmo (ou **Nunca**). Utilize **Dias de antecedência** para alargar ou restringir até que ponto no futuro se considera «a caducar em breve».

![A página Certificados a caducar a listar um certificado caducado e um prestes a caducar](/.gitbook/assets/gradebook-certificate-expirations.png)

Para notificar os formandos você mesmo:

1. Selecione os formandos que pretende recordar (ou selecione todos)
2. Clique em **Enviar notificação**
3. Reveja a pré-visualização do e-mail que será enviado — são apresentadas pré-visualizações separadas para o texto de «a caducar em breve» e de «caducado», consoante os formandos selecionados se enquadrem em cada caso
4. Confirme clicando novamente em **Enviar notificação** na caixa de diálogo

![A caixa de diálogo de confirmação Enviar notificação a pré-visualizar o texto dos e-mails de caducidade iminente e já ocorrida](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Cada formando é notificado no idioma que tiver configurado, tanto por e-mail como por uma mensagem interna do Chamilo. Enviar novamente para o mesmo certificado e a mesma data de caducidade é seguro — o Chamilo regista o que já foi enviado por certificado e não envia lembretes duplicados a um formando, a menos que reenvie explicitamente.

Os administradores também podem agendar automaticamente estes mesmos lembretes, de forma recorrente, sem que um professor os tenha de desencadear manualmente — consulte [Definições de Tarefas Cron](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Competências

As competências (skills) representam capacidades que os formandos adquirem. No Chamilo:

* As competências podem ser associadas a resultados do gradebook
* Quando um formando obtém um certificado, quaisquer competências associadas são automaticamente validadas
* As competências acumulam-se no perfil do formando, criando um registo de competências
* As competências podem ser organizadas de forma hierárquica (por exemplo, «Análise de Dados» sob «Métodos de Investigação»)
* As competências podem ser ainda avaliadas por pares (avaliação 360°)

## Visualização do Estado de Certificados e Competências

Como professor, pode ver:

* Quais formandos obtiveram certificados no seu curso
* Quais competências foram validadas
* O progresso dos formandos em direção ao limiar de certificação
* Quais certificados expiraram ou estão prestes a expirar, e se já foi enviado um lembrete relativamente a eles

Os formandos podem consultar os seus próprios certificados e competências validadas a partir do perfil, e podem aceder à Roda de Competências para verificar quais competências são procuradas na sua organização.

## Sugestões

* **Defina expectativas claras** — Informe os formandos no início do curso do que precisam de alcançar para obter um certificado
* **Utilize nomes de competências significativos** — As competências devem descrever o que o formando é capaz de fazer, e não apenas o nome do curso
* **Combine com portefólios** — Incentive os formandos a adicionar os seus certificados ao portefólio
* **Alargue os certificados** — Peça ao administrador para ativar o plugin [Custom Certificate](../plugins/custom-certificate.md) para libertar ainda mais poder de modelação de certificados
* **Defina um período de validade para certificações orientadas para a conformidade** — Se uma certificação exigir renovação periódica (por exemplo, formação de segurança), defina **Validade do certificado (dias)** para que os formandos sejam lembrados antes de caducar