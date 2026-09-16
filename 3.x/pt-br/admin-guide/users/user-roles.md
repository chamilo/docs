# Papéis de Usuário

O Chamilo utiliza um sistema de permissões baseado em papéis. Cada usuário recebe um papel que determina o que pode ver e fazer na plataforma.

## Papéis no Nível da Plataforma

Esses papéis controlam o acesso a recursos de toda a plataforma:

| Papel |  Descrição |
|------|------------|
| **Learner (Student)** | O papel padrão. Pode matricular-se em cursos, acessar conteúdo de aprendizagem, enviar tarefas e realizar exercícios. |
| **Teacher (Trainer)** | Pode criar e gerenciar cursos, adicionar conteúdo, avaliar alunos e visualizar relatórios no nível do curso. |
| **Sessions Administrator** | Pode criar e gerenciar sessões (ou seja, pacotes de cursos com restrição de tempo), matricular usuários em sessões e atribuir tutores. Não pode acessar as configurações gerais da plataforma. |
| **Human Resources Manager (HRM)** | Pode visualizar dados de acompanhamento e relatórios dos usuários atribuídos. Destinado a supervisores que precisam monitorar o treinamento de funcionários, mas não gerenciar conteúdo nem a plataforma. |
| **Portal Administrator** | Acesso completo a todos os recursos de administração da plataforma. Pode gerenciar usuários, cursos, sessões, plugins e todas as configurações. |
| **Global Administrator** | Igual ao Portal Administrator, porém com acesso em todos os URLs de acesso em uma configuração multi-URL (ou seja, multi-tenant) — ou, se registrado em um URL que não seja o raiz, limitado apenas ao ramo daquele URL. Consulte [Administradores de Subárvore](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Um papel especial para visitantes que não estão autenticados. Pode acessar cursos e conteúdos públicos, se isso estiver habilitado. |

## Papéis no Nível do Curso

Dentro de um curso, os usuários têm papéis específicos:

| Papel | Descrição |
|------|-------------|
| **Student** | Papel padrão no curso. Pode acessar conteúdo, realizar exercícios e enviar tarefas. |
| **Course assistant** | Possui permissões de gerenciamento limitadas dentro do curso. Pode ajudar a gerenciar conteúdo e moderar fóruns. |
| **Teacher** | Controle total sobre o curso: gerenciar conteúdo, ferramentas, configurações e matrículas. |

## Papéis no Nível da Sessão

Dentro de uma sessão, existem papéis adicionais:

| Papel | Descrição |
|------|-------------|
| **Session tutor** | Supervisiona todos os cursos de uma sessão. Pode visualizar o acompanhamento em todos os cursos da sessão. |
| **Course tutor** | Ministra um curso específico dentro de uma sessão. Pode gerenciar conteúdo e acompanhar os alunos daquele curso naquela sessão. |

Observação: Esse papel era chamado de "coach" nas versões do Chamilo anteriores à 3.0. A partir do Chamilo 3.0, "coach" foi substituído por "tutor" em toda a interface e na documentação da plataforma — um tutor é uma pessoa que auxilia os alunos ao longo de um curso, e não um coach pessoal. Os nomes das configurações subjacentes em `Configuration settings` ainda contêm "coach" por compatibilidade com versões anteriores (por exemplo, `add_users_by_coach`), mas seus rótulos agora exibem "tutor".

## Atribuição de Papéis

Ao criar ou editar uma conta de usuário no painel de administração, você seleciona o papel no nível da plataforma. Os papéis de curso e de sessão são atribuídos ao matricular usuários em cursos ou sessões.

## Hierarquia de Papéis

Papéis com privilégios mais altos herdam as capacidades dos papéis com privilégios mais baixos:

* Um administrador pode fazer tudo o que um professor pode fazer
* Um professor pode fazer tudo o que um aluno pode fazer
* Os papéis no nível da sessão (tutor) oferecem capacidades adicionais apenas dentro da sessão atribuída

## Dicas

* **Aplique o princípio do menor privilégio** — Atribua aos usuários o papel mínimo de que precisam para desempenhar suas tarefas
* **Use Sessions Administrators para gestão delegada** — Se houver equipe que precise gerenciar sessões de treinamento, mas não a plataforma inteira, conceda o papel Sessions Administrator em vez de acesso de administrador completo
* **Use HRM para supervisores** — Human Resources Managers podem monitorar o progresso do treinamento sem ter acesso para modificar cursos ou configurações da plataforma
* **Criação de papéis** — O Chamilo 3.x já possui a estrutura interna pronta para a criação de novos papéis, mas o recurso ainda carece de mais testes para um lançamento amplo. Pode ser habilitado por meio dos [provedores oficiais do Chamilo](https://chamilo.org/providers).