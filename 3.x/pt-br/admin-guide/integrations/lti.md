# LTI 1.3

**LTI** (Learning Tools Interoperability) é um padrão que permite incorporar ferramentas de aprendizagem externas no Chamilo. A versão 1.3 é a mais recente e a mais segura do padrão.

Esta ferramenta também pode ser acessada no bloco [Plataforma](../platform/README.md) do painel de administração, como **Ferramentas externas (LTI)**.

## O que o LTI permite

Com o LTI, você pode incorporar ferramentas externas nos cursos do Chamilo. Exemplos:

* Simulações interativas
* Ferramentas especializadas de avaliação
* Ferramentas de autoria de conteúdo
* Laboratórios virtuais
* Bibliotecas de conteúdo de terceiros

A ferramenta externa aparece de forma integrada na interface do Chamilo.

## Configurando uma ferramenta LTI

### Como administrador

1. Navegue até as configurações de LTI no painel de administração
2. **Registre a ferramenta externa** informando:
   * **Nome da ferramenta** — Um nome descritivo
   * **Login URL** — A URL de iniciação de login OIDC da ferramenta externa
   * **Redirect URL** — A URL de lançamento para a qual a ferramenta retorna após o login
   * **Client ID** — Fornecido pelo fornecedor da ferramenta
   * **Public keyset URL (JWKS URL)** — O endpoint JWKS da ferramenta para troca de chaves de segurança
3. Configure o **retorno de notas (grade passback)** — Se a ferramenta pode enviar notas de volta ao Chamilo
4. Salve

### Como professor

Depois que uma ferramenta LTI é registrada pelo administrador, os professores podem adicioná-la aos seus cursos:

1. No curso, procure a opção de adicionar uma ferramenta externa
2. Selecione entre as ferramentas LTI registradas
3. A ferramenta aparece como uma ferramenta do curso na página inicial

## Segurança

O LTI 1.3 utiliza:

* **OAuth 2.0** para autenticação
* **JSON Web Tokens (JWT)** para assinatura de mensagens
* **Pares de chaves pública/privada** para verificação

Isso significa que as credenciais nunca são compartilhadas diretamente entre o Chamilo e a ferramenta externa.

## Retorno de notas (Grade Passback)

As ferramentas LTI podem enviar notas de volta ao Chamilo, que podem ser integradas ao boletim de notas do curso. Isso é configurado por ferramenta durante o registro.

## Dicas

* **Verifique a compatibilidade da ferramenta** — Certifique-se de que a ferramenta externa oferece suporte a LTI 1.3 (e não apenas a versões anteriores)
* **Teste em um ambiente isolado** — Teste a integração LTI em um curso de teste antes de usá-la em produção
* **Monitore o desempenho** — Ferramentas externas adicionam dependências de rede. Certifique-se de que a ferramenta seja responsiva e confiável.