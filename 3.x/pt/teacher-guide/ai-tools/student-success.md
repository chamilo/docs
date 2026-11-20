# Coach de IA para o Sucesso do Estudante

O **Coach de IA para o Sucesso do Estudante** ajuda o professor a transformar a atividade do curso em recomendações práticas para um estudante. Está disponível a partir da lista de estudantes na área de relatórios do curso quando os assistentes de IA e a funcionalidade **Analisador de cursos** estão ativados para esse curso.

> A plataforma deve ter pelo menos um fornecedor de IA de texto configurado. Consulte [Configuração de IA](../../admin-guide/integrations/ai-configuration.md). As definições relevantes da plataforma são `ai_helpers.enable_ai_helpers` e `ai_helpers.course_analyser` em **Administração > Definições de configuração > Assistentes de IA**.

## Gerar uma recomendação

1. Abra a área de relatórios do curso e apresente a **Lista de estudantes**.
2. Localize o estudante e clique na ação **Coach de IA para o Sucesso do Estudante**.
3. Se estiverem disponíveis vários fornecedores de IA, selecione um.
4. Opcionalmente, introduza **Instruções adicionais para o coach de IA**. Estas permitem acrescentar contexto pedagógico ou pedir ao coach que se concentre numa dificuldade específica.
5. Clique em **Analisar a aprendizagem do utilizador**.

O Chamilo prepara primeiro ou reutiliza uma análise do curso e, em seguida, analisa a atividade do estudante no contexto do curso atual ou da sessão do curso.

## O que a recomendação contém

O resultado pode incluir:

* um resumo geral conciso;
* **Ações prioritárias**;
* **Atividades adicionais** sugeridas;
* recomendações sobre **Ritmo** e cadência;
* **Metodologias de aprendizagem** alternativas;
* outras recomendações quando relevante;
* ligações de **Evidências** do catálogo aprovado de fontes pedagógicas para o idioma do curso.

A recomendação é armazenada no Chamilo para esse estudante e contexto de curso. O Chamilo também guarda uma cópia na Caixa de entrada do próprio professor quando a criação da mensagem é bem-sucedida, para que possa ser revista mais tarde.

## Privacidade

Antes de a análise começar, o Chamilo apresenta um aviso de privacidade. Os identificadores diretos do perfil são omitidos do payload do estudante enviado ao fornecedor de IA, e a IA é instruída a não identificar o estudante nem inferir características sensíveis. No entanto, a atividade de aprendizagem e o conteúdo do curso podem ainda conter informações que identifiquem alguém de forma indireta. Siga a política de IA e de privacidade da sua organização antes de utilizar a funcionalidade.

A mesma análise de Sucesso do Estudante está também disponível para clientes MCP autorizados através da ferramenta `generate_student_success_feedback`; reutiliza o mesmo fluxo de análise filtrado por privacidade.