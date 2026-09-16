# LTI 1.3

**LTI** (Learning Tools Interoperability) é um padrão que permite incorporar ferramentas de aprendizagem externas no Chamilo. A versão 1.3 é a mais recente e a mais segura do padrão.

Esta ferramenta também está acessível a partir do bloco [Plataforma](../platform/README.md) do painel de administração, como **Ferramentas externas (LTI)**.

## O que o LTI permite

Com o LTI, pode incorporar ferramentas externas nos cursos do Chamilo. Exemplos:

* Simulações interativas
* Ferramentas de avaliação especializadas
* Ferramentas de autoria de conteúdos
* Laboratórios virtuais
* Bibliotecas de conteúdos de terceiros

A ferramenta externa aparece de forma integrada na interface do Chamilo.

## Configurar uma ferramenta LTI

### Como administrador

1. Navegue até às definições de LTI no painel de administração
2. **Registe a ferramenta externa** fornecendo:
   * **Nome da ferramenta** — Um nome descritivo
   * **Login URL** — O URL de iniciação de login OIDC da ferramenta externa
   * **Redirect URL** — O URL de lançamento para o qual a ferramenta regressa após o login
   * **Client ID** — Fornecido pelo fornecedor da ferramenta
   * **Public keyset URL (JWKS URL)** — O endpoint JWKS da ferramenta para troca de chaves de segurança
3. Configure o **grade passback** — Se a ferramenta pode enviar notas de volta para o Chamilo
4. Guarde

### Como professor

Depois de uma ferramenta LTI ser registada pelo administrador, os professores podem adicioná-la aos seus cursos:

1. No curso, procure a opção para adicionar uma ferramenta externa
2. Selecione entre as ferramentas LTI registadas
3. A ferramenta aparece como uma ferramenta do curso na página inicial

## Segurança

O LTI 1.3 utiliza:

* **OAuth 2.0** para autenticação
* **JSON Web Tokens (JWT)** para assinatura de mensagens
* **Pares de chaves pública/privada** para verificação

Isto significa que as credenciais nunca são partilhadas diretamente entre o Chamilo e a ferramenta externa.

## Grade Passback

As ferramentas LTI podem enviar notas de volta para o Chamilo, que podem ser integradas no livro de notas do curso. Isto é configurado por ferramenta durante o registo.

## Dicas

* **Verifique a compatibilidade da ferramenta** — Certifique-se de que a ferramenta externa suporta LTI 1.3 (e não apenas versões anteriores)
* **Teste num ambiente isolado** — Teste a integração LTI num curso de teste antes de a utilizar em produção
* **Monitorize o desempenho** — As ferramentas externas acrescentam dependências de rede. Certifique-se de que a ferramenta é reativa e fiável.