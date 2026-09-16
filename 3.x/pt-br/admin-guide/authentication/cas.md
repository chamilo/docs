# CAS

> **Status no Chamilo 3.x.** As entradas de configuração do CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) ainda existem nas configurações da plataforma como um legado do Chamilo 1.x, e o CAS ainda aparece como fonte de autenticação selecionável no formulário do usuário — mas não há autenticador CAS integrado ao pipeline de segurança do Chamilo 3.x. O login via CAS **não** funciona atualmente de forma nativa. Se você precisa de SSO no Chamilo 3.x, use [OAuth2](oauth2.md) (Azure / Keycloak / Generic) ou [LDAP](ldap.md) em vez disso.

## O que o CAS faria (comportamento da 1.x)

CAS (Central Authentication Service) é um protocolo de single sign-on comumente usado em universidades e instituições de pesquisa. No Chamilo 1.x, clicar em "Log in with CAS" redirecionava o usuário para um servidor CAS, validava o ticket retornado e criava ou correspondia uma conta local a partir dos atributos do CAS.

## Nota de migração

Se você está atualizando um portal Chamilo 1.x que usava CAS, planeje reimplementar esse fluxo de login sobre OAuth2 ou LDAP por enquanto, até que o autenticador CAS seja restaurado em uma versão futura da 3.x.