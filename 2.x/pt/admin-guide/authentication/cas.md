# CAS

> **Estado no Chamilo 2.x.** As entradas de configuração CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) ainda existem nas configurações da plataforma como um legado do Chamilo 1.x, e o CAS ainda aparece como uma fonte de autenticação selecionável no formulário de usuário — mas não há um autenticador CAS integrado ao pipeline de segurança do Chamilo 2.x. Fazer login através do CAS **não** funciona atualmente de forma imediata. Se você precisa de SSO no Chamilo 2.x, use [OAuth2](oauth2.md) (Azure / Keycloak / Genérico) ou [LDAP](ldap.md) em vez disso.

## O que o CAS faria (comportamento no 1.x)

CAS (Central Authentication Service) é um protocolo de autenticação única comumente usado em universidades e instituições de pesquisa. No Chamilo 1.x, clicar em "Fazer login com CAS" redirecionava o usuário para um servidor CAS, validava o ticket retornado e criava ou associava uma conta local a partir dos atributos do CAS.

## Nota sobre migração

Se você está atualizando um portal Chamilo 1.x que utilizava CAS, planeje reimplementar esse fluxo de login usando OAuth2 ou LDAP por enquanto, até que o autenticador CAS seja restaurado em uma futura versão 2.x.