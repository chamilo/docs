# Assistente de Instalação

O Chamilo 3.0 inclui um assistente de instalação baseado na web que o orienta na configuração inicial. O assistente é executado automaticamente quando você acessa a plataforma pela primeira vez.

## Antes de Começar

Certifique-se de que os seguintes pré-requisitos foram atendidos:

1. Seu servidor atende a todos os [requisitos do servidor](server-requirements.md).
2. Você baixou uma versão empacotada (zip ou tar.gz) do Chamilo.
3. Seu servidor web está configurado para servir o diretório `public/` como raiz de documentos.
4. Seu arquivo `.env` existe e está vazio (o assistente orientará a configuração do banco de dados).

## Passo 1: Idioma da Instalação

![Assistente de instalação Passo 1 — seleção de idioma](/.gitbook/assets/install-step1-language.png)

O primeiro passo permite selecionar o idioma do processo de instalação. Escolha o idioma preferido no menu suspenso.

Se o Chamilo detectar uma instalação existente (para uma atualização), exibirá o status da migração e oferecerá um caminho de atualização em vez de uma instalação nova.

## Passo 2: Verificação de Requisitos

![Assistente de instalação Passo 2 — verificação de requisitos mostrando versão do PHP, extensões e permissões de diretórios](/.gitbook/assets/install-step2-requirements.png)

O assistente verifica o ambiente do servidor:

* A **versão do PHP** é 8.3, 8.4 ou 8.5
* As **extensões PHP obrigatórias** estão instaladas (intl, gd, curl, zip, mbstring, xml, etc.)
* **Configurações PHP recomendadas** — `date.timezone` está configurado, limites adequados de upload/memória
* **Permissões de diretórios e arquivos** — `var/`, `config/` e `public/upload/` são graváveis pelo servidor web

Se algum requisito não for atendido, o assistente exibe avisos ou erros. Resolva-os antes de continuar.

## Passo 3: Licença

![Assistente de instalação Passo 3 — aceitação da licença](/.gitbook/assets/install-step3-license.png)

Este passo exibe a licença GNU/GPLv3. Você deve marcar a caixa **"I accept"** para continuar.

Opcionalmente, você pode expandir a seção **Contact information** para fornecer detalhes sobre sua organização (nome, e-mail, empresa, país). Isso é voluntário e ajuda a comunidade Chamilo a entender quem usa a plataforma, mas também nos permitirá contatá-lo *muito raramente* sobre eventos próximos a você.

## Passo 4: Configurações do Banco de Dados

![Assistente de instalação Passo 4 — configuração da conexão com o banco de dados](/.gitbook/assets/install-step4-database.png)

Informe os detalhes da conexão com o banco de dados:

| Campo | Descrição |
|-------|-------------|
| **Database host** | O nome do host ou o IP do servidor de banco de dados (por exemplo, `localhost` ou `127.0.0.1`) |
| **Database port** | Padrão: 3306 para MySQL/MariaDB |
| **Database name** | O nome do banco de dados a ser usado (apenas alfanuméricos e sublinhados) |
| **Database user** | Um usuário de banco de dados com privilégios totais no banco especificado |
| **Database password** | A senha do usuário do banco de dados |

Clique em **Check database connection** para testar. O assistente não permitirá que você continue até que a conexão seja bem-sucedida. Se o banco de dados já existir, um aviso será exibido.

## Passo 5: Configurações

![Assistente de instalação Passo 5 — conta de administrador, configurações do portal e configuração de e-mail](/.gitbook/assets/install-step5-config.png)

Este passo combina a criação da conta de administrador, as configurações do portal e a configuração de e-mail.

### Conta de Administrador

| Campo | Descrição |
|-------|-------------|
| **Login** | O nome de usuário do administrador |
| **Password** | Escolha uma senha forte — esta conta tem acesso total à plataforma |
| **First name** | O primeiro nome do administrador |
| **Last name** | O sobrenome do administrador |
| **Email** | Usado para notificações do sistema e redefinições de senha |
| **Phone** | Número de contato opcional |

Esses dados de administrador também serão usados pelo Chamilo para preencher os detalhes de contato de suporte, portanto certifique-se de reconfigurá-los nas configurações após a conclusão da instalação.

### Configurações do Portal

| Campo | Descrição |
|-------|-------------|
| **Language** | O idioma padrão da interface |
| **Portal name** | O nome da sua plataforma (por exemplo, "My Organization LMS") |
| **Company short name** | O nome abreviado da sua organização |
| **Company URL** | O site da sua organização |
| **Encryption method** | Algoritmo de hash de senhas — **bcrypt** é o recomendado |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### Configuração de E-mail

A seção de configurações de e-mail permite configurar o transporte de correio (SMTP, Amazon SES, Mailjet, etc.) e testar a entrega de e-mails. Consulte [Configuração de E-mail](email-configuration.md) para obter detalhes.

Todas essas configurações podem ser alteradas posteriormente no painel de administração.

## Passo 6: Última verificação antes da instalação

![Assistente de instalação Passo 6 — revisão de todas as definições antes da instalação](/.gitbook/assets/install-step6-review.png)

Este passo apresenta um resumo de tudo o que introduziu, para revisão:

* Credenciais de administrador (a palavra-passe está oculta por predefinição — clique no ícone do olho para a revelar)
* Definições do portal
* Detalhes da ligação à base de dados

Reveja com atenção e, em seguida, clique em **Install Chamilo** para executar a instalação. O assistente cria todas as tabelas da base de dados, preenche os dados iniciais e configura a plataforma.

## Passo 7: Instalação concluída

![Assistente de instalação Passo 7 — conclusão com conselhos de segurança e ligação ao portal](/.gitbook/assets/install-step7-complete.png)

Após a conclusão bem-sucedida da instalação, o assistente mostra:

* **Conselhos para começar** — Sugere a criação do seu primeiro curso para explorar a plataforma (como administrador, deve fazê-lo a partir do painel de administração)
* **Recomendações de segurança**:
  * Torne o diretório `config/` apenas de leitura (`chmod 0555`)
  * Elimine o diretório `public/main/install/`
* Uma **ligação para o seu portal** para iniciar sessão com as credenciais de administrador que acabou de criar

## Pós-instalação

Após concluir o assistente:

* **Remova ou restrinja o acesso ao instalador** -- O assistente não deve estar acessível após a instalação. O Chamilo normalmente bloqueia-o automaticamente, mas verifique se, ao voltar a visitar o URL de instalação, é redirecionado para a página de início de sessão.
* **Configure o envio de e-mail** -- Consulte [Configuração de e-mail](email-configuration.md).
* **Configure cópias de segurança** -- Antes de adicionar conteúdo, configure cópias de segurança automatizadas da base de dados e dos ficheiros (o Chamilo não fornece uma solução para isto, mas copiar a pasta var/ e a base de dados são os 2 elementos mais importantes).
* **Reveja as definições de segurança** -- Consulte [Definições de segurança](../platform-settings/security-settings.md).

## Resolução de problemas

| Problema | Solução |
|---------|----------|
| Página em branco no URL de instalação | Consulte os registos de erros do PHP. Altere temporariamente para `APP_ENV=dev` no .env para ver os erros no browser. |
| A ligação à base de dados falha | Verifique as credenciais, confirme que a base de dados existe e que o servidor de base de dados permite ligações a partir do anfitrião do servidor web. |
| Erros de permissão negada | Certifique-se de que `var/` é gravável pelo utilizador do servidor web. |
| Os recursos não carregam (sem CSS/JS) | Execute `yarn install && yarn build` para compilar os recursos de frontend. |