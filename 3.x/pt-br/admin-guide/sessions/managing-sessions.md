# Gerenciando Sessões

## Criando uma Sessão

![O formulário de criação de sessão com campos para nome, datas, tutor, categoria e visibilidade](../../.gitbook/assets/admin-session-create-form.png)

1. No painel de administração, clique em **Criar uma sessão**
2. Preencha os detalhes da sessão:
   * **Nome da sessão** — Um nome descritivo (por exemplo, "Integração Primavera 2026")
   * **Datas de início e término** — Quando a sessão ocorre (opcional — as sessões podem ser sem data de término). Há 3 conjuntos de datas: Datas para exibição, datas para limitar o acesso dos alunos e datas para limitar o acesso dos tutores
   * **Tutor da sessão** — A pessoa responsável por toda a sessão
   * **Categoria** — Atribuir a uma categoria de sessão para organização
   * **Visibilidade** — Controlar o acesso e o comportamento de listagem
3. **Adicionar cursos** — Selecione um ou mais cursos para incluir na sessão
4. **Matricular alunos** — Adicione usuários individuais ou turmas de usuários
5. **Atribuir tutores de curso** — Para cada curso, atribua um professor (tutor do curso)
6. Salvar

## Datas da Sessão

As sessões suportam configuração flexível de datas:

| Data | Finalidade |
|------|---------|
| **Início/término de exibição** | Quando a sessão aparece nas listagens dos alunos |
| **Início/término de acesso** | Quando os alunos podem efetivamente acessar o conteúdo da sessão |
| **Início/término de acesso do tutor** | Quando os tutores podem acessar a sessão (geralmente começa antes e termina depois do acesso dos alunos) |

Isso permite preparar a sessão antes da chegada dos alunos e manter o acesso dos tutores aberto após o término da sessão para avaliação e relatórios.

## Lista de Sessões

![A lista de sessões mostrando todas as sessões com nome, datas, quantidade de cursos, quantidade de alunos e status](../../.gitbook/assets/admin-session-list.png)

A lista de sessões mostra todas as sessões com:

* Nome da sessão
* Datas de início e término
* Status (ativa, futura, encerrada)

Use a busca e os filtros para encontrar sessões por nome, data, categoria ou status.

## Editando uma Sessão

Clique em uma sessão para editar:

* Alterar datas, nome ou categoria
* Adicionar ou remover cursos
* Alterar tutores de curso
* Adicionar ou remover alunos
* Visualizar dados de acompanhamento da sessão

## Matriculando Usuários

![A interface de matrícula na sessão para adicionar usuários individuais, turmas ou importar via CSV](../../.gitbook/assets/admin-session-enrollment.png)

Você pode matricular usuários em uma sessão por:

* **Matrícula individual** — Buscar e adicionar usuários individuais
* **Matrícula por turma** — Adicionar uma turma inteira (grupo de usuários pré-definidos) de uma vez
* **Importação CSV** — Enviar um arquivo com atribuições usuário-sessão

## Acesso à Sessão

Os alunos acessam suas sessões por meio de **Minhas sessões** na barra lateral. As sessões são organizadas em:

* **Sessões atuais** — Atualmente ativas
* **Sessões encerradas** — Finalizadas
* **Sessões futuras** — Ainda não iniciadas

## Dicas

* **Planeje as datas com cuidado** — Certifique-se de que as datas de acesso dos tutores se estendam além das datas dos alunos para que os tutores possam configurar e fazer o acompanhamento
* **Use turmas para matrícula recorrente** — Se você matricula frequentemente os mesmos grupos, crie turmas e atribua-as às sessões
* **Mantenha as sessões organizadas** — Use categorias e convenções de nomenclatura claras para facilitar a gestão