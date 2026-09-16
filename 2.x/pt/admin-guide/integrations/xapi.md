# xAPI

**xAPI** (Experience API, também conhecido como Tin Can API) é um padrão para rastrear experiências de aprendizado. O Chamilo pode tanto gerar quanto consumir declarações xAPI.

## O que o xAPI faz

O xAPI rastreia atividades de aprendizado como **declarações** no formato: "Ator fez Verbo no Objeto." Por exemplo:

* "Jane completou o Módulo 1"
* "John obteve 85% no Exame Final"
* "Maria assistiu ao Vídeo de Introdução"

Essas declarações são armazenadas em um **Learning Record Store (LRS)**, fornecendo um registro abrangente da atividade de aprendizado.

## Configuração

1. Nas configurações da plataforma, configure o **endpoint LRS**:
   * **URL do LRS** — O endereço do seu Learning Record Store
   * **Autenticação do LRS** — Credenciais para enviar dados ao LRS
2. Ative o rastreamento xAPI para as atividades desejadas

## O que o Chamilo rastreia via xAPI

O Chamilo pode gerar declarações xAPI para:

* Acesso e conclusão de cursos
* Tentativas e pontuações em exercícios
* Progresso em itens de trilhas de aprendizado
* Itens de portfólio

Outras ferramentas (como Documentos e Fóruns) não são atualmente emitidas como eventos xAPI pelo plugin.

## Casos de uso

* **Rastreamento entre plataformas** — Rastreie atividades de aprendizado em várias ferramentas e plataformas em um único LRS
* **Análises avançadas** — Use ferramentas de análise do LRS para gerar insights que vão além dos relatórios integrados do Chamilo
* **Relatórios de conformidade** — Gere trilhas de auditoria de conclusão de treinamentos para requisitos regulatórios