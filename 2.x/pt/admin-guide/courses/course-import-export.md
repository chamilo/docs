# Importação e Exportação de Cursos

O Chamilo suporta a importação e exportação de cursos para fins de backup, migração e compartilhamento de conteúdo.

Essas funcionalidades estão localizadas dentro do curso, na ferramenta **Manutenção**, acessível pelo ícone de engrenagem no topo da página inicial do curso.

## Exportação de um Curso

Os professores podem exportar seus próprios cursos a partir da ferramenta de Manutenção do curso. Como administrador, você pode exportar qualquer curso:

1. Acesse o curso
2. Acesse a ferramenta **Manutenção do curso**
3. Selecione **Criar um backup**
4. Escolha o que incluir (conteúdo, dados de usuários, etc.)
5. Faça o download do arquivo de exportação

A exportação cria um pacote contendo os documentos, exercícios, fóruns, trilhas de aprendizagem e configurações do curso.

## Importação de um Curso

Para importar um curso a partir de um arquivo de exportação do Chamilo:

1. Acesse o curso
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Importar backup**, faça o upload do arquivo de exportação
4. Escolha o que incluir (conteúdo, dados de usuários, etc.)
5. Configure as opções de importação:
   * Se deseja sobrescrever o conteúdo existente
   * Se deseja incluir dados de usuários
6. Execute a importação

## Cópia de um Curso

Para copiar o conteúdo de outro curso para o seu curso, você precisará de um curso de origem e um curso de destino já criados.

1. Acesse o curso de destino
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Copiar curso**, selecione o curso de **Origem**
4. Valide as opções
5. Clique em **Continuar** e siga as instruções

## Common Cartridge

O Chamilo suporta o padrão **IMS Common Cartridge 1.3** (IMS CC 1.3) para interoperabilidade com outros sistemas de gestão de aprendizagem. Você pode:

* **Importar** pacotes Common Cartridge (arquivos .imscc)
* **Exportar** conteúdo do curso no formato Common Cartridge

Isso permite a troca de conteúdo com outras plataformas que suportam o padrão Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Reciclagem de um Curso

A funcionalidade de reciclagem de curso permite que você mantenha a estrutura do curso, mas apague seu conteúdo.

## Exclusão de um Curso

Isso apagará completamente o seu curso, incluindo todo o seu conteúdo e a atividade dos usuários nele.

Para excluir um curso permanentemente:

1. Acesse o curso de destino
2. Acesse a ferramenta **Manutenção do curso**
3. Na seção **Excluir completamente este curso**, insira o código do curso manualmente para confirmar sua intenção
4. Valide

Você será redirecionado para a página inicial do portal, pois o curso não existirá mais.

## Importação do Moodle

O Chamilo pode importar backups de cursos do **Moodle**. O importador converte a estrutura de conteúdo do Moodle para o formato do Chamilo, incluindo questionários, documentos e configurações do curso.

> **Trabalho em andamento.** Embora já cubra uma ampla base, o importador do Moodle atualmente não abrange todos os tipos de atividades e formatos de conteúdo do Moodle. Considere-o como um ponto de partida que ainda pode exigir ajustes manuais após a conclusão da importação. Se você detectar algum elemento ausente ou com falha na importação ou exportação, por favor, reporte-nos através do nosso [espaço no Github](https://github.com/chamilo/chamilo-lms/issues) clicando em **New issue** no topo e fornecendo o máximo de detalhes possível (incluindo o backup do curso, se não for confidencial).

## Dicas

* **Backups regulares** — Incentive os professores a exportarem seus cursos periodicamente como backup
* **Teste de importações** — Ao importar conteúdo de outra plataforma, teste a importação em um curso de teste primeiro para verificar se tudo foi transferido corretamente
* **Portabilidade de conteúdo** — Use o formato Common Cartridge quando precisar compartilhar conteúdo com outras plataformas LMS