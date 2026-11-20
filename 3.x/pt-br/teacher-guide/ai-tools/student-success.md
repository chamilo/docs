# Coach de IA para o Sucesso do Estudante

O **Coach de IA para o Sucesso do Estudante** ajuda o professor a transformar a atividade do curso em recomendações práticas para um aprendiz. Ele está disponível na lista de aprendizes da área de relatórios do curso quando os assistentes de IA e o recurso **Analisador de curso** estão habilitados para esse curso.

> A plataforma deve ter pelo menos um provedor de IA de texto configurado. Consulte [Configuração de IA](../../admin-guide/integrations/ai-configuration.md). As configurações relevantes da plataforma são `ai_helpers.enable_ai_helpers` e `ai_helpers.course_analyser` em **Administração > Configurações de configuração > Assistentes de IA**.

## Gerando uma recomendação

1. Abra a área de relatórios do curso e exiba a **Lista de aprendizes**.
2. Localize o aprendiz e clique na ação **Coach de IA para o Sucesso do Estudante**.
3. Se vários provedores de IA estiverem disponíveis, selecione um.
4. Opcionalmente, informe **Instruções adicionais para o coach de IA**. Elas permitem acrescentar contexto pedagógico ou pedir que o coach se concentre em uma dificuldade específica.
5. Clique em **Analisar a aprendizagem do usuário**.

O Chamilo primeiro prepara ou reutiliza uma análise do curso e, em seguida, analisa a atividade do aprendiz no contexto do curso atual ou da sessão do curso.

## O que a recomendação contém

O resultado pode incluir:

* um resumo geral conciso;
* **Ações prioritárias**;
* **Atividades adicionais** sugeridas;
* recomendações sobre **Ritmo** e cadência;
* **Metodologias de aprendizagem** alternativas;
* outras recomendações, quando relevantes;
* links de **Evidências** do catálogo de fontes pedagógicas aprovado para o idioma do curso.

A recomendação é armazenada no Chamilo para esse aprendiz e contexto de curso. O Chamilo também salva uma cópia na Caixa de entrada do próprio professor quando a criação da mensagem é bem-sucedida, para que possa ser revisada posteriormente.

## Privacidade

Antes do início da análise, o Chamilo exibe um aviso de privacidade. Identificadores diretos do perfil são omitidos da carga de dados do aprendiz enviada ao provedor de IA, e a IA é instruída a não identificar o aprendiz nem inferir características sensíveis. No entanto, a atividade de aprendizagem e o conteúdo do curso ainda podem conter informações que identifiquem alguém indiretamente. Siga a política de IA e privacidade da sua organização antes de usar o recurso.

A mesma análise de Sucesso do Estudante também está disponível para clientes MCP autorizados por meio da ferramenta `generate_student_success_feedback`; ela reutiliza o mesmo fluxo de análise com filtragem de privacidade.