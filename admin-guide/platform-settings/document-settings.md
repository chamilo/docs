# Configurações de Documentos

Comportamento da ferramenta **Documentos** do curso — uploads, extensões permitidas, compartilhamento e modelos.

Acesse essas configurações em **Administração > Configurações de configuração > Documentos**. Esta categoria contém **29 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `access_url_specific_files`

**Habilitar arquivos específicos por URL**

Quando esta funcionalidade está ativada em uma configuração multi-URL, você pode acessar a URL principal e fornecer versões específicas de qualquer arquivo (na ferramenta de documentos) para cada URL. O arquivo original será substituído pela alternativa sempre que visualizado a partir de uma URL diferente. Isso permite personalizar ainda mais cada URL, enquanto aproveita a vantagem de reutilizar os mesmos cursos várias vezes.

*Padrão: `false`*

### `default_document_quotum`

**Espaço em disco padrão**

Qual é o espaço em disco disponível para um curso? Você pode sobrescrever a cota para cursos específicos através de: administração da plataforma > Cursos > modificar

*Padrão: `1000`*

### `default_group_quotum`

**Espaço em disco disponível para grupos**

Qual é o espaço em disco padrão disponível para a ferramenta de documentos de grupos?

*Padrão: `250`*

### `documents_custom_cloud_link_list`

**Definir lista restrita de hosts para links na nuvem**

A ferramenta de documentos pode integrar links para arquivos na nuvem. A lista de serviços de nuvem é limitada a uma lista codificada, mas você pode definir o array ‘links’ que conterá uma lista de serviços/URLs personalizados. A lista definida aqui substituirá a lista padrão.

### `documents_default_visibility_defined_in_course`

**Visibilidade de documentos definida no curso**

A visibilidade padrão de documentos para todos os cursos

*Padrão: `false`*

### `documents_hide_download_icon`

**Ocultar ícone de download de documentos**

Na ferramenta de documentos, ocultar o ícone de download para os usuários.

*Padrão: `false`*

### `enable_x_sendfile_headers`

**Habilitar cabeçalhos X-sendfile**

Habilite esta opção se você tiver o X-sendfile ativado no nível do servidor web e desejar adicionar os cabeçalhos necessários para que os navegadores o reconheçam.

*Padrão: `false`*

### `group_category_document_access`

**Habilitar opções de compartilhamento para documentos dentro de categorias de grupo**

Quando ativado, os administradores podem definir permissões de acesso e compartilhamento para grupos de documentos por categoria.

*Padrão: `false`*

### `group_document_access`

**Habilitar opções de compartilhamento para documentos de grupo**

Quando ativado, as permissões de compartilhamento e acesso a documentos podem ser configuradas no nível do grupo.

*Padrão: `false`*

### `pdf_export_watermark_by_course`

**Habilitar definição de marca d'água por curso**

Quando esta opção está ativada, os professores podem definir sua própria marca d'água para os documentos em seus cursos.

*Padrão: `false`*

### `pdf_export_watermark_enable`

**Habilitar marca d'água na exportação de PDF**

Ao ativar esta opção, você pode fazer upload de uma imagem ou texto que será automaticamente adicionado como marca d'água em todas as exportações de documentos para PDF no sistema.

*Padrão: `false`*

### `pdf_export_watermark_text`

**Texto de marca d'água em PDF**

Este texto será adicionado como marca d'água nas exportações de documentos para PDF.

### `permanently_remove_deleted_files`

**Arquivos excluídos não podem ser restaurados**

Excluir um arquivo na ferramenta de documentos o remove permanentemente. O arquivo não pode ser restaurado.

*Padrão: `false`*

### `permissions_for_new_directories`

**Permissões para novos diretórios**

A capacidade de definir as configurações de permissões a serem atribuídas a cada diretório recém-criado permite melhorar a segurança contra ataques de hackers que fazem upload de conteúdo perigoso para o seu portal. A configuração padrão (0770) deve ser suficiente para fornecer ao seu servidor um nível razoável de proteção. O formato fornecido usa a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução.

*Padrão: `0770`*

### `permissions_for_new_files`

**Permissões para novos arquivos**

A capacidade de definir as configurações de permissões a serem atribuídas a cada arquivo recém-criado permite melhorar a segurança contra ataques de hackers que fazem upload de conteúdo perigoso para o seu portal. A configuração padrão (0550) deve ser suficiente para fornecer ao seu servidor um nível razoável de proteção. O formato fornecido usa a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução. Se você usa o Oogie, certifique-se de que o usuário que executa o LibreOffice pode gravar arquivos na pasta do curso.

*Padrão: `0660`*

### `send_notification_when_document_added`

**Enviar notificação aos alunos quando um documento for adicionado**

Sempre que alguém criar um novo item na ferramenta de documentos, enviar uma notificação aos usuários.

*Padrão: `false`*

---
### `show_default_folders`

**Mostrar na ferramenta de documentos todas as pastas contendo recursos multimídia fornecidos por padrão**

