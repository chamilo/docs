# xAPI

**xAPI** (Experience API, também conhecida como Tin Can API) é um padrão para rastrear experiências de aprendizagem. O Chamilo pode tanto gerar quanto consumir declarações xAPI.

## O que o xAPI faz

O xAPI rastreia atividades de aprendizagem como **declarações** no formato: "Ator fez Verbo sobre Objeto." Por exemplo:

* "Jane concluiu o Módulo 1"
* "John obteve 85% no Exame Final"
* "Maria assistiu ao Vídeo de Introdução"

Essas declarações são armazenadas em um **Learning Record Store (LRS)**, fornecendo um registro abrangente da atividade de aprendizagem.

## Configuração

1. Nas configurações da plataforma, configure o **endpoint do LRS**:
   * **LRS URL** — O endereço do seu Learning Record Store
   * **LRS authentication** — Credenciais para envio de dados ao LRS
2. Ative o rastreamento xAPI para as atividades desejadas

## O que o Chamilo rastreia via xAPI

O Chamilo pode gerar declarações xAPI para:

* Acesso e conclusão de cursos
* Tentativas e pontuações em exercícios
* Progresso de itens de percursos de aprendizagem
* Itens de portfólio

Outras ferramentas (como Documentos e Fóruns) atualmente não são emitidas como eventos xAPI pelo plugin.

## Casos de uso

* **Rastreamento entre plataformas** — Rastreie a atividade de aprendizagem em várias ferramentas e plataformas em um único LRS
* **Analítica avançada** — Use ferramentas de analítica do LRS para gerar insights que vão além dos relatórios nativos do Chamilo
* **Relatórios de conformidade** — Gere trilhas de auditoria da conclusão de treinamentos para requisitos regulatórios