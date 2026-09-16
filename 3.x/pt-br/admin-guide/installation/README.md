# Instalação

Esta seção aborda tudo o que você precisa para instalar e configurar o Chamilo 3.0 no seu servidor.

O Chamilo 3.0 é uma aplicação PHP construída sobre o framework Symfony. Pode ser executado na maioria dos servidores baseados em Linux, já foi instalado e funciona no Windows Server com IIS, e oferece suporte a backends MySQL e MariaDB.

## Etapas de instalação

1. **[Requisitos do servidor](server-requirements.md)** — Verifique se o seu servidor atende aos requisitos mínimos
2. **[Assistente de instalação](installation-wizard.md)** — Execute o assistente de instalação baseado na web
3. **[Configuração](configuration.md)** — Configure as variáveis de ambiente e as definições do Symfony
4. **[Armazenamento em nuvem](cloud-storage.md)** — Configure backends de armazenamento em nuvem (opcional)
5. **[Configuração de e-mail](email-configuration.md)** — Configure o envio de e-mails
6. **[Atualização](upgrading.md)** — Atualize a partir de uma versão anterior

## Visão geral rápida

O processo básico de instalação é:

1. Baixe ou clone o código-fonte do Chamilo
2. Instale as dependências PHP com o Composer se estiver preparando a partir do código-fonte
3. Instale as dependências JavaScript com npm/yarn e compile os assets do frontend
4. Crie um arquivo `.env` vazio para armazenar posteriormente as credenciais do banco de dados e outras configurações
5. Altere as permissões (gravável pelo servidor web) em *var/*, *config/* e *.env*
6. Execute o assistente de instalação baseado na web
7. Conecte-se com a sua primeira conta de administrador
8. Restaure as permissões em *config/* e *.env*

Instruções detalhadas para cada etapa estão nas páginas vinculadas acima.