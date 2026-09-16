# Funções de Utilizador

O Chamilo utiliza um sistema de permissões baseado em funções. A cada utilizador é atribuída uma função que determina o que pode ver e fazer na plataforma.

## Funções ao Nível da Plataforma

Estas funções controlam o acesso a funcionalidades de âmbito da plataforma:

| Função |  Descrição |
|------|------------|
| **Aprendiz (Estudante)** | A função predefinida. Pode inscrever-se em cursos, aceder a conteúdos de aprendizagem, submeter trabalhos e realizar exercícios. |
| **Professor (Formador)** | Pode criar e gerir cursos, adicionar conteúdos, classificar estudantes e consultar relatórios ao nível do curso. |
| **Administrador de Sessões** | Pode criar e gerir sessões (ou seja, pacotes de cursos com base temporal), inscrever utilizadores em sessões e atribuir tutores. Não pode aceder às definições gerais da plataforma. |
| **Gestor de Recursos Humanos (HRM)** | Pode consultar dados de acompanhamento e relatórios dos utilizadores atribuídos. Destina-se a supervisores que precisam de monitorizar a formação de colaboradores, mas não de gerir conteúdos nem a plataforma. |
| **Administrador do Portal** | Acesso completo a todas as funcionalidades de administração da plataforma. Pode gerir utilizadores, cursos, sessões, plugins e todas as definições. |
| **Administrador Global** | Igual ao Administrador do Portal, mas com acesso a todos os URLs de acesso numa configuração multi-URL (ou seja, multi-inquilino) — ou, se registado num URL que não seja o raiz, limitado apenas ao ramo desse URL. Consulte [Administradores de Subárvore](../multi-url/access-urls.md#subtree-administrators). |
| **Anónimo** | Uma função especial para visitantes que não iniciaram sessão. Pode aceder a cursos e conteúdos públicos, se esta opção estiver ativada. |

## Funções ao Nível do Curso

Dentro de um curso, os utilizadores têm funções específicas:

| Função | Descrição |
|------|-------------|
| **Estudante** | Função predefinida no curso. Pode aceder a conteúdos, realizar exercícios e submeter trabalhos. |
| **Assistente de curso** | Tem permissões de gestão limitadas no curso. Pode ajudar a gerir conteúdos e moderar fóruns. |
| **Professor** | Controlo total sobre o curso: gerir conteúdos, ferramentas, definições e inscrições. |

## Funções ao Nível da Sessão

Dentro de uma sessão, existem funções adicionais:

| Função | Descrição |
|------|-------------|
| **Tutor de sessão** | Supervisiona todos os cursos de uma sessão. Pode consultar o acompanhamento em todos os cursos da sessão. |
| **Tutor de curso** | Leciona um curso específico dentro de uma sessão. Pode gerir conteúdos e acompanhar os aprendizes desse curso nessa sessão. |

Nota: Esta função era designada «coach» nas versões do Chamilo anteriores à 3.0. A partir do Chamilo 3.0, «coach» foi substituído por «tutor» em toda a interface e documentação da plataforma — um tutor é uma pessoa que apoia os aprendizes ao longo de um curso, e não um coach pessoal. Os nomes subjacentes das definições em `Configuration settings` ainda contêm «coach» por razões de compatibilidade com versões anteriores (por exemplo `add_users_by_coach`), mas as respetivas etiquetas passam a indicar «tutor».

## Atribuição de Funções

Ao criar ou editar uma conta de utilizador no painel de administração, seleciona-se a respetiva função ao nível da plataforma. As funções de curso e de sessão são atribuídas no momento da inscrição dos utilizadores em cursos ou sessões.

## Hierarquia de Funções

As funções com mais privilégios herdam as capacidades das funções com menos privilégios:

* Um administrador pode fazer tudo o que um professor pode fazer
* Um professor pode fazer tudo o que um estudante pode fazer
* As funções ao nível da sessão (tutor) conferem capacidades adicionais apenas na sessão que lhes foi atribuída

## Sugestões

* **Aplique o princípio do menor privilégio** — Atribua aos utilizadores a função mínima de que necessitam para desempenhar as suas tarefas
* **Utilize Administradores de Sessões para gestão delegada** — Se tiver pessoal que precisa de gerir sessões de formação, mas não a plataforma inteira, atribua-lhe a função de Administrador de Sessões em vez de acesso de administrador completo
* **Utilize HRM para supervisores** — Os Gestores de Recursos Humanos podem monitorizar o progresso da formação sem ter acesso para alterar cursos ou definições da plataforma
* **Criação de funções** — O Chamilo 3.x tem a estrutura interna preparada para a criação de novas funções, mas a funcionalidade ainda carece de mais testes para uma disponibilização alargada. Pode ser ativada através dos [fornecedores oficiais do Chamilo](https://chamilo.org/providers).