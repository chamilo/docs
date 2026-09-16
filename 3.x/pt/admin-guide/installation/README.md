# Instalação

Esta secção cobre tudo o que precisa para instalar e configurar o Chamilo 3.0 no seu servidor.

O Chamilo 3.0 é uma aplicação PHP construída sobre o framework Symfony. Pode ser executado na maioria dos servidores baseados em Linux, já foi instalado e funciona no Windows Server com IIS, e suporta backends MySQL e MariaDB.

## Passos de instalação

1. **[Requisitos do servidor](server-requirements.md)** — Verifique se o seu servidor cumpre os requisitos mínimos
2. **[Assistente de instalação](installation-wizard.md)** — Execute o assistente de instalação baseado na web
3. **[Configuração](configuration.md)** — Configure as variáveis de ambiente e as definições do Symfony
4. **[Armazenamento na nuvem](cloud-storage.md)** — Configure backends de armazenamento na nuvem (opcional)
5. **[Configuração de e-mail](email-configuration.md)** — Configure a entrega de e-mail
6. **[Atualização](upgrading.md)** — Atualize a partir de uma versão anterior

## Visão geral rápida

O processo básico de instalação é:

1. Descarregar ou clonar o código-fonte do Chamilo
2. Instalar as dependências PHP com Composer se estiver a preparar a partir do código-fonte
3. Instalar as dependências JavaScript com npm/yarn e construir os recursos do frontend
4. Criar um ficheiro `.env` vazio para guardar mais tarde as credenciais da base de dados e outras definições
5. Alterar as permissões (gravável pelo servidor web) em *var/*, *config/* e *.env*
6. Executar o assistente de instalação baseado na web
7. Ligar-se com a sua primeira conta de administrador
8. Repor as permissões em *config/* e *.env*

As instruções detalhadas para cada passo encontram-se nas páginas ligadas acima.