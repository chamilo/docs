# Gestão de Cursos

Como administrador, pode gerir todos os cursos da plataforma, independentemente de quem os criou.

## Lista de Cursos

![A lista de cursos a mostrar todos os cursos com título, código, categoria, utilizadores inscritos e estado de visibilidade](../../.gitbook/assets/admin-course-list.png)

No painel de administração, clique em **Lista de cursos** para ver todos os cursos. A lista mostra:

* Título e código do curso
* Idioma
* Categorias
* Estado de visibilidade

Utilize a ferramenta **Pesquisa avançada** para encontrar cursos específicos.

## Criar um Curso

Como administrador, pode criar cursos e atribuí-los a qualquer professor:

1. Clique em **Adicionar curso** no painel de administração
2. Preencha os detalhes do curso (título, código, categoria, idioma)
3. Atribua um professor ao curso
4. Guarde

Nota: No Chamilo 1.11.x, o código do curso era apresentado como parte do URL do curso e era impossível alterá-lo após a criação do curso. Este comportamento mudou a partir da versão 2.x. O código do curso já não é visível no URL, e versões futuras poderão permitir que os professores modifiquem o código do curso posteriormente, uma vez que se tornou menos essencial para a plataforma.

## Gerir um Curso Existente

Encontre um curso na lista para aceder às opções de gestão na coluna *Ações*:

* **Informação** — Mostrar informações sobre o curso 
* **Página inicial do curso** — Envia-o diretamente para a página inicial do curso 
* **Relatórios** — Ver dados de envolvimento e desempenho
* **Editar** — Alterar o título do curso, a categoria, a visibilidade e outras definições
* **Criar uma cópia de segurança** — Ir para a secção de manutenção do curso, onde pode criar cópias e realizar outras ações
* **Adicionar ao catálogo** — Adicionar este curso ao catálogo de cursos
* **Eliminar** — Remover permanentemente o curso e todo o seu conteúdo

> Eliminar um curso remove de forma permanente todo o conteúdo, os dados dos formandos, as classificações e as informações de acompanhamento. Considere exportar o curso primeiro como cópia de segurança.

## Operações em Lote

Selecione vários cursos na lista para executar ações em lote, como eliminá-los. Para exportar um curso, entre no curso e utilize a ferramenta **Manutenção** — não existe uma ação de exportação em lote na lista de cursos da administração.

## Definições de Visibilidade do Curso

Os administradores podem sobrepor a visibilidade definida pelos professores:

| Visibilidade | Efeito |
|-----------|--------|
| **Público** | Acessível a todos, incluindo visitantes anónimos |
| **Aberto** | Acessível a todos os utilizadores autenticados |
| **Privado** | Apenas os utilizadores inscritos podem aceder ao curso |
| **Fechado** | Ninguém pode aceder ao curso (exceto o professor e os administradores) |
| **Oculto** | Ninguém pode ver ou aceder ao curso (exceto os administradores) |