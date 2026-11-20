# Gestão de Sessões

## Criar uma Sessão

![O formulário de criação de sessão com campos para nome, datas, tutor, categoria e visibilidade](/.gitbook/assets/admin-session-create-form.png)

1. No painel de administração, clique em **Create a session**
2. Preencha os detalhes da sessão:
   * **Session name** — Um nome descritivo (por exemplo, "Spring 2026 Onboarding")
   * **Start and end dates** — Quando a sessão decorre (opcional — as sessões podem ser sem data de fim). Existem 3 conjuntos de datas: datas a apresentar, datas para limitar o acesso dos formandos e datas para limitar o acesso dos tutores
   * **Session tutor** — A pessoa responsável por toda a sessão
   * **Category** — Atribuir a uma categoria de sessão para organização
   * **Visibility** — Controlar o acesso e o comportamento de listagem
3. **Add courses** — Selecionar um ou mais cursos a incluir na sessão
4. **Enroll learners** — Adicionar utilizadores individuais ou turmas de utilizadores
5. **Assign course tutors** — Para cada curso, atribuir um professor (tutor do curso)
6. Guardar

## Datas da Sessão

As sessões suportam uma configuração flexível de datas:

| Data | Finalidade |
|------|---------|
| **Display start/end** | Quando a sessão aparece nas listagens dos formandos |
| **Access start/end** | Quando os formandos podem efetivamente aceder ao conteúdo da sessão |
| **Tutor access start/end** | Quando os tutores podem aceder à sessão (muitas vezes começa antes e termina depois do acesso dos formandos) |

Isto permite preparar a sessão antes da chegada dos formandos e manter o acesso dos tutores aberto após o fim da sessão para avaliação e relatórios.

## Lista de Sessões

![A lista de sessões a mostrar todas as sessões com nome, datas, número de cursos, número de formandos e estado](/.gitbook/assets/admin-session-list.png)

A lista de sessões mostra todas as sessões com:

* Nome da sessão
* Datas de início e de fim
* Estado (ativa, futura, passada)

Utilize a pesquisa e os filtros para encontrar sessões por nome, data, categoria ou estado.

## Editar uma Sessão

Clique numa sessão para editar:

* Alterar datas, nome ou categoria
* Adicionar ou remover cursos
* Alterar tutores de curso
* Adicionar ou remover formandos
* Ver dados de acompanhamento da sessão

## Inscrever Utilizadores

![A interface de inscrição na sessão para adicionar utilizadores individuais, turmas ou importar via CSV](/.gitbook/assets/admin-session-enrollment.png)

Pode inscrever utilizadores numa sessão através de:

* **Individual enrollment** — Pesquisar e adicionar utilizadores individuais
* **Class enrollment** — Adicionar uma turma inteira (grupo de utilizadores pré-definidos) de uma só vez
* **CSV import** — Carregar um ficheiro com atribuições utilizador-sessão

## Acesso à Sessão

Os formandos acedem às suas sessões através de **My sessions** na barra lateral. As sessões estão organizadas em:

* **Current sessions** — Atualmente ativas
* **Past sessions** — Terminadas
* **Upcoming sessions** — Ainda não iniciadas

## Dicas

* **Planear as datas com cuidado** — Certifique-se de que as datas de acesso dos tutores se estendem para além das datas dos formandos, para que os tutores possam preparar e fazer o acompanhamento
* **Utilizar turmas para inscrições recorrentes** — Se inscrever frequentemente os mesmos grupos, crie turmas e atribua-as às sessões
* **Manter as sessões organizadas** — Utilize categorias e convenções de nomenclatura claras para uma gestão fácil