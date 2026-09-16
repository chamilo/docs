# xAPI

**xAPI** (Experience API, também conhecida como Tin Can API) é um padrão para o rastreamento de experiências de aprendizagem. O Chamilo pode tanto gerar como consumir declarações xAPI.

## O que o xAPI faz

O xAPI rastreia atividades de aprendizagem como **declarações** no formato: "Ator fez Verbo sobre Objeto." Por exemplo:

* "Jane concluiu o Módulo 1"
* "John obteve 85% no Exame Final"
* "Maria assistiu ao Vídeo de Introdução"

Estas declarações são armazenadas num **Learning Record Store (LRS)**, fornecendo um registo abrangente da atividade de aprendizagem.

## Configuração

1. Nas definições da plataforma, configure o **endpoint LRS**:
   * **LRS URL** — O endereço do seu Learning Record Store
   * **LRS authentication** — Credenciais para o envio de dados para o LRS
2. Ative o rastreamento xAPI para as atividades pretendidas

## O que o Chamilo rastreia via xAPI

O Chamilo pode gerar declarações xAPI para:

* Acesso e conclusão de cursos
* Tentativas e pontuações de exercícios
* Progresso de itens do percurso de aprendizagem
* Itens de portefólio

Outras ferramentas (como Documentos e Fóruns) não são atualmente emitidas como eventos xAPI pelo plugin.

## Casos de utilização

* **Rastreamento entre plataformas** — Rastreie a atividade de aprendizagem em várias ferramentas e plataformas num único LRS
* **Análises avançadas** — Utilize as ferramentas de análise do LRS para gerar insights que vão além dos relatórios nativos do Chamilo
* **Relatórios de conformidade** — Gere trilhas de auditoria da conclusão de formação para requisitos regulamentares