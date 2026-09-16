# Instalação

Esta seção aborda tudo o que você precisa para instalar e configurar o Chamilo 2.0 no seu servidor.

O Chamilo 2.0 é uma aplicação PHP construída no framework Symfony. Ele pode ser executado na maioria dos servidores baseados em Linux, foi instalado e funciona no Windows Server com IIS, e suporta backends MySQL e MariaDB.

## Passos de Instalação

1. **[Requisitos do Servidor](server-requirements.md)** — Verifique se o seu servidor atende aos requisitos mínimos
2. **[Assistente de Instalação](installation-wizard.md)** — Execute o assistente de instalação baseado na web
3. **[Configuração](configuration.md)** — Configure variáveis de ambiente e ajustes do Symfony
4. **[Armazenamento em Nuvem](cloud-storage.md)** — Configure backends de armazenamento em nuvem (opcional)
5. **[Configuração de E-mail](email-configuration.md)** — Configure a entrega de e-mails
6. **[Atualização](upgrading.md)** — Atualize de uma versão anterior

## Visão Geral Rápida

O processo básico de instalação é:

1. Baixe ou clone o código-fonte do Chamilo
2. Instale as dependências PHP com o Composer se estiver preparando a partir do código-fonte
3. Instale as dependências JavaScript com npm/yarn e construa os ativos de frontend
4. Crie um arquivo `.env` vazio para armazenar suas credenciais de banco de dados e outras configurações posteriormente
5. Altere as permissões (gravável pelo servidor web) em *var/*, *config/* e *.env*
6. Execute o assistente de instalação baseado na web
7. Conecte-se com sua primeira conta de administrador
8. Restaure as permissões em *config/* e *.env*

Instruções detalhadas para cada etapa estão nas páginas vinculadas acima.