Pastas de arquivos multimídia contendo arquivos fornecidos por padrão, organizados em categorias de vídeo, áudio, imagem e animações em flash para uso nos cursos. Embora você possa torná-las invisíveis na ferramenta de documentos, ainda é possível utilizar esses recursos no editor web da plataforma.

*Padrão: `true`*

### `show_documents_preview`

**Mostrar pré-visualização de documentos**

Exibir pré-visualizações dos documentos na ferramenta de documentos evita o carregamento de uma nova página apenas para mostrar um documento, mas pode ser instável em alguns navegadores mais antigos ou em telas de largura menor.

*Padrão: `false`*

### `show_users_folders`

**Mostrar pastas de usuários na ferramenta de documentos**

Esta opção permite mostrar ou ocultar para os professores as pastas que o sistema gera para cada usuário que acessa a ferramenta de documentos ou envia um arquivo pelo editor web. Se você exibir essas pastas para os professores, eles podem torná-las visíveis ou não para os alunos e permitir que cada aluno tenha um espaço específico no curso onde não apenas armazenar documentos, mas também criar e editar páginas web, exportar para PDF, fazer desenhos, criar modelos web pessoais, enviar arquivos, bem como criar, mover e excluir diretórios e arquivos e fazer cópias de segurança de suas pastas. Cada usuário do curso terá um gerenciador de documentos completo. Além disso, lembre-se de que qualquer usuário pode copiar um arquivo visível de qualquer pasta na ferramenta de documentos (independentemente de quem seja o proprietário) para seus portfólios ou área de documentos pessoais da rede social, que estará disponível para uso em outros cursos.

*Padrão: `true`*

### `students_download_folders`

**Permitir que os alunos baixem diretórios**

Permite que os alunos compactem e baixem um diretório completo da ferramenta de documentos.

*Padrão: `true`*

### `students_export2pdf`

**Permitir que os alunos exportem documentos web para o formato PDF nas ferramentas de documentos e wiki**

Este recurso está ativado por padrão, mas em caso de sobrecarga do servidor ou abuso, ou em ambientes de aprendizagem específicos, você pode querer desativá-lo para todos os cursos.

*Padrão: `true`*

### `thematic_pdf_orientation`

**Orientação do PDF para o progresso do curso**

Na ferramenta de progresso do curso, você pode imprimir um PDF dos diferentes elementos. Defina 'portrait' ou 'landscape' (termos técnicos) para alterar a orientação.

*Padrão: `landscape`*

### `upload_extensions_blacklist`

**Lista negra - configuração**

A lista negra é usada para filtrar as extensões de arquivos, removendo (ou renomeando) qualquer arquivo cuja extensão esteja na lista negra abaixo. As extensões devem ser listadas sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no exemplo a seguir: exe;com;bat;scr;php. Arquivos sem extensão são aceitos. A distinção entre maiúsculas e minúsculas não é considerada.

### `upload_extensions_list_type`

**Tipo de filtragem no upload de documentos**

Define se você deseja usar a filtragem por lista negra ou lista branca. Veja a descrição de lista negra ou lista branca abaixo para mais detalhes.

*Padrão: `blacklist`*

### `upload_extensions_replace_by`

**Extensão de substituição**

Insira a extensão que você deseja usar para substituir as extensões perigosas detectadas pelo filtro. Necessário apenas se você selecionou um filtro por substituição.

*Padrão: `dangerous`*

### `upload_extensions_skip`

**Comportamento de filtragem (ignorar/renomear)**

Se você escolher ignorar, os arquivos filtrados pela lista negra ou lista branca não serão enviados para o sistema. Se você optar por renomeá-los, a extensão deles será substituída pela definida na configuração de substituição de extensão. Cuidado, pois renomear não oferece proteção real e pode causar colisão de nomes se vários arquivos com o mesmo nome, mas extensões diferentes, existirem.

*Padrão: `true`*

### `upload_extensions_whitelist`

**Lista branca - configuração**

A lista branca é usada para filtrar as extensões de arquivos, removendo (ou renomeando) qualquer arquivo cuja extensão *NÃO* esteja na lista branca abaixo. Geralmente, é considerada uma abordagem mais segura, porém mais restritiva, para filtragem. As extensões devem ser listadas sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no exemplo a seguir: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Arquivos sem extensão são aceitos. A distinção entre maiúsculas e minúsculas não é considerada.

### `users_copy_files`

**Permitir que os usuários copiem arquivos de um curso para sua área de arquivos pessoais**

Permite que os usuários copiem arquivos de um curso para sua área de arquivos pessoais, visível através da Rede Social ou pelo editor HTML quando estão fora de um curso.

*Padrão: `true`*

### `video_features`

**Recursos de vídeo**

Conjunto de recursos extras que você pode habilitar para o reprodutor de vídeo no Chamilo. As opções incluem 'speed', que permite alterar a velocidade de reprodução de um vídeo.