# Fluxo de Trabalho Git

## Repositório

O código-fonte do Chamilo está alojado no GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramificação

* **`master`** — Ramo principal de desenvolvimento
* Os ramos de funcionalidades são criados a partir de `master` para novo desenvolvimento
* Os ramos de lançamento são criados para versões estáveis

## Contribuir com uma Alteração

1. **Faça um fork** do repositório no GitHub
2. **Clone** o seu fork localmente
3. **Crie um ramo** para a sua alteração: `git checkout -b feature/my-feature`
4. **Efetue as suas alterações** seguindo as convenções de programação
5. **Faça o commit** com mensagens de commit claras e descritivas
6. **Faça o push** para o seu fork: `git push origin feature/my-feature`
7. **Crie um pull request** contra o ramo `master`

## Mensagens de Commit

Escreva mensagens de commit claras que expliquem **o quê** e **porquê**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Convenção de prefixo de ferramenta

A linha de assunto é prefixada com a **ferramenta ou área** que a alteração afeta, seguida de dois pontos. Utilizamos uma terminologia partilhada e breve para que o changelog e o `git log --oneline` possam ser percorridos por ferramenta. O prefixo é sempre a forma **singular** do nome canónico da ferramenta.

Formato: `<Prefix>: <Imperative summary in the present tense>`

Exemplos:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Se uma alteração abranger várias ferramentas, escolha a mais afetada; alterações verdadeiramente transversais que apenas tocam a estrutura do código (sem ferramenta para o utilizador final) ficam sob `Internal`. Alterações apenas de documentação (este sítio, o changelog, docblocks em linha destinados puramente a referência) ficam sob `Documentation`.

#### Prefixos permitidos

| Prefixo              | Âmbito / notas                                                                       |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Não "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Catálogo de cursos e sessões, incluindo "hot courses" na página inicial              |
| `Chat`               |                                                                                      |
| `CI`                 | Integração contínua, testes automatizados, etc.                                      |
| `Course description` |                                                                                      |
| `Course Progress`    | Não "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Tudo o que se relacione exclusivamente com a documentação do Chamilo ou do código, o changelog, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Não "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclui certificados                                                                  |
| `Group`              | Inclui grupos de curso, grupos globais e turmas                                      |
| `Help`               |                                                                                      |
| `Hook`               | Para o mecanismo interno de hooks                                                    |
| `Install`            | Inclui atualizações                                                                  |
| `Internal`           | Para alterações e correções que afetam principalmente o próprio código ou são de natureza muito global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Para LP / Percursos de aprendizagem                                                  |
| `Maintenance`        | A ferramenta de manutenção de cursos: cópias de cursos, cópias de segurança, restauro, etc. |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Para o que reside em `tests/scripts/`                                                |
| `Search`             | Pesquisa de texto integral                                                           |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Rede social                                                                          |
| `SSO`                | Métodos de Single Sign-On                                                            |
| `Survey`             |                                                                                      |
| `System`             | Aspetos relacionados principalmente com alojamento e afinação ao nível do servidor   |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Revisão de Código

Os pull requests são revistos pela equipa de maintainers. Esteja preparado para:

* Responder ao feedback e efetuar revisões
* Manter o seu branch atualizado com `master`
* Garantir que os testes passam

## Comunicação de Problemas

Comunique bugs e pedidos de funcionalidades no rastreador de issues do GitHub.