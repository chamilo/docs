# Configurações de Documentos

Comportamento da ferramenta **Documentos** do curso — envios, extensões permitidas, compartilhamento e modelos.

Acesse estas configurações em **Administração > Configurações > Documentos**. Esta categoria contém **29 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `access_url_specific_files`

**Ativar arquivos específicos por URL**

Quando este recurso está ativado em uma configuração multi-URL, você pode ir à URL principal e fornecer versões específicas por URL de qualquer arquivo (na ferramenta de documentos). O arquivo original será substituído pela alternativa sempre que for visualizado a partir de uma URL diferente. Isso permite personalizar ainda mais cada URL, aproveitando a vantagem de reutilizar os mesmos cursos várias vezes.

*Padrão: `false`*

### `default_document_quotum`

**Espaço padrão em disco rígido**

Qual é o espaço em disco disponível para um curso? Você pode substituir a cota de um curso específico em: administração da plataforma > Cursos > modificar

*Padrão: `1000`*


### `default_group_quotum`

**Espaço em disco disponível para grupos**

Qual é o espaço padrão em disco rígido disponível para a ferramenta de documentos de um grupo?

*Padrão: `250`*


### `documents_custom_cloud_link_list`

**Definir lista restrita de hosts para links na nuvem**

A ferramenta de documentos pode integrar links para arquivos na nuvem. A lista de serviços de nuvem é limitada a uma lista fixa no código, mas você pode definir o array ‘links’ que conterá uma lista própria de serviços/URLs. A lista definida aqui substituirá a lista padrão.

### `documents_default_visibility_defined_in_course`

**Visibilidade do documento definida no curso**

A visibilidade padrão dos documentos para todos os cursos

*Padrão: `false`*

### `documents_hide_download_icon`

**Ocultar ícone de download dos documentos**

Na ferramenta de documentos, ocultar o ícone de download dos usuários.

*Padrão: `false`*


### `enable_x_sendfile_headers`

**Ativar cabeçalhos X-sendfile**

Ative esta opção se o X-sendfile estiver habilitado no servidor web e você quiser adicionar os cabeçalhos necessários para que os navegadores o utilizem.

*Padrão: `false`*

### `group_category_document_access`

**Ativar opções de compartilhamento para documentos dentro da categoria de grupo**

Quando ativado, os administradores podem definir o acesso e as permissões de compartilhamento de documentos para grupos de documentos por categoria.

*Padrão: `false`*


### `group_document_access`

**Ativar opções de compartilhamento para documentos de grupo**

Quando ativado, o compartilhamento de documentos e as permissões de acesso podem ser configurados no nível do grupo.

*Padrão: `false`*


### `pdf_export_watermark_by_course`

**Ativar definição de marca d'água por curso**

Quando esta opção está ativada, os professores podem definir sua própria marca d'água para os documentos de seus cursos.

*Padrão: `false`*


### `pdf_export_watermark_enable`

**Ativar marca d'água na exportação PDF**

Ao ativar esta opção, você pode enviar uma imagem ou um texto que será automaticamente adicionado como marca d'água a todas as exportações PDF de documentos no sistema.

*Padrão: `false`*

### `pdf_export_watermark_text`

**Texto da marca d'água do PDF**

Este texto será adicionado como marca d'água às exportações de documentos em PDF.

### `permanently_remove_deleted_files`

**Arquivos excluídos não podem ser restaurados**

Excluir um arquivo na ferramenta de documentos o remove de forma permanente. O arquivo não pode ser restaurado

*Padrão: `false`*

### `permissions_for_new_directories`

**Permissões para novos diretórios**

A capacidade de definir as permissões a atribuir a cada diretório recém-criado permite melhorar a segurança contra ataques de invasores que enviam conteúdo perigoso ao seu portal. A configuração padrão (0770) deve ser suficiente para oferecer ao servidor um nível razoável de proteção. O formato utilizado segue a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução.

*Padrão: `0770`*


### `permissions_for_new_files`

**Permissões para novos arquivos**

A capacidade de definir as permissões a atribuir a cada arquivo recém-criado permite melhorar a segurança contra ataques de invasores que enviam conteúdo perigoso ao seu portal. A configuração padrão (0550) deve ser suficiente para oferecer ao servidor um nível razoável de proteção. O formato utilizado segue a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução. Se você usar o Oogie, certifique-se de que o usuário que inicia o LibreOffice possa gravar arquivos na pasta do curso.

*Padrão: `0660`*


### `send_notification_when_document_added`

**Enviar notificação aos alunos quando um documento for adicionado**

Sempre que alguém criar um novo item na ferramenta de documentos, enviar uma notificação aos usuários.

*Padrão: `false`*

### `show_default_folders`

**Exibir na ferramenta de documentos todas as pastas que contêm recursos multimídia fornecidos por padrão**

