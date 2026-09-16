# CAS

> **Estado no Chamilo 3.x.** As entradas de configuração CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) ainda existem nas definições da plataforma como um legado do Chamilo 1.x, e o CAS ainda aparece como fonte de autenticação selecionável no formulário de utilizador — mas não existe um autenticador CAS ligado ao pipeline de segurança do Chamilo 3.x. Iniciar sessão através de CAS **não** funciona atualmente de imediato. Se precisar de SSO no Chamilo 3.x, utilize [OAuth2](oauth2.md) (Azure / Keycloak / Generic) ou [LDAP](ldap.md) em alternativa.

## O que o CAS faria (comportamento 1.x)

CAS (Central Authentication Service) é um protocolo de início de sessão único (single sign-on) frequentemente utilizado em universidades e instituições de investigação. No Chamilo 1.x, clicar em "Log in with CAS" redirecionava o utilizador para um servidor CAS, validava o ticket devolvido e criava ou associava uma conta local a partir dos atributos CAS.

## Nota de migração

Se estiver a atualizar um portal Chamilo 1.x que utilizava CAS, planeie reimplementar esse fluxo de início de sessão sobre OAuth2 ou LDAP por agora, até que o autenticador CAS seja restaurado numa versão futura 3.x.