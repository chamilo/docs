# Configurações de Segurança

Proteção de login, política de senha, cabeçalhos de segurança de conteúdo, autenticação de dois fatores e o sistema leve de detecção de intrusão.

Acesse essas configurações em **Administração > Configurações de configuração > Segurança**. Esta categoria contém **31 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `2fa_enable`

**Ativar 2FA**

Adiciona campos na página de atualização de senha para habilitar 2FA usando um aplicativo autenticador TOTP. Quando desativado globalmente, os usuários não verão os campos de 2FA e não serão solicitados a usar 2FA no login, mesmo que tenham habilitado anteriormente.

*Padrão: `false`*

### `access_to_personal_file_for_all`

**Acesso a arquivos pessoais para todos**

Permite acesso a todos os arquivos pessoais sem restrição.

*Padrão: `false`*

### `admins_can_set_users_pass`

**Administradores podem definir senhas de usuários manualmente**

[inferido] Quando ativado, os administradores podem definir manualmente as senhas dos usuários diretamente, sem exigir que os usuários as redefinam.

### `allow_captcha`

**CAPTCHA**

Habilita um CAPTCHA no formulário de login, formulário de inscrição e formulário de recuperação de senha para evitar tentativas de força bruta de senha.

*Padrão: `false`*

### `allow_online_users_by_status`

**Filtrar usuários que podem ser vistos como online**

Limita a visibilidade de usuários online a papéis específicos de usuário.

### `allow_strength_pass_checker`

**Verificador de força de senha**

Habilite esta opção para adicionar um indicador visual da força da senha quando o usuário altera sua senha. Isso NÃO impedirá a criação de senhas fracas, apenas atua como um auxiliar visual.

*Padrão: `true`*

### `anonymous_autoprovisioning`

**Provisionamento automático de mais usuários anônimos**

Cria dinamicamente novos usuários anônimos para suportar um alto tráfego de visitantes.

*Padrão: `false`*

### `captcha_number_mistakes_to_block_account`

**Tolerância a erros de CAPTCHA**

O número de vezes que um usuário pode errar na caixa de CAPTCHA antes que sua conta seja bloqueada.

### `captcha_time_to_block`

**Tempo de bloqueio de conta por CAPTCHA**

Se o usuário atingir o limite máximo de erros de login (ao usar o CAPTCHA), sua conta será bloqueada por esse número de minutos.

### `check_password`

**Verificar requisitos de senha**

Habilita a validação dos requisitos de senha definidos acima durante a criação ou atualização de senha.

*Padrão: `false`*

### `filter_terms`

**Filtrar termos**

Forneça uma lista de termos, um por linha, a serem filtrados de páginas web e e-mails. Esses termos serão substituídos por ***.

### `force_renew_password_at_first_login`

**Forçar renovação de senha no primeiro login**

Esta é uma medida simples para aumentar a segurança do seu portal, solicitando que os usuários alterem imediatamente sua senha, de modo que a senha transferida por e-mail não seja mais válida e eles usem uma que criaram e que apenas eles conhecem.

*Padrão: `false`*

### `hide_breadcrumb_if_not_allowed`

**Ocultar trilha de navegação se 'não permitido'**

Se o usuário não tiver permissão para acessar uma página específica, também oculta a trilha de navegação. Isso aumenta a segurança ao evitar a exibição de informações desnecessárias.

*Padrão: `false`*

### `login_max_attempt_before_blocking_account`

**Máximo de tentativas de login antes do bloqueio**

Número de tentativas de login falhas a tolerar antes que a conta do usuário seja bloqueada e precise ser desbloqueada por um administrador.

*Padrão: `0`*

### `password_requirements`

**Requisitos mínimos de sintaxe de senha**

Define a estrutura exigida para senhas de usuários. Exemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Use "specials" (no plural) para exigir caracteres especiais.

### `password_rotation_days`

**Intervalo de rotação de senha (dias)**

Número de dias antes que os usuários devam trocar sua senha (0 = desativado).

*Padrão: `0`*

### `prevent_multiple_simultaneous_login`

**Impedir login simultâneo**

Impede que usuários se conectem com a mesma conta mais de uma vez. Esta é uma boa opção em portais de pagamento por acesso, mas pode ser restritiva durante testes, pois apenas um navegador pode se conectar com uma determinada conta.

*Padrão: `false`*

### `proxy_settings`

**Configurações de proxy**

Alguns recursos do Chamilo se conectam ao exterior a partir do servidor. Por exemplo, para verificar se um conteúdo externo existe ao criar um link ou exibir uma página incorporada no caminho de aprendizagem. Se o seu servidor Chamilo usa um proxy para sair de sua rede, este seria o local para configurá-lo.

