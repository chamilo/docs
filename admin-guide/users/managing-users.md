# Gerenciando Usuários

Esta página aborda as tarefas diárias de criação, edição e gerenciamento de contas de usuários.

## Lista de Usuários

![A lista de usuários mostrando contas com colunas de nome, e-mail, função e status](/.gitbook/assets/admin-user-list.png)

No painel de administração, clique em **Lista de usuários** para ver todos os usuários da plataforma. A lista exibe:

* Avatar
* Nome
* Nome de usuário
* Endereço de e-mail
* Funções
* Status ativo/inativo
* Data de registro
* Data do último login

Use a ferramenta de **Busca avançada** para encontrar usuários específicos por nome, e-mail, função ou outros critérios.

## Criando um Usuário

![O formulário de criação de usuário com campos para nome, e-mail, nome de usuário, senha, função e idioma](/.gitbook/assets/admin-user-create-form.png)

1. Clique em **Adicionar um usuário** no painel de administração
2. Preencha os campos obrigatórios:
   * **Nome** e **Sobrenome**
   * **E-mail** — Deve ser único na plataforma
   * **Nome de usuário** — O nome de login (deve ser único)
   * **Senha** — Defina uma senha inicial
   * **Funções** — Selecione a(s) função(ões) do usuário na plataforma (estudante, professor, administrador, etc.)
   * **Idioma** — O idioma preferido da interface do usuário
3. Opcionalmente, preencha campos adicionais:
   * Código oficial (por exemplo, ID único na organização)
   * Número de telefone
   * Data de expiração — Desativar automaticamente a conta após uma data
   * Status ativo/inativo
   * Campos extras de perfil (se configurados)
4. Salve

## Importando Usuários

![A interface de importação de usuários para enviar arquivos CSV ou XML com dados de usuários](/.gitbook/assets/admin-user-import.png)

Para criação de usuários em massa, você pode importar usuários de um arquivo:

1. Clique em **Importar usuários** no painel de administração
2. Faça upload de um arquivo **CSV** ou **XML** com dados de usuários
3. Mapeie as colunas do arquivo para os campos de usuário do Chamilo
4. Escolha como lidar com usuários existentes (atualizar ou ignorar)
5. Importe

O arquivo de importação deve conter colunas para, pelo menos: nome, sobrenome, e-mail, nome de usuário e senha.

Nota: A coluna **Status** é o nome legado para **Função** e aceita apenas alguns valores, como 1 para professor, 5 para estudante. Ajustes adicionais nas funções só podem ser feitos manualmente posteriormente, editando o usuário.

## Exportando Usuários

Clique em **Exportar usuários** para baixar a lista de usuários como um arquivo CSV ou XML. Você pode filtrar quais usuários exportar por função, data de registro ou outros critérios.

## Editando um Usuário

Clique no nome de um usuário na lista de usuários para editar sua conta. Você pode modificar:

* Informações pessoais (nome, e-mail, telefone)
* Funções
* Senha (redefinir)
* Status ativo/inativo
* Data de expiração
* Campos extras de perfil

## Excluindo um Usuário

Ao excluir usuários (geralmente professores) que criaram conteúdo na plataforma, o sistema pode impedir que você exclua os usuários permanentemente e exibirá uma mensagem de aviso explicando que o usuário ainda está vinculado a alguns recursos. Se você confirmar a exclusão, o sistema não excluirá o conteúdo em si, mas o vinculará a um usuário neutro (chamamos de "Usuário de fallback") por razões de consistência de dados.

Para evitar isso, verifique os detalhes do usuário, exclua cada um de seus cursos um por um e, em seguida, exclua o usuário.

## Ações do Usuário

| Ação | Descrição |
|------|-----------|
| **Desativar** | Desabilita a conta de um usuário sem excluí-la. O usuário não pode fazer login, mas seus dados são preservados. |
| **Ativar** | Reativa uma conta previamente desativada. |
| **Entrar como** | Faz login na plataforma como este usuário (personificação). Útil para solução de problemas. |
| **Anonimizar** | Apaga todas as informações pessoais da conta, conforme definido pelo GDPR da UE. |
| **Excluir** | Exclui suavemente a conta do usuário. Use a aba **Usuários excluídos** para excluir permanentemente a conta e os dados associados. |

> **Entrar como** é uma funcionalidade poderosa. Use-a de forma responsável e apenas para fins legítimos de suporte.

## Operações em Lote

Selecione vários usuários na lista de usuários para realizar ações em lote:

* Ativar ou desativar vários usuários de uma vez
* Excluir vários usuários
* Atribuir usuários a um curso ou sessão

## Dicas

* **Use a importação CSV para grandes matrículas** — Ao integrar muitos usuários no início de um programa de treinamento, prepare um arquivo CSV e importe em massa
* **Defina datas de expiração** — Para usuários temporários (participantes de workshops, usuários de teste), defina uma data de expiração para desativar automaticamente suas contas
* **Desative em vez de excluir** — Quando um usuário sair, desative sua conta primeiro. Isso preserva seus registros de treinamento. Exclua apenas se tiver certeza de que os dados não são mais necessários.