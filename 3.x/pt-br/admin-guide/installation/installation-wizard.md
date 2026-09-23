# Assistente de Instalação

O Chamilo 3.0 inclui um assistente de instalação baseado na web que o guia pela configuração inicial. O assistente é executado automaticamente quando você acessa a plataforma pela primeira vez.

## Antes de Começar

Certifique-se de que os seguintes pré-requisitos foram atendidos:

1. Seu servidor atende a todos os [requisitos do servidor](server-requirements.md).
2. Você baixou uma versão empacotada (zip ou tar.gz) do Chamilo.
3. Seu servidor web está configurado para servir o diretório `public/` como a raiz de documentos.
4. Seu arquivo `.env` existe e está vazio (o assistente guiará a configuração do banco de dados).

## Passo 1: Idioma da Instalação

![Assistente de instalação Passo 1 — seleção de idioma](../../.gitbook/assets/install-step1-language.png)

O primeiro passo permite selecionar o idioma do processo de instalação. Escolha o idioma preferido no menu suspenso.

Se o Chamilo detectar uma instalação existente (para uma atualização), ele exibirá o status da migração e oferecerá um caminho de atualização em vez de uma instalação nova.

## Passo 2: Verificação de Requisitos

![Assistente de instalação Passo 2 — verificação de requisitos mostrando versão do PHP, extensões e permissões de diretórios](../../.gitbook/assets/install-step2-requirements.png)

O assistente verifica o ambiente do servidor:

* A **versão do PHP** é 8.3, 8.4 ou 8.5
* As **extensões PHP obrigatórias** estão instaladas (intl, gd, curl, zip, mbstring, xml, etc.)
* **Configurações PHP recomendadas** — `date.timezone` está configurado, limites adequados de upload/memória
* **Permissões de diretórios e arquivos** — `var/`, `config/` e `public/upload/` são graváveis pelo servidor web

Se algum requisito não for atendido, o assistente exibe avisos ou erros. Resolva-os antes de continuar.

## Passo 3: Licença

![Assistente de instalação Passo 3 — aceite da licença](../../.gitbook/assets/install-step3-license.png)

Este passo exibe a licença GNU/GPLv3. Você deve marcar a caixa **"I accept"** para continuar.

Opcionalmente, você pode expandir a seção **Contact information** para fornecer detalhes sobre sua organização (nome, e-mail, empresa, país). Isso é voluntário e ajuda a comunidade Chamilo a entender quem usa a plataforma, mas também nos permitirá entrar em contato *muito raramente* sobre eventos próximos a você.

## Passo 4: Configurações do Banco de Dados

![Assistente de instalação Passo 4 — configuração da conexão com o banco de dados](../../.gitbook/assets/install-step4-database.png)

Informe os detalhes da conexão com o banco de dados:

| Campo | Descrição |
|-------|-------------|
| **Database host** | O hostname ou IP do servidor de banco de dados (por exemplo, `localhost` ou `127.0.0.1`) |
| **Database port** | Padrão: 3306 para MySQL/MariaDB |
| **Database name** | O nome do banco de dados a ser usado (somente alfanumérico e sublinhados) |
| **Database user** | Um usuário de banco de dados com privilégios totais no banco especificado |
| **Database password** | A senha do usuário do banco de dados |

Clique em **Check database connection** para testar. O assistente não permitirá que você continue até que a conexão seja bem-sucedida. Se o banco de dados já existir, um aviso será exibido.

## Passo 5: Configurações

![Assistente de instalação Passo 5 — conta de administrador, configurações do portal e configuração de e-mail](../../.gitbook/assets/install-step5-config.png)

Este passo combina a criação da conta de administrador, as configurações do portal e a configuração de e-mail.

### Conta de Administrador

| Campo | Descrição |
|-------|-------------|
| **Login** | O nome de usuário do administrador |
| **Password** | Escolha uma senha forte — esta conta tem acesso total à plataforma |
| **First name** | O primeiro nome do administrador |
| **Last name** | O sobrenome do administrador |
| **Email** | Usado para notificações do sistema e redefinição de senha |
| **Phone** | Número de contato opcional |

Esses dados de administrador também serão usados pelo Chamilo para preencher os detalhes de contato de suporte, portanto certifique-se de reconfigurá-los nas configurações após a conclusão da instalação.

### Configurações do Portal

| Campo | Descrição |
|-------|-------------|
| **Language** | O idioma padrão da interface |
| **Portal name** | O nome da sua plataforma (por exemplo, "My Organization LMS") |
| **Company short name** | O nome abreviado da sua organização |
| **Company URL** | O site da sua organização |
| **Encryption method** | Algoritmo de hash de senha — **bcrypt** é o recomendado |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### Configuração de E-mail

A seção de configurações de e-mail permite configurar o transporte de e-mail (SMTP, Amazon SES, Mailjet, etc.) e testar o envio. Consulte [Configuração de E-mail](email-configuration.md) para detalhes.

Todas essas configurações podem ser alteradas posteriormente no painel de administração.

## Passo 6: Última verificação antes da instalação

![Assistente de instalação Passo 6 — revisão de todas as configurações antes da instalação](../../.gitbook/assets/install-step6-review.png)

Este passo exibe um resumo de tudo o que você informou para revisão:

* Credenciais do administrador (a senha fica oculta por padrão — clique no ícone de olho para revelá-la)
* Configurações do portal
* Detalhes da conexão com o banco de dados

Revise com atenção e, em seguida, clique em **Install Chamilo** para executar a instalação. O assistente cria todas as tabelas do banco de dados, popula os dados iniciais e configura a plataforma.

## Passo 7: Instalação concluída

![Assistente de instalação Passo 7 — conclusão com recomendações de segurança e link do portal](../../.gitbook/assets/install-step7-complete.png)

Após a conclusão bem-sucedida da instalação, o assistente exibe:

* **Conselhos para começar** — Sugere criar o primeiro curso para explorar a plataforma (como administrador, você precisa fazer isso no painel de administração)
* **Recomendações de segurança**:
  * Torne o diretório `config/` somente leitura (`chmod 0555`)
  * Exclua o diretório `public/main/install/`
* Um **link para o seu portal** para entrar com as credenciais de administrador que você acabou de criar

## Pós-instalação

Após concluir o assistente:

* **Remova ou restrinja o acesso ao instalador** -- O assistente não deve permanecer acessível após a instalação. O Chamilo normalmente o bloqueia automaticamente, mas verifique se revisitar a URL de instalação redireciona para a página de login.
* **Configure o envio de e-mail** -- Consulte [Configuração de e-mail](email-configuration.md).
* **Configure backups** -- Antes de adicionar conteúdo, configure backups automatizados do banco de dados e dos arquivos (o Chamilo não oferece uma solução para isso, mas copiar a pasta var/ e o banco de dados são os 2 elementos mais importantes).
* **Revise as configurações de segurança** -- Consulte [Configurações de segurança](../platform-settings/security-settings.md).

## Solução de problemas

| Problema | Solução |
|---------|----------|
| Página em branco na URL de instalação | Verifique os logs de erro do PHP. Altere temporariamente para `APP_ENV=dev` no .env para ver os erros no navegador. |
| Falha na conexão com o banco de dados | Verifique as credenciais, confirme se o banco de dados existe e se o servidor de banco de dados permite conexões a partir do host do servidor web. |
| Erros de permissão negada | Garanta que `var/` seja gravável pelo usuário do servidor web. |
| Assets não carregam (sem CSS/JS) | Execute `yarn install && yarn build` para compilar os assets do frontend. |