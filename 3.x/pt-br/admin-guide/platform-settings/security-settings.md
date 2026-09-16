# Configurações de Segurança

Proteção de login, política de senhas, cabeçalhos de segurança de conteúdo, autenticação de dois fatores e o sistema leve de detecção de intrusão.

Esta página aborda a *política* de segurança. Para as ferramentas de monitoramento que observam a plataforma com base nessa política (registros de tentativas de login, eventos de detecção de intrusão, varreduras de força de senha e verificações de integridade de arquivos), consulte [Segurança](../security/README.md).

Acesse essas configurações em **Administração > Configurações > Segurança**. Esta categoria contém **32 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `2fa_enable`

**Ativar 2FA**

Adiciona campos na página de atualização de senha para ativar a 2FA usando um aplicativo autenticador TOTP. Quando desativada globalmente, os usuários não verão os campos de 2FA e não serão solicitados a usar 2FA no login, mesmo que a tenham ativado anteriormente.

*Padrão: `false`*

### `access_to_personal_file_for_all`

**Acesso a arquivo pessoal para todos**

Permite o acesso a todos os arquivos pessoais sem restrição

*Padrão: `false`*


### `admins_can_set_users_pass`

**Administradores podem definir senhas de usuários manualmente**

[inferido] Quando ativado, os administradores podem definir senhas de usuários manualmente, sem exigir que os usuários as redefinam.

### `allow_captcha`

**CAPTCHA**

Ativa um CAPTCHA no formulário de login, no formulário de inscrição e no formulário de senha perdida para evitar ataques de força bruta em senhas

*Padrão: `false`*

### `allow_online_users_by_status`

**Filtrar usuários que podem ser vistos como online**

Limita a visibilidade de usuários online a papéis de usuário específicos.

### `allow_strength_pass_checker`

**Verificador de força de senha**

Ative esta opção para adicionar um indicador visual da força da senha quando o usuário alterar a senha. Isso NÃO impede que senhas fracas sejam adicionadas; atua apenas como um auxiliar visual.

*Padrão: `true`*


### `anonymous_autoprovisioning`

**Provisionar automaticamente mais usuários anônimos**

Cria dinamicamente novos usuários anônimos para atender a um alto tráfego de visitantes.

*Padrão: `false`*


### `captcha_number_mistakes_to_block_account`

**Tolerância de erros de CAPTCHA**

O número de vezes que um usuário pode errar no campo CAPTCHA antes que a conta seja bloqueada.

### `captcha_time_to_block`

**Tempo de bloqueio de conta por CAPTCHA**

Se o usuário atingir o máximo de erros permitidos no login (ao usar o CAPTCHA), a conta será bloqueada por este número de minutos.

### `check_password`

**Verificar requisitos de senha**

Ativa a validação dos requisitos de senha definidos acima durante a criação ou atualização de senha.

*Padrão: `false`*


### `file_integrity_check_notify_admins` **v3**

**Destinatários da notificação de verificação de integridade de arquivos**

Lista de endereços de e-mail, separados por vírgula, a notificar quando uma varredura de integridade de arquivos detectar uma alteração. Deixe em branco para notificar todos os administradores globais.

### `filter_terms`

**Filtrar termos**

Informe uma lista de termos, um por linha, a serem filtrados de páginas web e e-mails. Esses termos serão substituídos por ***.

### `force_renew_password_at_first_login`

**Forçar renovação de senha no primeiro login**

Esta é uma medida simples para aumentar a segurança do seu portal, pedindo aos usuários que alterem imediatamente a senha, de modo que a enviada por e-mail deixe de ser válida e eles passem a usar uma senha criada por eles e conhecida apenas por eles.

*Padrão: `false`*


### `hide_breadcrumb_if_not_allowed`

**Ocultar breadcrumb se 'não permitido'**

Se o usuário não tiver permissão para acessar uma página específica, oculta também o breadcrumb. Isso aumenta a segurança ao evitar a exibição de informações desnecessárias.

*Padrão: `false`*


### `login_max_attempt_before_blocking_account`

**Máximo de tentativas de login antes do bloqueio**

Número de tentativas de login malsucedidas a tolerar antes que a conta do usuário seja bloqueada e precise ser desbloqueada por um administrador.

*Padrão: `0`*

### `password_requirements`

**Requisitos mínimos de sintaxe de senha**

Define a estrutura exigida para as senhas dos usuários. Exemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Use "specials" (plural) para exigir caracteres especiais.

### `password_rotation_days`

**Intervalo de rotação de senha (dias)**

Número de dias antes que os usuários devam rotacionar a senha (0 = desativado).

*Padrão: `0`*


### `prevent_multiple_simultaneous_login`

**Impedir login simultâneo**

