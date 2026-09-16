# Importação e Exportação de Cursos

O Chamilo suporta a importação e a exportação de cursos para fins de cópia de segurança, migração e partilha de conteúdos.

Estas funcionalidades encontram-se no interior do curso, na ferramenta **Manutenção**, localizada sob o ícone de engrenagem no topo da página inicial do curso.

## Exportar um Curso

Os professores podem exportar os seus próprios cursos a partir da ferramenta de Manutenção do curso. Como administrador, pode exportar qualquer curso:

1. Entre no curso
2. Aceda à ferramenta **Manutenção do curso**
3. Selecione **Criar uma cópia de segurança**
4. Escolha o que incluir (conteúdo, dados de utilizadores, etc.)
5. Descarregue o ficheiro de exportação

A exportação cria um pacote que contém os documentos, exercícios, fóruns, percursos de aprendizagem e a configuração do curso.

## Importar um Curso

Para importar um curso a partir de um ficheiro de exportação do Chamilo:

1. Entre no curso
2. Aceda à ferramenta **Manutenção do curso**
3. Na secção **Importar cópia de segurança**, carregue o ficheiro de exportação
4. Escolha o que incluir (conteúdo, dados de utilizadores, etc.)
5. Configure as opções de importação:
   * Se deve sobrescrever o conteúdo existente
   * Se deve incluir dados de utilizadores
6. Execute a importação

## Copiar um Curso

Para copiar os conteúdos de outro curso para o seu curso, é necessário que existam previamente um curso de origem e um curso de destino.

1. Entre no curso de destino
2. Aceda à ferramenta **Manutenção do curso**
3. Na secção **Copiar curso**, selecione o curso **Origem**
4. Valide as opções
5. Clique em **Continuar** e siga as instruções

## Common Cartridge

O Chamilo suporta o padrão **IMS Common Cartridge 1.3** (IMS CC 1.3) para interoperabilidade com outros sistemas de gestão da aprendizagem. Pode:

* **Importar** pacotes Common Cartridge (ficheiros .imscc)
* **Exportar** o conteúdo do curso no formato Common Cartridge

Isto permite a troca de conteúdos com outras plataformas que suportam o padrão Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Reciclar um curso

A funcionalidade de reciclagem de curso permite simplesmente manter a estrutura do curso, mas apagar o seu conteúdo.

## Eliminar um curso

Isto apagará completamente o seu curso, incluindo todos os seus conteúdos e a atividade dos utilizadores nele.

Para eliminar um curso de forma permanente:

1. Entre no curso de destino
2. Aceda à ferramenta **Manutenção do curso**
3. Na secção **Eliminar completamente este curso**, introduza o código do curso manualmente para confirmar a sua intenção
4. Valide

Em seguida, é redirecionado para a página inicial do portal, porque o curso já não existe.

## Importação a partir do Moodle

O Chamilo pode importar cópias de segurança de cursos do **Moodle**. O importador converte a estrutura de conteúdos do Moodle para o formato do Chamilo, incluindo questionários, documentos e definições do curso.

> **Trabalho em curso.** Embora já cubra uma base alargada, o importador do Moodle não cobre atualmente todos os tipos de atividade e formatos de conteúdo do Moodle. Trate-o como um ponto de partida que pode ainda exigir ajustes manuais após a conclusão da importação. Se detetar algum elemento em falha ou em falta na importação ou na exportação, comunique-o através do nosso [espaço no Github](https://github.com/chamilo/chamilo-lms/issues), clicando em **New issue** no topo e fornecendo o máximo de pormenores possível (incluindo a própria cópia de segurança do curso, se não for confidencial).

## Dicas

* **Cópias de segurança regulares** — Incentive os professores a exportar os seus cursos periodicamente como cópia de segurança
* **Testar importações** — Ao importar conteúdo de outra plataforma, teste primeiro a importação num curso de ensaio para verificar se tudo foi transferido corretamente
* **Portabilidade de conteúdos** — Utilize o formato Common Cartridge quando precisar de partilhar conteúdos com outras plataformas LMS