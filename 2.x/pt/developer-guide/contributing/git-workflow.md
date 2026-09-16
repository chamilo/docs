# Fluxo de Trabalho com Git

## Repositório

O código-fonte do Chamilo está hospedado no GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramificação

* **`master`** — Branch principal de desenvolvimento
* Branches de funcionalidades são criadas a partir da `master` para novos desenvolvimentos
* Branches de lançamento são criadas para versões estáveis

## Contribuindo com uma Alteração

1. **Faça um fork** do repositório no GitHub
2. **Clone** o seu fork localmente
3. **Crie uma branch** para sua alteração: `git checkout -b feature/my-feature`
4. **Faça suas alterações** seguindo as convenções de codificação
5. **Faça commit** com mensagens de commit claras e descritivas
6. **Envie** para o seu fork: `git push origin feature/my-feature`
7. **Crie um pull request** contra a branch `master`

## Mensagens de Commit

Escreva mensagens de commit claras que expliquem **o que** e **por que**:

```
Glossário: Adicionar geração de termos assistida por IA

Professores agora podem gerar termos de glossário usando provedores de IA configurados.
Suporta prompt configurável e contagem de termos.
```

### Convenção de prefixo de ferramenta

A linha de assunto é prefixada com a **ferramenta ou área** que a alteração afeta, seguida por dois pontos. Usamos uma terminologia curta e compartilhada para que o changelog e o `git log --oneline` possam ser rapidamente analisados por ferramenta. O prefixo é sempre a forma **singular** do nome canônico da ferramenta.

Formato: `<Prefixo>: <Resumo no imperativo no tempo presente>`

Exemplos:

```
Documento: Corrigir lista na visualização do aluno
Exercício: Impedir títulos de perguntas duplicados dentro de um quiz
Caminho de Aprendizagem: Permitir reordenação de capítulos por arrastar e soltar
Interno: Refatorar hidratação de ResourceNode no normalizador da API
CI: Armazenar downloads do Composer em cache no fluxo de trabalho do GitHub Actions
```

Se uma alteração abrange várias ferramentas, escolha a mais afetada; alterações verdadeiramente transversais que afetam apenas a estrutura do código (sem impacto em ferramentas do usuário final) devem ser classificadas como `Interno`. Alterações exclusivas de documentação (este site, o changelog, docblocks inline destinados apenas como referência) devem ser classificadas como `Documentação`.

---
#### Prefixos Permitidos

| Prefixo              | Escopo / notas                                                                       |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Não "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Catálogo de cursos e sessões, incluindo "cursos em destaque" na página inicial       |
| `Chat`               |                                                                                      |
| `CI`                 | Integração Contínua, testes automatizados, etc.                                      |
| `Course description` |                                                                                      |
| `Course Progress`    | Não "Avanço Temático"                                                                |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Qualquer coisa relacionada exclusivamente à documentação do Chamilo ou do código, changelog, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Não "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclui Certificados                                                                  |
| `Group`              | Inclui grupos de curso, grupos globais e turmas                                      |
| `Help`               |                                                                                      |
| `Hook`               | Para o mecanismo interno de hook                                                     |
| `Install`            | Inclui itens de atualização                                                          |
| `Internal`           | Para mudanças e correções que afetam principalmente o código ou são muito globais por natureza |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Para LP / Caminhos de Aprendizagem                                                   |
| `Maintenance`        | A ferramenta de manutenção de curso: cópias de curso, backup, restauração, etc.      |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Para o que está em `tests/scripts/`                                                  |
| `Search`             | Pesquisa de texto completo                                                           |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Rede social                                                                          |
| `SSO`                | Métodos de Single Sign-On                                                            |
| `Survey`             |                                                                                      |
| `System`             | Coisas que têm a ver principalmente com hospedagem e ajustes finos no nível do servidor |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## Revisão de Código

Os pedidos de pull são revisados pela equipe de manutenção. Esteja preparado para:

* Responder ao feedback e fazer revisões
* Manter sua branch atualizada com a `master`
* Garantir que os testes sejam aprovados

## Relato de Problemas

Reporte bugs e solicitações de funcionalidades no rastreador de issues do GitHub.