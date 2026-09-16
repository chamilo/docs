# Configurações de segurança

Proteção de login, política de senhas, cabeçalhos de segurança de conteúdo, autenticação de dois fatores e o sistema leve de detecção de intrusão.

Esta página trata da *política* de segurança. Para as ferramentas de monitorização que observam a plataforma com base nesta política (registos de tentativas de login, eventos de detecção de intrusão, análises de força de senha e verificações de integridade de ficheiros), consulte [Segurança](../security/README.md).

Aceda a estas configurações em **Administração > Configurações > Segurança**. Esta categoria contém **32 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas configurações a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `2fa_enable`

**Ativar 2FA**

Adiciona campos na página de atualização de senha para ativar a 2FA com uma aplicação autenticadora TOTP. Quando desativada globalmente, os utilizadores não verão os campos de 2FA e não serão solicitados a usar 2FA no login, mesmo que a tenham ativado anteriormente.

*Predefinição: `false`*

### `access_to_personal_file_for_all`

**Acesso a ficheiro pessoal para todos**

Permite o acesso a todos os ficheiros pessoais sem restrição

*Predefinição: `false`*


### `admins_can_set_users_pass`

**Administradores podem definir senhas de utilizadores manualmente**

[inferido] Quando ativado, os administradores podem definir manualmente as senhas dos utilizadores de forma direta, sem exigir que estes as reponham.

### `allow_captcha`

**CAPTCHA**

Ativa um CAPTCHA no formulário de login, no formulário de inscrição e no formulário de senha perdida para evitar ataques de força bruta a senhas

*Predefinição: `false`*

### `allow_online_users_by_status`

**Filtrar utilizadores visíveis como online**

Limita a visibilidade de utilizadores online a papéis de utilizador específicos.

### `allow_strength_pass_checker`

**Verificador de força da senha**

Ative esta opção para adicionar um indicador visual da força da senha quando o utilizador a altera. Isto NÃO impede a introdução de senhas fracas; funciona apenas como ajuda visual.

*Predefinição: `true`*


### `anonymous_autoprovisioning`

**Aprovisionar automaticamente mais utilizadores anónimos**

Cria dinamicamente novos utilizadores anónimos para suportar elevado tráfego de visitantes.

*Predefinição: `false`*


### `captcha_number_mistakes_to_block_account`

**Tolerância de erros de CAPTCHA**

O número de vezes que um utilizador pode errar na caixa CAPTCHA antes de a conta ser bloqueada.

### `captcha_time_to_block`

**Tempo de bloqueio de conta por CAPTCHA**

Se o utilizador atingir o máximo de erros permitidos no login (ao usar o CAPTCHA), a conta será bloqueada durante este número de minutos.

### `check_password`

**Verificar requisitos de senha**

Ativa a validação dos requisitos de senha definidos acima durante a criação ou atualização da senha.

*Predefinição: `false`*


### `file_integrity_check_notify_admins` **v3**

**Destinatários da notificação de verificação de integridade de ficheiros**

Lista de endereços de e-mail, separados por vírgulas, a notificar quando uma análise de integridade de ficheiros deteta uma alteração. Deixe vazio para notificar todos os administradores globais.

### `filter_terms`

**Filtrar termos**

Indique uma lista de termos, um por linha, a filtrar das páginas web e dos e-mails. Estes termos serão substituídos por ***.

### `force_renew_password_at_first_login`

**Forçar renovação da senha no primeiro login**

Esta é uma medida simples para aumentar a segurança do portal, pedindo aos utilizadores que alterem imediatamente a senha, de modo que a enviada por e-mail deixe de ser válida e passem a usar uma que eles próprios criaram e que só eles conhecem.

*Predefinição: `false`*


### `hide_breadcrumb_if_not_allowed`

**Ocultar breadcrumb se «não permitido»**

Se o utilizador não tiver permissão para aceder a uma página específica, oculta também o breadcrumb. Isto aumenta a segurança ao evitar a apresentação de informação desnecessária.

*Predefinição: `false`*


### `login_max_attempt_before_blocking_account`

**Máximo de tentativas de login antes do bloqueio**

Número de tentativas de login falhadas a tolerar antes de a conta do utilizador ser bloqueada e ter de ser desbloqueada por um administrador.

*Predefinição: `0`*

### `password_requirements`

**Requisitos mínimos de sintaxe da senha**

Define a estrutura exigida para as senhas dos utilizadores. Exemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Utilize "specials" (plural) para exigir caracteres especiais.

### `password_rotation_days`

**Intervalo de rotação de senha (dias)**

Número de dias antes de os utilizadores terem de rodar a senha (0 = desativado).

*Predefinição: `0`*


### `prevent_multiple_simultaneous_login`

**Impedir login simultâneo**

