# FAQ

Perguntas frequentes para administradores do Chamilo 3.0.

## Installation and Setup

**Q: Qual versão de PHP o Chamilo 3.0 exige?**
A: PHP 8.3, 8.4 ou 8.5. Consulte [Requisitos do servidor](../installation/server-requirements.md).

**Q: Posso executar o Chamilo em alojamento partilhado?**
A: É possível, mas não é recomendado. O Chamilo 3.0 requer Composer, Node.js em modo de desenvolvimento e acesso à linha de comandos para instalação e manutenção. Um VPS ou um servidor dedicado proporciona uma experiência muito melhor.

**Q: Que base de dados devo utilizar?**
A: MySQL 8.0+ ou MariaDB 10.4+ são as mais utilizadas e as melhor testadas.

**Q: Posso instalar o Chamilo sem a linha de comandos?**
A: Sim, se utilizar a versão empacotada (.zip ou .tar.gz). Caso contrário, precisará da linha de comandos para instalar as dependências do Composer, gerar os recursos do frontend e executar as migrações da base de dados. O assistente baseado na Web trata da configuração da base de dados e da configuração inicial, mas os passos envolventes exigem acesso à consola em modo de desenvolvimento.

## Users and Authentication

**Q: Como reponho a palavra-passe de um utilizador?**
A: Vá a **Administration > User list**, encontre o utilizador, clique em editar e defina uma nova palavra-passe. Em alternativa, o utilizador pode usar a ligação "Forgot password" na página de início de sessão (se o correio eletrónico estiver configurado).

**Q: Posso importar utilizadores em massa?**
A: Sim. Vá a **Administration > Import users** e carregue um ficheiro CSV ou XML com os dados dos utilizadores. A importação permite criar novos utilizadores e atualizar os existentes.

**Q: Como integro com LDAP ou Active Directory?**
A: Configure as definições LDAP na configuração de autenticação. Consulte [LDAP](../authentication/ldap.md). Os utilizadores são sincronizados no início de sessão ou através de sincronização agendada.

**Q: Os utilizadores podem pertencer a várias sessões ao mesmo tempo?**
A: Sim. Os utilizadores podem ser inscritos em qualquer número de sessões simultaneamente. Cada sessão acompanha o progresso de forma independente.

## Courses and Content

**Q: Como faço a cópia de segurança de um único curso?**
A: Dentro do curso, vá a **Maintenance > Create a backup**. Isto gera um arquivo descarregável do conteúdo e das definições do curso. Pode restaurá-lo na mesma instância do Chamilo ou noutra.

**Q: Posso copiar um curso?**
A: Sim. Utilize **Administration > Copy course** ou a ferramenta de manutenção do curso dentro do próprio curso. Pode copiar conteúdo entre cursos ou criar um novo curso a partir de um existente.

**Q: Que versões de SCORM são suportadas?**
A: O Chamilo suporta SCORM 1.2. Os pacotes SCORM são importados como percursos de aprendizagem.

**Q: Como limito quem pode criar cursos?**
A: Vá a **Administration > Configuration settings > Course** e desative **Allow non administrators (teachers) to create new courses** (`allow_users_to_create_courses`). Quando desativado, apenas os administradores podem criar cursos. Em alternativa, pode definir um limite para o número de cursos que qualquer professor pode criar.

## Performance and Maintenance

**Q: A plataforma está lenta. O que devo verificar primeiro?**
A: Por ordem de impacto: (1) Certifique-se de que `APP_ENV=prod` e `APP_DEBUG=0` em `.env`. (2) Verifique se o PHP OPcache está ativado. (3) Verifique o desempenho da base de dados. (4) Consulte [Ajuste de desempenho](../platform-settings/performance-tuning.md).

**Q: Como limpo a cache?**
A: Execute `php bin/console cache:clear --env=prod` a partir da linha de comandos. Não elimine manualmente o diretório `var/cache/` enquanto a aplicação estiver em execução.

**Q: Quanto espaço em disco o Chamilo precisa?**
A: A aplicação em si precisa de cerca de 2 GB descomprimida. O espaço total depende do conteúdo carregado (documentos, vídeos, pacotes SCORM). Monitorize a utilização do disco e planeie em conformidade.

**Q: Como configuro cópias de segurança automatizadas?**
A: Consulte [Cópias de segurança](../maintenance/backups.md). No mínimo, agende um despejo diário da base de dados e cópias de segurança regulares ao nível dos ficheiros do diretório de carregamento.

## Email

**Q: Os utilizadores não estão a receber correio eletrónico. O que devo verificar?**
A: (1) Verifique `MAILER_DSN` em `.env`. (2) Execute `php bin/console mailer:test someone@example.com` para testar. (3) Verifique as pastas de spam. (4) Verifique os registos DNS SPF/DKIM. Consulte [Configuração de correio eletrónico](../installation/email-configuration.md).

**Q: Posso usar o Gmail para enviar correio eletrónico?**
A: Sim, para plataformas pequenas ou para desenvolvimento. Utilize uma App Password e tenha em conta os limites diários de envio do Gmail (500 mensagens/dia para contas regulares).

## Security

**Q: Como forço HTTPS?**
A: Configure o servidor Web para redirecionar HTTP para HTTPS. Além disso, ative a definição "Force HTTPS" em **Administration > Configuration settings > Security**. Consulte [Definições de segurança](../platform-settings/security-settings.md).

**Q: Como bloqueio ataques de início de sessão por força bruta?**
A: Configure o número máximo de tentativas de início de sessão e o CAPTCHA nas definições de segurança. Considere também utilizar fail2ban ao nível do servidor para proteção adicional.

**Q: Um utilizador esqueceu a palavra-passe e o correio eletrónico não está a funcionar. Como o ajudo?**
A: Como administrador, edite a conta do utilizador diretamente e defina uma nova palavra-passe. Vá a **Administration > User list**, encontre a conta e atualize o campo da palavra-passe.

## Atualizações

**Q: Posso atualizar diretamente do Chamilo 2.x para o 3.0?**
A: Sim, mas trata-se de uma migração importante, não de uma atualização simples. Consulte [Atualização](../installation/upgrading.md). Teste sempre primeiro num servidor de homologação.

**Q: Os meus plugins funcionarão após a atualização para o 3.0?**
A: Não. Os plugins da versão 2.x não são compatíveis com a 3.0 e devem ser reescritos ou substituídos por funcionalidades equivalentes da 3.0.