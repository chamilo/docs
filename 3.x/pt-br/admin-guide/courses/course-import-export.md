# Importação e Exportação de Cursos

O Chamilo oferece suporte à importação e à exportação de cursos para fins de backup, migração e compartilhamento de conteúdo.

Esses recursos ficam dentro do curso, na ferramenta **Manutenção**, localizada sob o ícone de engrenagem no topo da página inicial do curso.

## Exportando um Curso

Os professores podem exportar seus próprios cursos a partir da ferramenta Manutenção do curso. Como administrador, você pode exportar qualquer curso:

1. Entre no curso
2. Acesse a ferramenta **Manutenção do curso**
3. Selecione **Criar um backup**
4. Escolha o que incluir (conteúdo, dados de usuários etc.)
5. Baixe o arquivo de exportação

A exportação cria um pacote contendo os documentos, exercícios, fóruns, percursos de aprendizagem e a configuração do curso.

## Importando um Curso

Para importar um curso a partir de um arquivo de exportação do Chamilo:

1. Entre no curso
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Importar backup**, envie o arquivo de exportação
4. Escolha o que incluir (conteúdo, dados de usuários etc.)
5. Configure as opções de importação:
   * Se o conteúdo existente deve ser sobrescrito
   * Se os dados de usuários devem ser incluídos
6. Execute a importação

## Copiando um Curso

Para copiar o conteúdo de outro curso para o seu curso, é necessário que um curso de origem e um curso de destino já tenham sido criados.

1. Entre no curso de destino
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Copiar curso**, selecione o curso de **Origem**
4. Valide as opções
5. Clique em **Continuar** e siga as instruções

## Common Cartridge

O Chamilo oferece suporte ao padrão **IMS Common Cartridge 1.3** (IMS CC 1.3) para interoperabilidade com outros sistemas de gestão da aprendizagem. Você pode:

* **Importar** pacotes Common Cartridge (arquivos .imscc)
* **Exportar** o conteúdo do curso no formato Common Cartridge

Isso permite a troca de conteúdo com outras plataformas que suportam o padrão Common Cartridge (Moodle, Canvas, Blackboard etc.).

## Reciclando um curso

O recurso de reciclagem de curso simplesmente permite manter a estrutura (o “esqueleto”) do curso, mas apagar o seu conteúdo.

## Excluindo um curso

Isso apagará completamente o seu curso, incluindo todo o conteúdo e a atividade dos usuários nele.

Para excluir um curso de forma permanente:

1. Entre no curso de destino
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Excluir completamente este curso**, digite o código do curso manualmente para confirmar a sua intenção
4. Valide

Em seguida, você é redirecionado para a página inicial do portal, porque o curso não existe mais.

## Importação do Moodle

O Chamilo pode importar backups de cursos do **Moodle**. O importador converte a estrutura de conteúdo do Moodle para o formato do Chamilo, incluindo questionários, documentos e configurações do curso.

> **Trabalho em andamento.** Embora já cubra uma base ampla, o importador do Moodle ainda não contempla todos os tipos de atividade e formatos de conteúdo do Moodle. Trate-o como um ponto de partida que pode ainda exigir ajustes manuais após a conclusão da importação. Se você detectar algum elemento com falha ou ausente na importação ou na exportação, relate-nos por meio do nosso [espaço no Github](https://github.com/chamilo/chamilo-lms/issues) clicando em **New issue** no topo e fornecendo o máximo de detalhes possível (incluindo o próprio backup do curso, se não for confidencial).

## Dicas

* **Backups regulares** — Incentive os professores a exportar seus cursos periodicamente como backup
* **Teste as importações** — Ao importar conteúdo de outra plataforma, teste a importação primeiro em um curso experimental para verificar se tudo foi transferido corretamente
* **Portabilidade de conteúdo** — Use o formato Common Cartridge quando precisar compartilhar conteúdo com outras plataformas LMS