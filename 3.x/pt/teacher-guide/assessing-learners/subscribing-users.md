# Subscrição de Utilizadores

Antes de poder avaliar um formando, este precisa de estar subscrito no seu curso. O Chamilo oferece quatro formas de incluir alguém, consoante quem efetua a subscrição e se a pessoa já tem uma conta na plataforma.

| Método | Quem o faz | Precisa de uma conta existente? |
|--------|-------------|------------------------------|
| [Inscrição pelo Administrador](#administrator-enrollment) | Administrador da plataforma | Sim |
| [Autoinscrição através do Catálogo de Cursos](#self-enrollment-via-the-course-catalog) | O próprio formando | Sim |
| [Inscrição Manual através da Ferramenta Utilizadores](#manual-enrollment-via-the-users-tool) | Professor (ou administrador do curso) | Sim |
| [Convite de Utilizadores por E-mail](#inviting-users-by-email) | Professor (ou administrador do curso) | **Não** |

## Inscrição pelo Administrador

Um administrador da plataforma pode subscrever qualquer utilizador existente em qualquer curso diretamente a partir do painel de administração — útil para integração em massa (p. ex., importação de uma lista de turma) ou quando um professor não tem permissões para gerir a inscrição. Consulte a secção [Cursos](../../admin-guide/courses/README.md) do Guia de Administração.

## Autoinscrição através do Catálogo de Cursos

Se a [visibilidade](../creating-your-course/course-settings.md#course-visibility) do seu curso o permitir, os formandos com conta na plataforma podem inscrever-se sozinhos, encontrando o seu curso em **Explorar mais cursos** e clicando para aderir — sem qualquer ação da sua parte. A disponibilidade desta opção, e se exige uma palavra-passe, é controlada pelas **Definições de Inscrição** em [Definições do Curso](../creating-your-course/course-settings.md#enrollment-settings).

## Inscrição Manual através da Ferramenta Utilizadores

Para subscrever alguém que já tem uma conta na plataforma mas ainda não aderiu por conta própria, abra a ferramenta **Utilizadores** do seu curso e clique no ícone **Adicionar utilizadores** <img src="../../.gitbook/assets/icons/mdi-account-plus.svg" alt="Adicionar utilizadores" data-size="line">.

1. Procure a pessoa por nome, nome de utilizador, e-mail ou código oficial
2. Clique em **Registar** na respetiva linha, ou selecione várias com as caixas de verificação e use o menu **Ação** para as registar todas de uma vez

![Resultados da pesquisa no ecrã Inscrever utilizadores no curso, mostrando um formando correspondente e um botão Registar](../../.gitbook/assets/course-users-subscribe-search.png)

Apenas os utilizadores que ainda não estão subscritos no curso aparecem nos resultados.

> Este ícone está disponível para os professores por predefinição. Um administrador da plataforma pode restringi-lo apenas a administradores através da definição **Permitir Subscrição de Utilizador no Curso pelo Administrador do Curso** (`allow_user_course_subscription_by_course_admin`) — se não vir o ícone **Adicionar utilizadores**, contacte o seu administrador.

## Convite de Utilizadores por E-mail

Os três métodos acima pressupõem que a pessoa já tem uma conta na plataforma. Os **convites de curso** cobrem o caso em que não tem: envia um convite para um endereço de e-mail, e o Chamilo envia a essa pessoa uma hiperligação de utilização única. Ao abrir a hiperligação, a pessoa pode criar uma conta e, assim que concluir o registo, fica automaticamente subscrita no seu curso — sem um passo de inscrição separado.

### Aceder à Ferramenta

Abra a ferramenta **Utilizadores** do seu curso e, em seguida, clique no ícone **Convidar por e-mail** <img src="../../.gitbook/assets/icons/mdi-email-outline.svg" alt="Convidar por e-mail" data-size="line"> na barra de ferramentas, junto a **Adicionar utilizadores**:

![A barra de ferramentas da ferramenta Utilizadores, mostrando o ícone Adicionar utilizadores e o ícone Convidar por e-mail](../../.gitbook/assets/course-users-invite-icon.png)

Isto abre a página **Convites de curso**.

### Quem Pode Enviar Convites

* Administradores da plataforma, sempre.
* Num curso simples (não aberto numa sessão): professores e outros utilizadores com direitos de edição no curso.
* Numa sessão: o coach geral da sessão, ou um administrador da sessão — não o conjunto mais alargado de coaches do curso, uma vez que enviar um convite aqui subscreve na *sessão inteira*, e não apenas neste curso.

### Envio de um convite

1. Introduza o endereço de e-mail do destinatário no formulário **Convidar por e-mail**
2. Clique em **Enviar convite**

![A página de convites do curso: o formulário de convite por e-mail e uma tabela de convites enviados com o respetivo estado](../../.gitbook/assets/course-invitations-list.png)

Todos os convites que enviou para este curso aparecem abaixo do formulário, com o respetivo estado:

| Estado | Significado |
|--------|---------|
| **Pendente** | Enviado, ainda não utilizado. Ainda dentro do período de validade. |
| **Aceite** | O destinatário registou-se e foi inscrito. |
| **Revogado** | Cancelou-o antes de ser utilizado. |

Para um convite ainda pendente, a coluna **Ações** oferece:

* **Copiar** <img src="../../.gitbook/assets/icons/mdi-content-copy.svg" alt="Copiar" data-size="line"> — copia a hiperligação do convite, caso prefira partilhá-la você mesmo (chat, pessoalmente) em vez de depender do e-mail.
* **Revogar** <img src="../../.gitbook/assets/icons/mdi-account-cancel.svg" alt="Revogar" data-size="line"> — cancela o convite imediatamente; a hiperligação deixa de funcionar. Um convite já aceite não pode ser revogado.

> **O endereço de e-mail convidado não pode ter já uma conta nesta plataforma.** Se tiver, o envio do convite falha com uma mensagem a pedir-lhe que inscreva esse utilizador existente diretamente — através de [Inscrição manual através da ferramenta Utilizadores](#manual-enrollment-via-the-users-tool) acima.

### Convites numa sessão

Se abrir a ferramenta Utilizadores a partir de um curso que está a decorrer dentro de uma sessão, a página mostra um lembrete de que o convite se aplica a toda a sessão, e não apenas a este curso:

> *Este curso está aberto numa sessão. Enviar um convite aqui inscreverá o destinatário em toda a sessão, e não apenas neste curso.*

Isto espelha o funcionamento da inscrição noutros pontos do Chamilo: inscreve-se alguém numa sessão como um todo, ou num curso autónomo, mas nunca neste «único curso dentro desta sessão» como uma ação separada.

### O que a pessoa convidada vê

O e-mail contém uma hiperligação para a página de registo. Ao abri-la:

* Pré-preenche e bloqueia o campo de e-mail para o endereço que convidou — não podem registar-se com um endereço diferente com essa hiperligação.
* Permite-lhes concluir o registo **mesmo que o autorregisto esteja atualmente desativado em toda a plataforma** — desde que o administrador tenha ativado a definição **Permitir o registo através de hiperligações de convite de curso** (ver abaixo). Sem isso, uma hiperligação de convite só ajuda quando o autorregisto estiver de outro modo aberto.
* Inscreve-os imediatamente no seu curso (ou na sessão) assim que submetem o formulário, e inicia a sessão.

A hiperligação é de utilização única e caduca ao fim de 7 dias. Se caducar ou se o convite de destino for revogado, abri-la comporta-se como se a hiperligação nunca tivesse existido.

> A definição de toda a plataforma **Permitir o registo através de hiperligações de convite de curso** (`registration.allow_invitation_registration`) determina se a sua hiperligação de convite pode abrir o registo quando o autorregisto geral está desligado. Pergunte ao administrador se os convites não parecerem funcionar numa plataforma de outro modo fechada.

## Dicas

* **Adeque o método à situação** — administrador ou autoinscrição para pessoas que já utilizam a plataforma, inscrição manual para um utilizador existente conhecido, convites para convidados externos, revisores ou qualquer pessoa que ainda não tenha uma conta.
* **Revogue convites de que já não precisa** — um convite pendente antigo continua a ser uma hiperligação válida e não utilizada; revogue-o se o destinatário pretendido já não precisar de acesso, ou se não tiver a certeza de que chegou até ele.
* **Confirme com o administrador se um método parecer indisponível** — vários destes fluxos (inscrição manual, convites, autoinscrição) podem ser restringidos ou desativados em toda a plataforma.