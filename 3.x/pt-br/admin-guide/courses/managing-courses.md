# Gerenciando Cursos

Como administrador, você pode gerenciar todos os cursos da plataforma, independentemente de quem os criou.

## Lista de Cursos

![A lista de cursos mostrando todos os cursos com título, código, categoria, usuários inscritos e status de visibilidade](/.gitbook/assets/admin-course-list.png)

No painel de administração, clique em **Lista de cursos** para ver todos os cursos. A lista mostra:

* Título e código do curso
* Idioma
* Categorias
* Status de visibilidade

Use a ferramenta **Pesquisa avançada** para encontrar cursos específicos.

## Criando um Curso

Como administrador, você pode criar cursos e atribuí-los a qualquer professor:

1. Clique em **Adicionar curso** no painel de administração
2. Preencha os detalhes do curso (título, código, categoria, idioma)
3. Atribua um professor ao curso
4. Salve

Observação: No Chamilo 1.11.x, o código do curso era exibido como parte da URL do curso e era impossível alterá-lo após a criação do curso. Esse comportamento mudou a partir da versão 2.x. O código do curso não é mais visível na URL, e versões futuras poderão permitir que os professores modifiquem o código do curso posteriormente, à medida que ele se torna menos essencial para a plataforma.

## Gerenciando um Curso Existente

Encontre um curso na lista para acessar as opções de gerenciamento na coluna *Ações*:

* **Informações** — Exibe informações sobre o curso 
* **Página inicial do curso** — Leva você diretamente à página inicial do curso 
* **Relatórios** — Consulte dados de engajamento e desempenho
* **Editar** — Altere o título, a categoria, a visibilidade e outras configurações do curso
* **Criar um backup** — Vá para a seção de manutenção do curso, onde você pode criar cópias e realizar outras ações
* **Adicionar ao catálogo** — Adicione este curso ao catálogo de cursos
* **Excluir** — Remove permanentemente o curso e todo o seu conteúdo

> Excluir um curso remove permanentemente todo o conteúdo, os dados dos alunos, as notas e as informações de rastreamento. Considere exportar o curso primeiro como backup.

## Operações em Lote

Selecione vários cursos na lista para executar ações em lote, como excluí-los. Para exportar um curso, entre no curso e use a ferramenta **Manutenção** — não há ação de exportação em lote na lista de cursos do administrador.

## Configurações de Visibilidade do Curso

Os administradores podem substituir a visibilidade definida pelos professores:

| Visibilidade | Efeito |
|-----------|--------|
| **Público** | Acessível a todos, incluindo visitantes anônimos |
| **Aberto** | Acessível a todos os usuários autenticados |
| **Privado** | Somente usuários inscritos podem acessar o curso |
| **Fechado** | Ninguém pode acessar o curso (exceto o professor e os administradores) |
| **Oculto** | Ninguém pode visualizar ou acessar o curso (exceto os administradores) |