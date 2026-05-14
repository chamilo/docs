# Assistente de Instalação

O Chamilo 2.0 inclui um assistente de instalação baseado na web que o guia pelo processo de configuração inicial. O assistente é executado automaticamente quando você acessa a plataforma pela primeira vez.

## Antes de Começar

Certifique-se de que os seguintes pré-requisitos sejam atendidos:

1. Seu servidor atende a todos os [requisitos do servidor](server-requirements.md).
2. Você baixou uma versão empacotada (zip ou tar.gz) do Chamilo.
3. Seu servidor web está configurado para servir o diretório `public/` como raiz do documento.
4. Seu arquivo `.env` existe e está vazio (o assistente guiará a configuração do banco de dados).

## Passo 1: Idioma de Instalação

![Assistente de instalação Passo 1 — seleção de idioma](/.gitbook/assets/install-step1-language.png)

O primeiro passo permite que você selecione o idioma para o processo de instalação. Escolha seu idioma preferido no menu suspenso.

Se o Chamilo detectar uma instalação existente (para uma atualização), ele exibirá o status da migração e oferecerá um caminho de atualização em vez de uma instalação nova.

## Passo 2: Verificação de Requisitos

![Assistente de instalação Passo 2 — verificação de requisitos mostrando versão do PHP, extensões e permissões de diretório](/.gitbook/assets/install-step2-requirements.png)

O assistente verifica o ambiente do seu servidor:

* **Versão do PHP** é 8.2 ou superior
* **Extensões PHP necessárias** estão instaladas (intl, gd, curl, zip, mbstring, xml, etc.)
* **Configurações PHP recomendadas** — `date.timezone` está configurado, limites adequados de upload/memória
* **Permissões de diretórios e arquivos** — `var/`, `config/` e `public/upload/` têm permissão de escrita pelo servidor web

Se algum requisito não for atendido, o assistente exibirá avisos ou erros. Resolva-os antes de prosseguir.

## Passo 3: Licença

![Assistente de instalação Passo 3 — aceitação da licença](/.gitbook/assets/install-step3-license.png)

Este passo exibe a licença GNU/GPLv3. Você deve marcar a caixa **"Eu aceito"** para prosseguir.

Opcionalmente, você pode expandir a seção **Informações de contato** para fornecer detalhes sobre sua organização (nome, e-mail, empresa, país). Isso é voluntário e ajuda a comunidade Chamilo a entender quem usa a plataforma, mas também nos permitirá contatá-lo *muito raramente* sobre eventos que acontecem perto de você.

## Passo 4: Configurações do Banco de Dados

![Assistente de instalação Passo 4 — configuração da conexão com o banco de dados](/.gitbook/assets/install-step4-database.png)

Insira os detalhes da conexão com o banco de dados:

| Campo | Descrição |
|-------|-----------|
| **Host do banco de dados** | O nome do host ou IP do seu servidor de banco de dados (por exemplo, `localhost` ou `127.0.0.1`) |
| **Porta do banco de dados** | Padrão: 3306 para MySQL/MariaDB |
| **Nome do banco de dados** | O nome do banco de dados a ser usado (somente alfanuméricos e sublinhados) |
| **Usuário do banco de dados** | Um usuário do banco de dados com privilégios completos no banco especificado |
| **Senha do banco de dados** | A senha para o usuário do banco de dados |

Clique em **Verificar conexão com o banco de dados** para testar. O assistente não permitirá que você prossiga até que a conexão seja bem-sucedida. Se o banco de dados já existir, um aviso será exibido.

## Passo 5: Configurações Gerais

![Assistente de instalação Passo 5 — conta de administrador, configurações do portal e configuração de e-mail](/.gitbook/assets/install-step5-config.png)

Este passo combina a criação da conta de administrador, configurações do portal e configuração de e-mail.

### Conta de Administrador