Impede que usuários se conectem com a mesma conta mais de uma vez. Esta é uma boa opção em portais de acesso pago, mas pode ser restritiva durante testes, pois apenas um navegador pode se conectar com determinada conta.

*Padrão: `false`*

### `proxy_settings`

**Configurações de proxy**

Alguns recursos do Chamilo se conectam ao exterior a partir do servidor. Por exemplo, para garantir que um conteúdo externo exista ao criar um link ou ao exibir uma página incorporada no percurso de aprendizagem. Se o seu servidor Chamilo usa um proxy para sair da sua rede, este é o lugar para configurá-lo.

### `security_block_inactive_users_immediately`

**Bloquear usuários desativados imediatamente**

Bloqueia imediatamente os usuários que foram desativados pelo administrador por meio da gestão de usuários. Caso contrário, os usuários que foram desativados manterão seus privilégios anteriores até que façam logout.

*Padrão: `false`*


### `security_content_policy`

**Content Security Policy**

A Content Security Policy é uma medida eficaz para proteger o seu site de ataques XSS. Ao incluir na lista de permissões as fontes de conteúdo aprovado, você pode impedir que o navegador carregue recursos maliciosos. Esta configuração é particularmente complicada de definir com editores WYSIWYG, mas se você adicionar todos os domínios que deseja autorizar para inclusão de iframes na declaração child-src, este exemplo deve funcionar para você. Você pode impedir que o JavaScript seja executado a partir de fontes externas (incluindo dentro de imagens SVG) usando uma lista restrita no argumento 'script-src'. Deixe em branco para desativar. Exemplo de configuração: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy apenas para relatório**

Esta configuração permite que você experimente relatando, mas sem aplicar, alguma Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

O HTTP Public Key Pinning protege o seu site de ataques MiTM que usam certificados X.509 fraudulentos. Ao incluir na lista de permissões apenas as identidades em que o navegador deve confiar, seus usuários ficam protegidos caso uma autoridade certificadora seja comprometida.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning apenas para relatório**

Esta configuração permite que você experimente relatando, mas sem aplicar, algum HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

A Referrer Policy é um novo cabeçalho que permite que um site controle quanta informação o navegador inclui ao navegar para fora de um documento e deve ser definida por todos os sites.

*Padrão: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de sessão samesite**

Habilita o parâmetro samesite:None para o cookie de sessão. Mais informações: https://www.chromium.org/updates/same-site e https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Padrão: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

O HTTP Strict Transport Security é um excelente recurso a ser suportado no seu site e fortalece a implementação de TLS ao fazer com que o User Agent imponha o uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulte https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Você pode incluir o sufixo 'preload', mas isso tem consequências no domínio de nível superior (TLD), portanto provavelmente não deve ser feito de forma leviana. Consulte https://hstspreload.org/. Deixe em branco para desativar.

### `security_x_content_type_options`

**X-Content-Type-Options**

O X-Content-Type-Options impede que um navegador tente fazer MIME-sniff do tipo de conteúdo e o força a aderir ao content-type declarado. O único valor válido para este cabeçalho é 'nosniff'.

*Padrão: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

O X-Frame-Options informa ao navegador se você deseja permitir que o seu site seja enquadrado (framed) ou não. Ao impedir que um navegador enquadre o seu site, você pode se defender de ataques como clickjacking. Se definir uma URL aqui, ela deve definir a(s) URL(s) a partir da(s) qual(is) o seu conteúdo deve ser visível, e não as URLs a partir das quais o seu site aceita conteúdo. Por exemplo, se a sua URL principal (root_web acima) for https://11.chamilo.org/, então esta configuração deve ser: 'ALLOW-FROM https://11.chamilo.org'. Esses cabeçalhos se aplicam apenas às páginas em que o Chamilo é responsável pela geração dos cabeçalhos HTTP (ou seja, arquivos '.php'). Não se aplica a arquivos estáticos. Se estiver experimentando este recurso, certifique-se de atualizar também a configuração do seu servidor web para adicionar os cabeçalhos corretos para arquivos estáticos. Consulte a documentação de configuração de CDN acima (busque por 'add_header') para mais informações. Valor recomendado (restrito) para esta configuração, se habilitada: 'SAMEORIGIN'.

*Padrão: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

O X-XSS-Protection define a configuração do filtro de cross-site scripting integrado à maioria dos navegadores. Valor recomendado '1; mode=block'.

*Padrão: `1; mode=block`*


### `user_reset_password`

**Habilitar token de redefinição de senha**

Esta opção permite gerar um token de uso único com validade, enviado por e-mail ao usuário para redefinir sua senha.

*Padrão: `false`*

### `user_reset_password_token_limit`

**Limite de tempo para o token de redefinição de senha**

O número de segundos antes que o token gerado expire automaticamente e não possa mais ser utilizado (é necessário gerar um novo token).

*Padrão: `3600`*