### `security_block_inactive_users_immediately`

**Bloquear usuários desativados imediatamente**

Bloqueia imediatamente usuários que foram desativados pelo administrador por meio do gerenciamento de usuários. Caso contrário, usuários desativados manterão seus privilégios anteriores até fazerem logout.

*Padrão: `false`*

---
### `security_content_policy`

**Política de Segurança de Conteúdo**

A Política de Segurança de Conteúdo é uma medida eficaz para proteger seu site contra ataques XSS. Ao listar fontes de conteúdo aprovadas, você pode impedir que o navegador carregue ativos maliciosos. Essa configuração é particularmente complicada de definir com editores WYSIWYG, mas se você adicionar todos os domínios que deseja autorizar para inclusão de iframes na declaração child-src, este exemplo deve funcionar para você. Você pode impedir que JavaScript seja executado a partir de fontes externas (incluindo dentro de imagens SVG) usando uma lista restrita no argumento 'script-src'. Deixe em branco para desativar. Exemplo de configuração: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Política de Segurança de Conteúdo apenas para relatório**

Essa configuração permite que você experimente reportando, mas não aplicando, algumas Políticas de Segurança de Conteúdo.

### `security_public_key_pins`

**Pinning de Chave Pública HTTP**

O Pinning de Chave Pública HTTP protege seu site contra ataques MiTM usando certificados X.509 fraudulentos. Ao listar apenas as identidades que o navegador deve confiar, seus usuários ficam protegidos no caso de uma autoridade de certificação ser comprometida.

### `security_public_key_pins_report_only`

**Pinning de Chave Pública HTTP apenas para relatório**

Essa configuração permite que você experimente reportando, mas não aplicando, algumas configurações de Pinning de Chave Pública HTTP.

### `security_referrer_policy`

**Política de Referência de Segurança**

A Política de Referência é um novo cabeçalho que permite que um site controle quanta informação o navegador inclui ao navegar para fora de um documento e deve ser configurado por todos os sites.

*Padrão: `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**Cookie de sessão samesite**

Habilita o parâmetro samesite:None para o cookie de sessão. Mais informações: https://www.chromium.org/updates/same-site e https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Padrão: `false`*

### `security_strict_transport`

**Segurança de Transporte Estrita HTTP**

A Segurança de Transporte Estrita HTTP é um recurso excelente para suportar em seu site e fortalece sua implementação de TLS ao fazer com que o Agente do Usuário force o uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Veja https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Você pode incluir o sufixo 'preload', mas isso tem consequências no domínio de nível superior (TLD), então provavelmente não deve ser feito de forma leviana. Veja https://hstspreload.org/. Deixe em branco para desativar.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options impede que um navegador tente farejar o tipo de conteúdo MIME e o força a aderir ao tipo de conteúdo declarado. O único valor válido para este cabeçalho é 'nosniff'.

*Padrão: `nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options informa ao navegador se você deseja permitir que seu site seja enquadrado ou não. Ao impedir que um navegador enquadre seu site, você pode se defender contra ataques como clickjacking. Se definir uma URL aqui, ela deve especificar a(s) URL(s) de onde seu conteúdo deve ser visível, não as URLs de onde seu site aceita conteúdo. Por exemplo, se sua URL principal (root_web acima) for https://11.chamilo.org/, então esta configuração deve ser: 'ALLOW-FROM https://11.chamilo.org'. Esses cabeçalhos se aplicam apenas a páginas onde o Chamilo é responsável pela geração dos cabeçalhos HTTP (ou seja, arquivos '.php'). Não se aplica a arquivos estáticos. Se estiver experimentando com esse recurso, certifique-se de atualizar também a configuração do seu servidor web para adicionar os cabeçalhos corretos para arquivos estáticos. Veja a documentação de configuração de CDN acima (procure por 'add_header') para mais informações. Valor recomendado (estrito) para esta configuração, se ativada: 'SAMEORIGIN'.

*Padrão: `SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection define a configuração para o filtro de script entre sites integrado na maioria dos navegadores. Valor recomendado: '1; mode=block'.

*Padrão: `1; mode=block`*

### `user_reset_password`

**Habilitar token de redefinição de senha**

Esta opção permite gerar um token de uso único com validade limitada, enviado por e-mail ao usuário para redefinir sua senha.

*Padrão: `false`*

### `user_reset_password_token_limit`

**Limite de tempo para token de redefinição de senha**

O número de segundos antes que o token gerado expire automaticamente e não possa mais ser usado (um novo token precisa ser gerado).

*Padrão: `3600`*