| Campo | Descrição |
|-------|-----------|
| **Login** | O nome de usuário do administrador |
| **Senha** | Escolha uma senha forte — esta conta tem acesso total à plataforma |
| **Nome** | O primeiro nome do administrador |
| **Sobrenome** | O sobrenome do administrador |
| **E-mail** | Usado para notificações do sistema e redefinições de senha |
| **Telefone** | Número de contato opcional |

Esses detalhes do administrador também serão usados pelo Chamilo para preencher os detalhes de contato de suporte, então certifique-se de reconfigurar isso nas configurações após a conclusão da instalação.

### Configurações do Portal

| Campo | Descrição |
|-------|-----------|
| **Idioma** | O idioma padrão da interface |
| **Nome do portal** | O nome da sua plataforma (por exemplo, "LMS da Minha Organização") |
| **Nome abreviado da empresa** | O nome abreviado da sua organização |
| **URL da empresa** | O site da sua organização |
| **Método de criptografia** | Algoritmo de hash de senha — **bcrypt** é recomendado |
| **Permitir auto-registro** | Sim / Não / Após aprovação |
| **Permitir auto-registro como instrutor** | Sim / Não |

### Configuração de E-mail

A seção de configurações de e-mail permite que você configure o transporte de e-mail (SMTP, Amazon SES, Mailjet, etc.) e teste o envio de e-mails. Consulte [Configuração de E-mail](email-configuration.md) para detalhes.

Todas essas configurações podem ser alteradas posteriormente no painel de administração.

---
## Passo 6: Última Verificação Antes da Instalação

![Assistente de instalação Passo 6 — revisão de todas as configurações antes da instalação](/.gitbook/assets/install-step6-review.png)

Este passo exibe um resumo de tudo o que você inseriu para revisão:

* Credenciais do administrador (a senha está oculta por padrão — clique no ícone de olho para revelá-la)
* Configurações do portal
* Detalhes da conexão com o banco de dados

Revise cuidadosamente e, em seguida, clique em **Instalar Chamilo** para executar a instalação. O assistente cria todas as tabelas do banco de dados, preenche os dados iniciais e configura a plataforma.

## Passo 7: Instalação Concluída

![Assistente de instalação Passo 7 — conclusão com conselhos de segurança e link para o portal](/.gitbook/assets/install-step7-complete.png)

Após a conclusão bem-sucedida da instalação, o assistente exibe:

* **Conselhos para começar** — Sugere criar seu primeiro curso para explorar a plataforma (como administrador, você precisa fazer isso a partir do painel de administração)
* **Recomendações de segurança**:
  * Torne o diretório `config/` somente leitura (`chmod 0555`)
  * Exclua o diretório `public/main/install/`
* Um **link para o seu portal** para fazer login com as credenciais de administrador que você acabou de criar

## Pós-Instalação

Após completar o assistente:

* **Remova ou restrinja o acesso ao instalador** — O assistente não deve estar acessível após a instalação. O Chamilo geralmente o bloqueia automaticamente, mas verifique se ao revisitar a URL de instalação você é redirecionado para a página de login.
* **Configure a entrega de e-mails** — Consulte [Configuração de E-mail](email-configuration.md).
* **Configure backups** — Antes de adicionar conteúdo, configure backups automáticos do banco de dados e dos arquivos (o Chamilo não oferece uma solução para isso, mas copiar a pasta var/ e o banco de dados são os dois elementos mais importantes).
* **Revise as configurações de segurança** — Consulte [Configurações de Segurança](../platform-settings/security-settings.md).

## Solução de Problemas

| Problema | Solução |
|---------|----------|
| Página em branco na URL de instalação | Verifique os logs de erro do PHP. Altere temporariamente para `APP_ENV=dev` no arquivo .env para ver os erros no navegador. |
| Falha na conexão com o banco de dados | Verifique as credenciais, confirme se o banco de dados existe, verifique se o servidor de banco de dados permite conexões a partir do host do servidor web. |
| Erros de permissão negada | Certifique-se de que o diretório `var/` tem permissão de escrita para o usuário do servidor web. |
| Ativos não carregam (sem CSS/JS) | Execute `yarn install && yarn build` para compilar os ativos de frontend. |