Pastas de arquivos multimídia contendo arquivos fornecidos por padrão, organizados em categorias de vídeo, áudio, imagem e animações flash para uso nos cursos. Mesmo que você as torne invisíveis na ferramenta de documentos, ainda poderá usar esses recursos no editor web da plataforma.

*Padrão: `true`*

### `show_documents_preview`

**Exibir pré-visualização de documentos**

Exibir pré-visualizações dos documentos na ferramenta de documentos evita o carregamento de uma nova página apenas para mostrar um documento, mas pode resultar instável em alguns navegadores mais antigos ou em telas de largura menor.

*Padrão: `false`*

### `show_users_folders`

**Exibir pastas de usuários na ferramenta de documentos**

Esta opção permite mostrar ou ocultar aos professores as pastas que o sistema gera para cada usuário que visita a ferramenta de documentos ou envia um arquivo pelo editor web. Se você exibir essas pastas aos professores, eles poderão torná-las visíveis ou não aos alunos e permitir que cada aluno tenha um espaço específico no curso onde não apenas armazenar documentos, mas também criar e editar páginas web e exportá-las para PDF, fazer desenhos, criar modelos web pessoais, enviar arquivos, bem como criar, mover e excluir diretórios e arquivos e fazer cópias de segurança de suas pastas. Cada usuário do curso terá um gerenciador de documentos completo. Lembre-se também de que qualquer usuário pode copiar um arquivo visível de qualquer pasta na ferramenta de documentos (seja ou não o proprietário) para seus portfólios ou área de documentos pessoais da rede social, que ficará disponível para uso em outros cursos.

*Padrão: `true`*

### `students_download_folders`

**Permitir que os alunos baixem diretórios**

Permitir que os alunos compactem e baixem um diretório completo da ferramenta de documentos

*Padrão: `true`*


### `students_export2pdf`

**Permitir que os alunos exportem documentos web para o formato PDF nas ferramentas de documentos e wiki**

Este recurso está habilitado por padrão, mas, em caso de abuso que sobrecarregue o servidor, ou em ambientes de aprendizagem específicos, pode-se querer desabilitá-lo para todos os cursos.

*Padrão: `true`*

### `thematic_pdf_orientation`

**Orientação do PDF para o progresso do curso**

Na ferramenta de progresso do curso, você pode imprimir um PDF dos diferentes elementos. Defina ‘portrait’ ou ‘landscape’ (termos técnicos) para alterá-la.

*Padrão: `landscape`*


### `upload_extensions_blacklist`

**Lista negra - configuração**

A lista negra é usada para filtrar as extensões de arquivos, removendo (ou renomeando) qualquer arquivo cuja extensão figure na lista negra abaixo. As extensões devem figurar sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no seguinte:  exe;com;bat;scr;php. Arquivos sem extensão são aceitos. Maiúsculas e minúsculas não importam.

### `upload_extensions_list_type`

**Tipo de filtragem nos envios de documentos**

Se você deseja usar a filtragem por lista negra ou por lista branca. Consulte a descrição da lista negra ou da lista branca abaixo para mais detalhes.

*Padrão: `blacklist`*


### `upload_extensions_replace_by`

**Extensão de substituição**

Informe a extensão que você deseja usar para substituir as extensões perigosas detectadas pelo filtro. Necessário apenas se você tiver selecionado um filtro por substituição.

*Padrão: `dangerous`*


### `upload_extensions_skip`

**Comportamento da filtragem (ignorar/renomear)**

Se você escolher ignorar, os arquivos filtrados pela lista negra ou pela lista branca não serão enviados ao sistema. Se você escolher renomeá-los, a extensão será substituída pela definida na configuração de extensão de substituição. Atenção: renomear não protege realmente e pode causar colisão de nomes se existirem vários arquivos com o mesmo nome, mas extensões diferentes.

*Padrão: `true`*


### `upload_extensions_whitelist`

**Lista branca - configuração**

A lista branca é usada para filtrar as extensões de arquivos, removendo (ou renomeando) qualquer arquivo cuja extensão *NÃO* figure na lista branca abaixo. Em geral, é considerada uma abordagem mais segura, porém mais restritiva, de filtragem. As extensões devem figurar sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no seguinte:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Arquivos sem extensão são aceitos. Maiúsculas e minúsculas não importam.

### `users_copy_files`

**Permitir que os usuários copiem arquivos de um curso para a área pessoal de arquivos**

Permite que os usuários copiem arquivos de um curso para a área pessoal de arquivos, visível pela Rede Social ou pelo editor HTML quando estiverem fora de um curso

*Padrão: `true`*


### `video_features`

**Recursos de vídeo**

Array de recursos extras que você pode habilitar para o reprodutor de vídeo no Chamilo. As opções incluem 'speed', que permite alterar a velocidade de reprodução de um vídeo.