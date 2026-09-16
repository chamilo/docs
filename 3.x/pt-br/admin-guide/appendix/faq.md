# FAQ

Perguntas frequentes para administradores do Chamilo 3.0.

## Instalação e configuração

**P: Qual versão do PHP o Chamilo 3.0 exige?**
R: PHP 8.3, 8.4 ou 8.5. Consulte [Requisitos do servidor](../installation/server-requirements.md).

**P: Posso executar o Chamilo em hospedagem compartilhada?**
R: É possível, mas não recomendado. O Chamilo 3.0 exige Composer, Node.js no modo de desenvolvimento e acesso à linha de comando para instalação e manutenção. Um VPS ou servidor dedicado oferece uma experiência muito melhor.

**P: Qual banco de dados devo usar?**
R: MySQL 8.0+ ou MariaDB 10.4+ são os mais utilizados e os mais bem testados.

**P: Posso instalar o Chamilo sem a linha de comando?**
R: Sim, se você usar a versão empacotada (.zip ou .tar.gz). Caso contrário, precisará da linha de comando para instalar as dependências do Composer, gerar os assets do frontend e executar as migrações do banco de dados. O assistente baseado na web trata da configuração do banco de dados e da configuração inicial, mas as etapas adjacentes exigem acesso ao shell no modo de desenvolvimento.

## Usuários e autenticação

**P: Como redefinir a senha de um usuário?**
R: Vá em **Administração > Lista de usuários**, localize o usuário, clique em editar e defina uma nova senha. Como alternativa, o usuário pode usar o link "Esqueci a senha" na página de login (se o e-mail estiver configurado).

**P: Posso importar usuários em lote?**
R: Sim. Vá em **Administração > Importar usuários** e envie um arquivo CSV ou XML com os dados dos usuários. A importação permite criar novos usuários e atualizar os existentes.

**P: Como integrar com LDAP ou Active Directory?**
R: Configure as opções de LDAP na configuração de autenticação. Consulte [LDAP](../authentication/ldap.md). Os usuários são sincronizados no login ou por meio de sincronização agendada.

**P: Os usuários podem pertencer a várias sessões ao mesmo tempo?**
R: Sim. Os usuários podem ser inscritos em qualquer número de sessões simultaneamente. Cada sessão registra o progresso de forma independente.

## Cursos e conteúdo

**P: Como fazer backup de um único curso?**
R: Dentro do curso, vá em **Manutenção > Criar um backup**. Isso gera um arquivo baixável com o conteúdo e as configurações do curso. Você pode restaurá-lo na mesma instância do Chamilo ou em outra.

**P: Posso copiar um curso?**
R: Sim. Use **Administração > Copiar curso** ou a ferramenta de manutenção do curso dentro do próprio curso. Você pode copiar conteúdo entre cursos ou criar um novo curso a partir de um existente.

**P: Quais versões de SCORM são suportadas?**
R: O Chamilo suporta SCORM 1.2. Pacotes SCORM são importados como percursos de aprendizagem.

**P: Como limitar quem pode criar cursos?**
R: Vá em **Administração > Configurações > Curso** e desative **Permitir que não administradores (professores) criem novos cursos** (`allow_users_to_create_courses`). Quando desativado, apenas administradores podem criar cursos. Como alternativa, você pode definir um limite para o número de cursos que qualquer professor pode criar.

## Desempenho e manutenção

**P: A plataforma está lenta. O que devo verificar primeiro?**
R: Em ordem de impacto: (1) Certifique-se de que `APP_ENV=prod` e `APP_DEBUG=0` em `.env`. (2) Verifique se o PHP OPcache está habilitado. (3) Verifique o desempenho do banco de dados. (4) Consulte [Ajuste de desempenho](../platform-settings/performance-tuning.md).

**P: Como limpar o cache?**
R: Execute `php bin/console cache:clear --env=prod` na linha de comando. Não exclua o diretório `var/cache/` manualmente enquanto a aplicação estiver em execução.

**P: Quanto espaço em disco o Chamilo precisa?**
R: A aplicação em si precisa de cerca de 2 GB descompactada. O espaço total depende do conteúdo enviado (documentos, vídeos, pacotes SCORM). Monitore o uso de disco e planeje de acordo.

**P: Como configurar backups automatizados?**
R: Consulte [Backups](../maintenance/backups.md). No mínimo, agende um dump diário do banco de dados e backups regulares em nível de arquivo do diretório de upload.

## E-mail

**P: Os usuários não estão recebendo e-mails. O que devo verificar?**
R: (1) Verifique `MAILER_DSN` em `.env`. (2) Execute `php bin/console mailer:test someone@example.com` para testar. (3) Verifique as pastas de spam. (4) Verifique os registros DNS de SPF/DKIM. Consulte [Configuração de e-mail](../installation/email-configuration.md).

**P: Posso usar o Gmail para enviar e-mails?**
R: Sim, para plataformas pequenas ou desenvolvimento. Use uma senha de aplicativo e esteja ciente dos limites diários de envio do Gmail (500 e-mails/dia para contas comuns).

## Segurança

**P: Como forçar HTTPS?**
R: Configure o servidor web para redirecionar HTTP para HTTPS. Além disso, ative a opção "Forçar HTTPS" em **Administração > Configurações > Segurança**. Consulte [Configurações de segurança](../platform-settings/security-settings.md).

**P: Como bloquear ataques de login por força bruta?**
R: Configure o número máximo de tentativas de login e o CAPTCHA nas configurações de segurança. Considere também usar fail2ban no nível do servidor para proteção adicional.

**P: Um usuário esqueceu a senha e o e-mail não está funcionando. Como posso ajudá-lo?**
R: Como administrador, edite a conta do usuário diretamente e defina uma nova senha. Vá em **Administração > Lista de usuários**, localize a conta e atualize o campo de senha.

## Atualizações

**P: Posso atualizar diretamente do Chamilo 2.x para o 3.0?**
R: Sim, mas trata-se de uma migração importante, não de uma atualização simples. Consulte [Atualização](../installation/upgrading.md). Sempre teste primeiro em um servidor de homologação.

**P: Meus plugins funcionarão após a atualização para o 3.0?**
R: Não. Plugins da versão 2.x não são compatíveis com a 3.0 e devem ser reescritos ou substituídos por funcionalidades equivalentes da 3.0.