Impede que os utilizadores se liguem com a mesma conta mais do que uma vez. É uma boa opção em portais de acesso pago, mas pode ser restritiva durante testes, pois apenas um navegador pode ligar-se com uma determinada conta.

*Predefinição: `false`*

### `proxy_settings`

**Configurações de proxy**

Alguns recursos do Chamilo conectam-se ao exterior a partir do servidor. Por exemplo, para garantir que um conteúdo externo existe ao criar um link ou ao exibir uma página incorporada no percurso de aprendizagem. Se o seu servidor Chamilo utiliza um proxy para sair da sua rede, este é o local para configurá-lo.

### `security_block_inactive_users_immediately`

**Bloquear imediatamente usuários desativados**

Bloqueia imediatamente os usuários que tenham sido desativados pelo administrador através da gestão de usuários. Caso contrário, os usuários desativados manterão os seus privilégios anteriores até que terminem a sessão.

*Padrão: `false`*


### `security_content_policy`

**Content Security Policy**

A Content Security Policy é uma medida eficaz para proteger o seu site contra ataques XSS. Ao definir uma lista de origens de conteúdo aprovado, você pode impedir que o navegador carregue recursos maliciosos. Esta configuração é particularmente complicada de definir com editores WYSIWYG, mas se você adicionar todos os domínios que deseja autorizar para inclusão de iframes na declaração child-src, este exemplo deverá funcionar. Você pode impedir que o JavaScript seja executado a partir de fontes externas (incluindo dentro de imagens SVG) utilizando uma lista restrita no argumento 'script-src'. Deixe em branco para desativar. Exemplo de configuração: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy apenas em modo de relatório**

Esta configuração permite experimentar reportando, mas sem aplicar, alguma Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

O HTTP Public Key Pinning protege o seu site contra ataques MiTM que utilizam certificados X.509 fraudulentos. Ao autorizar apenas as identidades em que o navegador deve confiar, os seus usuários ficam protegidos no caso de uma autoridade certificadora ser comprometida.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning apenas em modo de relatório**

Esta configuração permite experimentar reportando, mas sem aplicar, algum HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

A Referrer Policy é um cabeçalho novo que permite a um site controlar quanta informação o navegador inclui ao navegar para fora de um documento e deve ser definida por todos os sites.

*Padrão: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de sessão samesite**

Ativa o parâmetro samesite:None para o cookie de sessão. Mais informações: https://www.chromium.org/updates/same-site e https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Padrão: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

O HTTP Strict Transport Security é um excelente recurso a suportar no seu site e reforça a sua implementação de TLS ao fazer com que o User Agent imponha o uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulte https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Você pode incluir o sufixo 'preload', mas isso tem consequências no domínio de topo (TLD), pelo que provavelmente não deve ser feito de ânimo leve. Consulte https://hstspreload.org/. Deixe em branco para desativar.

### `security_x_content_type_options`

**X-Content-Type-Options**

O X-Content-Type-Options impede que o navegador tente identificar o tipo MIME por sniffing e força-o a respeitar o content-type declarado. O único valor válido para este cabeçalho é 'nosniff'.

*Padrão: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

O X-Frame-Options indica ao navegador se você deseja permitir que o seu site seja enquadrado (framed) ou não. Ao impedir que um navegador enquadre o seu site, você pode defender-se contra ataques como o clickjacking. Se definir um URL aqui, ele deve definir o(s) URL(s) a partir dos quais o seu conteúdo deve ser visível, e não os URLs a partir dos quais o seu site aceita conteúdo. Por exemplo, se o seu URL principal (root_web acima) for https://11.chamilo.org/, então esta configuração deve ser: 'ALLOW-FROM https://11.chamilo.org'. Estes cabeçalhos aplicam-se apenas às páginas em que o Chamilo é responsável pela geração dos cabeçalhos HTTP (ou seja, ficheiros '.php'). Não se aplicam a ficheiros estáticos. Se experimentar este recurso, certifique-se de atualizar também a configuração do servidor web para adicionar os cabeçalhos corretos aos ficheiros estáticos. Consulte a documentação de configuração de CDN acima (procure por 'add_header') para mais informações. Valor recomendado (restrito) para esta configuração, se ativada: 'SAMEORIGIN'.

*Padrão: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

O X-XSS-Protection define a configuração do filtro de cross-site scripting integrado na maioria dos navegadores. Valor recomendado '1; mode=block'.

*Padrão: `1; mode=block`*


### `user_reset_password`

**Ativar token de redefinição de senha**

Esta opção permite gerar um token de uso único e com validade, enviado por e-mail ao usuário para redefinir a sua senha.

*Padrão: `false`*

### `user_reset_password_token_limit`

**Limite de tempo para o token de redefinição de palavra-passe**

O número de segundos antes de o token gerado expirar automaticamente e deixar de poder ser utilizado (é necessário gerar um novo token).

*Predefinição: `3600`*