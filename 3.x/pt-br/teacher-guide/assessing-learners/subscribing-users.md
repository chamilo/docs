# Inscrevendo Usuários

Antes de avaliar um aluno, ele precisa estar inscrito no seu curso. O Chamilo oferece quatro formas de incluir alguém, dependendo de quem faz a inscrição e de se a pessoa já possui uma conta na plataforma.

| Método | Quem faz | Precisa de uma conta existente? |
|--------|----------|---------------------------------|
| [Inscrição pelo Administrador](#administrator-enrollment) | Administrador da plataforma | Sim |
| [Autoinscrição pelo Catálogo de Cursos](#self-enrollment-via-the-course-catalog) | O próprio aluno | Sim |
| [Inscrição Manual pela Ferramenta Usuários](#manual-enrollment-via-the-users-tool) | Professor (ou administrador do curso) | Sim |
| [Convite de Usuários por E-mail](#inviting-users-by-email) | Professor (ou administrador do curso) | **Não** |

## Inscrição pelo Administrador

Um administrador da plataforma pode inscrever qualquer usuário existente em qualquer curso diretamente pelo painel de administração — útil para integração em massa (por exemplo, importar uma lista de turma) ou quando o professor não tem permissão para gerenciar as inscrições. Consulte a seção [Cursos](../../admin-guide/courses/README.md) do Guia de Administração.

## Autoinscrição pelo Catálogo de Cursos

Se a [visibilidade](../creating-your-course/course-settings.md#course-visibility) do seu curso permitir, alunos com conta na plataforma podem se inscrever sozinhos encontrando o curso em **Explorar mais cursos** e clicando para participar — sem ação necessária da sua parte. Se isso está disponível e se exige senha é controlado pelas **Configurações de Inscrição** em [Configurações do Curso](../creating-your-course/course-settings.md#enrollment-settings).

## Inscrição Manual pela Ferramenta Usuários

Para inscrever alguém que já possui conta na plataforma, mas ainda não entrou por conta própria, abra a ferramenta **Usuários** do seu curso e clique no ícone **Adicionar usuários** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Adicionar usuários" data-size="line">.

1. Pesquise a pessoa por nome, nome de usuário, e-mail ou código oficial
2. Clique em **Registrar** na linha correspondente ou selecione várias com as caixas de seleção e use o menu **Ação** para registrá-las todas de uma vez

![Resultados da pesquisa na tela Inscrever usuários no curso, mostrando um aluno correspondente e um botão Registrar](/.gitbook/assets/course-users-subscribe-search.png)

Somente usuários que ainda não estão inscritos no curso aparecem nos resultados.

> Este ícone está disponível para professores por padrão. Um administrador da plataforma pode restringi-lo apenas a administradores por meio da configuração **Permitir Inscrição de Usuário no Curso pelo Administrador do Curso** (`allow_user_course_subscription_by_course_admin`) — se você não vir o ícone **Adicionar usuários**, peça ao seu administrador.

## Convite de Usuários por E-mail

Os três métodos acima pressupõem que a pessoa já possui uma conta na plataforma. Os **convites de curso** cobrem o caso em que ela não possui: você envia um convite para um endereço de e-mail, e o Chamilo envia a essa pessoa um link de uso único. Abrir o link permite criar uma conta e, assim que o registro é concluído, a pessoa é automaticamente inscrita no seu curso — sem etapa de inscrição separada.

### Acessando a Ferramenta

Abra a ferramenta **Usuários** do seu curso e clique no ícone **Convidar por e-mail** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Convidar por e-mail" data-size="line"> na barra de ferramentas, ao lado de **Adicionar usuários**:

![A barra de ferramentas da ferramenta Usuários, mostrando o ícone Adicionar usuários e o ícone Convidar por e-mail](/.gitbook/assets/course-users-invite-icon.png)

Isso abre a página **Convites de curso**.

### Quem Pode Enviar Convites

* Administradores da plataforma, sempre.
* Em um curso simples (não aberto em uma sessão): professores e outros usuários com direitos de edição no curso.
* Em uma sessão: o coach geral da sessão, ou um administrador da sessão — não o conjunto mais amplo de coaches do curso, pois enviar um convite aqui inscreve na *sessão inteira*, não apenas neste curso.

### Enviando um convite

1. Digite o endereço de e-mail do destinatário no formulário **Convidar por e-mail**
2. Clique em **Enviar convite**

![A página de convites do curso: o formulário de convite por e-mail e uma tabela de convites enviados com o respectivo status](/.gitbook/assets/course-invitations-list.png)

Todos os convites que você enviou para este curso aparecem abaixo do formulário, com o respectivo status:

| Status | Significado |
|--------|---------|
| **Pendente** | Enviado, ainda não utilizado. Ainda dentro do período de validade. |
| **Aceito** | O destinatário se cadastrou e foi inscrito. |
| **Revogado** | Você o cancelou antes de ser utilizado. |

Para um convite ainda pendente, a coluna **Ações** oferece:

* **Copiar** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Copiar" data-size="line"> — copia o link do convite, caso você prefira compartilhá-lo você mesmo (chat, pessoalmente) em vez de depender do e-mail.
* **Revogar** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Revogar" data-size="line"> — cancela o convite imediatamente; o link deixa de funcionar. Um convite já aceito não pode ser revogado.

> **O endereço de e-mail convidado não deve já ter uma conta nesta plataforma.** Se tiver, o envio do convite falha com uma mensagem pedindo que você inscreva esse usuário existente diretamente — por meio da [Inscrição manual via a ferramenta Usuários](#manual-enrollment-via-the-users-tool) acima.

### Convites em uma sessão

Se você abrir a ferramenta Usuários a partir de um curso que está em execução dentro de uma sessão, a página exibe um lembrete de que o convite se aplica à sessão inteira, e não apenas a este curso:

> *Este curso está aberto em uma sessão. Enviar um convite aqui inscreverá o destinatário na sessão inteira, não apenas neste curso.*

Isso espelha o funcionamento da inscrição em outras partes do Chamilo: você inscreve alguém em uma sessão como um todo, ou em um curso independente, mas nunca neste “único curso dentro desta sessão” como uma ação separada.

### O que a pessoa convidada vê

O e-mail contém um link para a página de cadastro. Ao abri-lo:

* Preenche e bloqueia o campo de e-mail com o endereço que você convidou — eles não podem se cadastrar com um endereço diferente usando esse link.
* Permite que concluam o cadastro **mesmo que o autocadastro esteja desativado em toda a plataforma** — desde que o administrador tenha ativado a configuração **Permitir cadastro via links de convite de curso** (veja abaixo). Sem ela, um link de convite só ajuda quando o autocadastro já estiver aberto de outra forma.
* Inscreve-os imediatamente no seu curso (ou na sessão) assim que enviarem o formulário e os autentica.

O link é de uso único e expira após 7 dias. Se expirar ou se o convite de destino for revogado, abri-lo se comporta como se o link nunca tivesse existido.

> A configuração de toda a plataforma **Permitir cadastro via links de convite de curso** (`registration.allow_invitation_registration`) determina se o seu link de convite pode abrir o cadastro quando o autocadastro geral estiver desativado. Consulte o administrador se os convites parecerem não funcionar em uma plataforma que, de outro modo, esteja fechada.

## Dicas

* **Adeque o método à situação** — administrador ou autoinscrição para pessoas que já usam a plataforma, inscrição manual para um usuário existente conhecido, convites para convidados externos, revisores ou qualquer pessoa que ainda não tenha uma conta.
* **Revogue convites de que você não precisa mais** — um convite pendente antigo ainda é um link válido e não utilizado; revogue-o se o destinatário pretendido não precisar mais de acesso, ou se você não tiver certeza de que ele chegou até essa pessoa.
* **Consulte o administrador se um método parecer indisponível** — vários desses fluxos (inscrição manual, convites, autoinscrição) podem ser restringidos ou desativados em toda a plataforma.