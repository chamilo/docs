# Gerenciamento de Usuários

Esta página aborda as tarefas cotidianas de criação, edição e gerenciamento de contas de usuário.

## Lista de Usuários

![A lista de usuários mostrando contas com colunas de nome, e-mail, função e status](../../.gitbook/assets/admin-user-list.png)

No painel de administração, clique em **Lista de usuários** para ver todos os usuários da plataforma. A lista exibe:

* Avatar
* Nome
* Nome de usuário
* Endereço de e-mail
* Funções
* Status ativo/inativo
* Data de registro
* Data do último login

Use a ferramenta **Pesquisa avançada** para encontrar usuários específicos por nome, e-mail, função ou outros critérios.

## Criando um Usuário

![O formulário de criação de usuário com campos para nome, e-mail, nome de usuário, senha, função e idioma](../../.gitbook/assets/admin-user-create-form.png)

1. Clique em **Adicionar um usuário** no painel de administração
2. Preencha os campos obrigatórios:
   * **Nome** e **Sobrenome**
   * **E-mail** — Deve ser exclusivo na plataforma
   * **Nome de usuário** — O nome de login (deve ser exclusivo)
   * **Senha** — Defina uma senha inicial
   * **Funções** — Selecione a(s) função(ões) do usuário na plataforma (aluno, professor, administrador etc.)
   * **Idioma** — O idioma preferido da interface do usuário
3. Opcionalmente, preencha campos adicionais:
   * Código oficial (por exemplo, ID exclusivo na organização)
   * Número de telefone
   * Data de expiração — Desativa automaticamente a conta após uma data
   * Status ativo/inativo
   * Campos extras de perfil (se configurados)
4. Salve

## Importando Usuários

![A interface de importação de usuários para envio de arquivos CSV ou XML com dados de usuários](../../.gitbook/assets/admin-user-import.png)

Para criação de usuários em massa, você pode importar usuários a partir de um arquivo:

1. Clique em **Importar usuários** no painel de administração
2. Envie um arquivo **CSV** ou **XML** com os dados dos usuários
3. Mapeie as colunas do arquivo para os campos de usuário do Chamilo
4. Escolha como tratar usuários existentes (atualizar ou ignorar)
5. Importe

O arquivo de importação deve conter colunas para, no mínimo: nome, sobrenome, e-mail, nome de usuário e senha.

Observação: A coluna **Status** é o nome legado de **Função** e aceita apenas alguns valores, como 1 para professor e 5 para aluno. Ajustes posteriores das funções só podem ser feitos manualmente, editando o usuário.

## Exportando Usuários

Clique em **Exportar usuários** para baixar a lista de usuários como arquivo CSV ou XML. Você pode filtrar quais usuários exportar por função, data de registro ou outros critérios.

## Editando um Usuário

Clique no nome de um usuário na lista de usuários para editar a conta. Você pode modificar:

* Informações pessoais (nome, e-mail, telefone)
* Funções
* Senha (redefinir)
* Status ativo/inativo
* Data de expiração
* Campos extras de perfil

## Excluindo um Usuário

Ao excluir usuários (geralmente professores) que criaram conteúdo na plataforma, o sistema pode impedir a exclusão permanente e exibir uma mensagem de aviso explicando que o usuário ainda está vinculado a alguns recursos. Se você confirmar a exclusão, o sistema não excluirá o conteúdo em si, mas o vinculará a um usuário neutro (chamado de "usuário de fallback") por motivos de consistência dos dados.

Para evitar isso, verifique os detalhes do usuário, exclua cada um dos cursos dele um a um e, em seguida, exclua o usuário.

## Ações de Usuário

| Ação | Descrição |
|--------|-------------|
| **Desativar** | Desabilita a conta de um usuário sem excluí-la. O usuário não consegue fazer login, mas seus dados são preservados. |
| **Ativar** | Reabilita uma conta previamente desativada. |
| **Entrar como** | Faz login na plataforma como este usuário (impersonação). Útil para resolução de problemas. |
| **Anonimizar** | Apaga todas as informações pessoais da conta, conforme definido pelo GDPR da UE. |
| **Excluir** | Exclusão lógica da conta do usuário. Use a aba **Usuários excluídos** para excluir permanentemente a conta e os dados associados. |

> **Entrar como** é um recurso poderoso. Use-o com responsabilidade e apenas para fins legítimos de suporte.

## Operações em Lote

Selecione vários usuários na lista de usuários para executar ações em lote:

* Ativar ou desativar vários usuários de uma vez
* Excluir vários usuários
* Atribuir usuários a um curso ou sessão

## Dicas

* **Use a importação CSV para matrículas em grande escala** — Ao integrar muitos usuários no início de um programa de formação, prepare um arquivo CSV e importe em massa
* **Defina datas de expiração** — Para usuários temporários (participantes de workshops, usuários em período de avaliação), defina uma data de expiração para desativar automaticamente as contas
* **Desative em vez de excluir** — Quando um usuário sai, desative a conta primeiro. Isso preserva os registros de formação. Exclua somente se tiver certeza de que os dados não são mais necessários.