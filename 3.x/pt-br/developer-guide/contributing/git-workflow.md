# Fluxo de Trabalho Git

## Repositório

O código-fonte do Chamilo está hospedado no GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramificação

* **`master`** — Branch principal de desenvolvimento
* Branches de funcionalidades são criadas a partir de `master` para novos desenvolvimentos
* Branches de release são criadas para versões estáveis

## Contribuindo com uma Alteração

1. **Faça um fork** do repositório no GitHub
2. **Clone** o seu fork localmente
3. **Crie uma branch** para a sua alteração: `git checkout -b feature/my-feature`
4. **Faça as suas alterações** seguindo as convenções de código
5. **Faça o commit** com mensagens claras e descritivas
6. **Envie (push)** para o seu fork: `git push origin feature/my-feature`
7. **Crie um pull request** contra a branch `master`

## Mensagens de Commit

Escreva mensagens de commit claras que expliquem **o quê** e **por quê**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Convenção de prefixo de ferramenta

A linha de assunto é prefixada com a **ferramenta ou área** que a alteração afeta, seguida de dois-pontos. Utilizamos uma terminologia compartilhada e breve para que o changelog e o `git log --oneline` possam ser percorridos por ferramenta. O prefixo é sempre a forma **singular** do nome canônico da ferramenta.

Formato: `<Prefix>: <Imperative summary in the present tense>`

Exemplos:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Se uma alteração abrange várias ferramentas, escolha a mais afetada; alterações verdadeiramente transversais que tocam apenas a estrutura do código (sem ferramenta de usuário final) vão em `Internal`. Alterações apenas de documentação (este site, o changelog, docblocks inline destinados puramente como referência) vão em `Documentation`.

#### Prefixos permitidos

| Prefix               | Scope / notes                                                                        |
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
| `CI`                 | Integração contínua, testes automatizados etc.                                       |
| `Course description` |                                                                                      |
| `Course Progress`    | Não "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Qualquer coisa relacionada exclusivamente à documentação do Chamilo ou do código, o changelog etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Não "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclui certificados                                                                  |
| `Group`              | Inclui grupos de curso, grupos globais e turmas                                      |
| `Help`               |                                                                                      |
| `Hook`               | Para o mecanismo interno de hooks                                                    |
| `Install`            | Inclui itens de atualização                                                          |
| `Internal`           | Para alterações e correções que afetam principalmente o próprio código ou são de natureza muito global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Para LP / percursos de aprendizagem                                                  |
| `Maintenance`        | A ferramenta de manutenção de curso: cópias de curso, backup, restauração etc.       |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Para o que reside em `tests/scripts/`                                                |
| `Search`             | Busca em texto completo                                                              |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Rede social                                                                          |
| `SSO`                | Métodos de Single Sign-On                                                            |
| `Survey`             |                                                                                      |
| `System`             | Coisas que têm principalmente a ver com hospedagem e ajuste fino no nível do servidor |
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

Os pull requests são revisados pela equipe de mantenedores. Esteja preparado para:

* Tratar o feedback e fazer revisões
* Manter sua branch atualizada com `master`
* Garantir que os testes passem

## Relato de Problemas

Relate bugs e solicitações de funcionalidades no rastreador de issues do GitHub.