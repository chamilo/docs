# Perguntas Frequentes (FAQ)

Perguntas frequentes para administradores do Chamilo 2.0.

## Instalação e Configuração

**P: Qual versão do PHP é necessária para o Chamilo 2.0?**  
R: PHP 8.2 ou superior. Recomenda-se o PHP 8.3. Consulte [Requisitos do Servidor](../installation/server-requirements.md).

**P: Posso executar o Chamilo em hospedagem compartilhada?**  
R: É possível, mas não recomendado. O Chamilo 2.0 requer Composer, Node.js no modo de desenvolvimento e acesso à linha de comando para instalação e manutenção. Um VPS ou servidor dedicado oferece uma experiência muito melhor.

**P: Qual banco de dados devo usar?**  
R: MySQL 8.0+ ou MariaDB 10.4+ são os mais utilizados e melhor testados.

**P: Posso instalar o Chamilo sem usar a linha de comando?**  
R: Sim, se você usar a versão empacotada (.zip ou .tar.gz). Caso contrário, será necessário usar a linha de comando para instalar dependências do Composer, construir ativos de frontend e executar migrações de banco de dados. O assistente baseado na web cuida da instalação do banco de dados e da configuração inicial, mas as etapas relacionadas exigem acesso ao shell no modo de desenvolvimento.

## Usuários e Autenticação

**P: Como posso redefinir a senha de um usuário?**  
R: Vá para **Administração > Lista de Usuários**, encontre o usuário, clique em editar e defina uma nova senha. Alternativamente, o usuário pode usar o link "Esqueceu a senha" na página de login (desde que o e-mail esteja configurado).

**P: Posso importar usuários em massa?**  
R: Sim. Vá para **Administração > Importar Usuários** e faça upload de um arquivo CSV ou XML com os dados dos usuários. A importação suporta a criação de novos usuários e a atualização de usuários existentes.

**P: Como integro com LDAP ou Active Directory?**  
R: Configure as definições de LDAP na configuração de autenticação. Consulte [LDAP](../authentication/ldap.md). Os usuários são sincronizados no login ou por meio de uma sincronização agendada.

**P: Os usuários podem participar de várias sessões simultaneamente?**  
R: Sim. Os usuários podem estar inscritos em qualquer número de sessões simultaneamente. Cada sessão acompanha o progresso de forma independente.

## Cursos e Conteúdo

**P: Como faço backup de um único curso?**  
R: Dentro do curso, vá para **Manutenção > Fazer Backup**. Isso gerará um arquivo baixável com o conteúdo e as configurações do curso. Você pode restaurá-lo na mesma instância do Chamilo ou em outra.

**P: Posso copiar um curso?**  
R: Sim. Use **Administração > Copiar Curso** ou a ferramenta de manutenção dentro do curso. Você pode copiar conteúdo entre cursos ou criar um novo curso com base em um existente.

**P: Quais versões do SCORM são suportadas?**  
R: O Chamilo suporta SCORM 1.2. Pacotes SCORM são importados como caminhos de aprendizagem.

**P: Como restrinjo quem pode criar cursos?**  
R: Vá para **Administração > Configurações de Configuração > Curso** e desative a opção **Permitir que não administradores (professores) criem novos cursos** (`allow_users_to_create_courses`). Quando desativado, apenas administradores podem criar cursos. Alternativamente, você pode definir um limite para o número de cursos que um professor pode criar.

## Desempenho e Manutenção

**P: A plataforma está lenta. O que devo verificar primeiro?**  
R: Em ordem de impacto: (1) Certifique-se de que `APP_ENV=prod` e `APP_DEBUG=0` estão definidos em `.env`. (2) Verifique se o PHP OPcache está ativado. (3) Verifique o desempenho do banco de dados. (4) Consulte [Otimização de Desempenho](../platform-settings/performance-tuning.md).

**P: Como limpo o cache?**  
R: Execute `php bin/console cache:clear --env=prod` a partir da linha de comando. Não remova manualmente a pasta `var/cache/` enquanto o aplicativo estiver ativo.

**P: Quanto espaço em disco o Chamilo precisa?**  
R: O aplicativo em si requer cerca de 2 GB de espaço descompactado. O espaço total depende do conteúdo enviado (documentos, vídeos, pacotes SCORM). Monitore o uso do disco e planeje adequadamente.

**P: Como configuro backups automáticos?**  
R: Consulte [Backups](../maintenance/backups.md). Programe pelo menos um dump diário do banco de dados e backups regulares em nível de arquivo da pasta de upload.

## E-mail

**P: Os usuários não estão recebendo e-mails. O que devo verificar?**  
R: (1) Verifique `MAILER_DSN` em `.env`. (2) Execute `php bin/console mailer:test someone@example.com` para testar. (3) Verifique as pastas de spam. (4) Verifique os registros DNS SPF/DKIM. Consulte [Configuração de E-mail](../installation/email-configuration.md).

**P: Posso usar o Gmail para enviar e-mails?**  
R: Sim, para plataformas pequenas ou desenvolvimento. Use uma senha de aplicativo e esteja ciente dos limites diários de envio do Gmail (500 e-mails/dia para contas regulares).

---
## Segurança

**P: Como forçar o uso de HTTPS?**  
R: Configure o seu servidor web para redirecionar HTTP para HTTPS. Além disso, ative a configuração "Forçar HTTPS" em **Administração > Configurações de Configuração > Segurança**. Consulte [Configurações de Segurança](../platform-settings/security-settings.md).

**P: Como bloquear ataques de força bruta em logins?**  
R: Configure o número máximo de tentativas de login e o CAPTCHA nas configurações de segurança. Considere também usar o fail2ban no nível do servidor para proteção adicional.

**P: Um usuário esqueceu a senha e o e-mail não está funcionando. Como posso ajudar?**  
R: Como administrador, você pode editar diretamente a conta do usuário e definir uma nova senha. Vá para **Administração > Lista de Usuários**, localize a conta e atualize o campo de senha.

---
## Atualizações

**P: Posso atualizar diretamente do Chamilo 1.11.x para o 2.0?**  
R: Sim, mas trata-se de uma grande migração, não de uma simples atualização. Consulte [Atualização](../installation/upgrading.md). Sempre teste primeiro em um servidor de staging.

**P: Meus plugins funcionarão após a atualização para o 2.0?**  
R: Não. Plugins da versão 1.11.x não são compatíveis com o 2.0 e precisam ser reescritos ou substituídos por funcionalidades equivalentes no 2.0.