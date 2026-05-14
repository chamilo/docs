# LTI 1.3

**LTI** (Learning Tools Interoperability - Interoperabilidade de Ferramentas de Aprendizagem) é um padrão que permite a integração de ferramentas de aprendizagem externas no Chamilo. A versão 1.3 é a mais recente e segura do padrão.

## O que o LTI Permite

Com o LTI, você pode incorporar ferramentas externas nos cursos do Chamilo. Exemplos:

* Simulações interativas
* Ferramentas de avaliação especializadas
* Ferramentas de criação de conteúdo
* Laboratórios virtuais
* Bibliotecas de conteúdo de terceiros

A ferramenta externa aparece de forma integrada na interface do Chamilo.

## Configurando uma Ferramenta LTI

### Como Administrador

1. Navegue até as configurações de LTI no painel de administração
2. **Registre a ferramenta externa** fornecendo:
   * **Nome da ferramenta** — Um nome descritivo
   * **URL de login** — A URL de iniciação de login OIDC da ferramenta externa
   * **URL de redirecionamento** — A URL de lançamento para a qual a ferramenta retorna após o login
   * **ID do cliente** — Fornecido pelo fornecedor da ferramenta
   * **URL do conjunto de chaves públicas (JWKS URL)** — O endpoint JWKS da ferramenta para troca de chaves de segurança
3. Configure o **retorno de notas** — Se a ferramenta pode enviar notas de volta ao Chamilo
4. Salve

### Como Professor

Uma vez que uma ferramenta LTI é registrada pelo administrador, os professores podem adicioná-la aos seus cursos:

1. No curso, procure pela opção de adicionar uma ferramenta externa
2. Selecione entre as ferramentas LTI registradas
3. A ferramenta aparecerá como uma ferramenta do curso na página inicial

## Segurança

O LTI 1.3 utiliza:

* **OAuth 2.0** para autenticação
* **JSON Web Tokens (JWT)** para assinatura de mensagens
* **Pares de chaves públicas/privadas** para verificação

Isso significa que as credenciais nunca são compartilhadas diretamente entre o Chamilo e a ferramenta externa.

## Retorno de Notas

As ferramentas LTI podem enviar notas de volta ao Chamilo, que podem ser integradas ao livro de notas do curso. Isso é configurado por ferramenta durante o registro.

## Dicas

* **Verifique a compatibilidade da ferramenta** — Certifique-se de que a ferramenta externa suporta LTI 1.3 (não apenas versões anteriores)
* **Teste em um ambiente de sandbox** — Teste a integração LTI em um curso de teste antes de usá-la em produção
* **Monitore o desempenho** — Ferramentas externas adicionam dependências de rede. Certifique-se de que a ferramenta é responsiva e confiável.