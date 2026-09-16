# Papéis de Usuário

O Chamilo utiliza um sistema de permissões baseado em papéis. Cada usuário recebe um papel que determina o que ele pode ver e fazer na plataforma.

## Papéis no Nível da Plataforma

Esses papéis controlam o acesso a funcionalidades em toda a plataforma:

| Papel | Descrição |
|------|------------|
| **Aprendiz (Estudante)** | O papel padrão. Pode se inscrever em cursos, acessar conteúdo de aprendizado, enviar tarefas e realizar exercícios. |
| **Professor (Instrutor)** | Pode criar e gerenciar cursos, adicionar conteúdo, avaliar alunos e visualizar relatórios no nível do curso. |
| **Administrador de Sessões** | Pode criar e gerenciar sessões (ou seja, pacotes de cursos baseados em tempo), inscrever usuários em sessões e atribuir tutores. Não tem acesso às configurações gerais da plataforma. |
| **Gerente de Recursos Humanos (GRH)** | Pode visualizar dados de rastreamento e relatórios para usuários atribuídos. Usado para supervisores que precisam monitorar o treinamento de funcionários, mas não gerenciar conteúdo nem a plataforma. |
| **Administrador do Portal** | Acesso total a todas as funcionalidades de administração da plataforma. Pode gerenciar usuários, cursos, sessões, plugins e todas as configurações. |
| **Administrador Global** | Igual ao Administrador do Portal, mas com acesso a todas as URLs de acesso em uma configuração multi-URL (ou seja, multi-tenant). |
| **Anônimo** | Um papel especial para visitantes que não estão logados. Pode acessar cursos e conteúdos públicos, se habilitado. |

## Papéis no Nível do Curso

Dentro de um curso, os usuários têm papéis específicos:

| Papel | Descrição |
|------|-------------|
| **Estudante** | Papel padrão do curso. Pode acessar conteúdo, realizar exercícios e enviar tarefas. |
| **Assistente de Curso** | Tem permissões limitadas de gerenciamento dentro do curso. Pode ajudar a gerenciar conteúdo e moderar fóruns. |
| **Professor** | Controle total sobre o curso: gerenciar conteúdo, ferramentas, configurações e matrículas. |

## Papéis no Nível da Sessão

Dentro de uma sessão, existem papéis adicionais:

| Papel | Descrição |
|------|-------------|
| **Tutor de Sessão** | Supervisiona todos os cursos dentro de uma sessão. Pode visualizar o rastreamento em todos os cursos da sessão. |
| **Tutor de Curso** | Ensina um curso específico dentro de uma sessão. Pode gerenciar conteúdo e rastrear aprendizes para aquele curso naquela sessão. |

Nota: Os termos "coach" e "tutor" têm significados muito semelhantes e geralmente dependem da organização. Usamos ambos os termos de forma intercambiável no Chamilo 2.0, mas na maioria das vezes nos referimos a "tutor", uma pessoa que ajudará no aprendizado do curso, não um coach pessoal. Podemos usar "tutor" exclusivamente no futuro.

## Atribuição de Papéis

Ao criar ou editar uma conta de usuário no painel de administração, você seleciona o papel no nível da plataforma. Os papéis de curso e sessão são atribuídos ao inscrever usuários em cursos ou sessões.

## Hierarquia de Papéis

Papéis com privilégios mais altos herdam as capacidades dos papéis com privilégios mais baixos:

* Um administrador pode fazer tudo o que um professor pode fazer
* Um professor pode fazer tudo o que um estudante pode fazer
* Papéis no nível da sessão (tutor) fornecem capacidades adicionais apenas dentro da sessão atribuída

## Dicas

* **Use o princípio do menor privilégio** — Atribua aos usuários o papel mínimo necessário para realizar suas tarefas
* **Use Administradores de Sessões para gerenciamento delegado** — Se você tem equipe que precisa gerenciar sessões de treinamento, mas não toda a plataforma, dê a eles o papel de Administrador de Sessões em vez de acesso total de administrador
* **Use GRH para supervisores** — Gerentes de Recursos Humanos podem monitorar o progresso do treinamento sem ter acesso para modificar cursos ou configurações da plataforma
* **Criação de papéis** — O Chamilo 2.x tem a estrutura interna pronta para a criação de novos papéis, mas o recurso ainda precisa de mais testes para um lançamento amplo. Pode ser habilitado através dos [Provedores Oficiais do Chamilo](https://chamilo.org/providers).