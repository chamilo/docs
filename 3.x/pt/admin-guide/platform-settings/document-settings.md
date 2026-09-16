# Definições de Documentos

Comportamento da ferramenta **Documentos** do curso — carregamentos, extensões permitidas, partilha e modelos.

Aceda a estas definições em **Administração > Definições de configuração > Documentos**. Esta categoria contém **29 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `access_url_specific_files`

**Ativar ficheiros específicos por URL**

Quando esta funcionalidade está ativada numa configuração multi-URL, pode ir ao URL principal e fornecer versões específicas por URL de qualquer ficheiro (na ferramenta de documentos). O ficheiro original será substituído pela alternativa sempre que for visualizado a partir de um URL diferente. Isto permite personalizar ainda mais cada URL, beneficiando da reutilização dos mesmos cursos várias vezes.

*Predefinição: `false`*

### `default_document_quotum`

**Espaço em disco rígido predefinido**

Qual é o espaço em disco disponível para um curso? Pode substituir a quota de um curso específico em: administração da plataforma > Cursos > modificar

*Predefinição: `1000`*


### `default_group_quotum`

**Espaço em disco disponível para grupos**

Qual é o espaço em disco rígido predefinido disponível para a ferramenta de documentos dos grupos?

*Predefinição: `250`*


### `documents_custom_cloud_link_list`

**Definir lista rigorosa de anfitriões para ligações na nuvem**

A ferramenta de documentos pode integrar ligações para ficheiros na nuvem. A lista de serviços na nuvem está limitada a uma lista codificada, mas pode definir o array ‘links’ que conterá uma lista dos seus próprios serviços/URLs. A lista definida aqui substituirá a lista predefinida.

### `documents_default_visibility_defined_in_course`

**Visibilidade dos documentos definida no curso**

A visibilidade predefinida dos documentos para todos os cursos

*Predefinição: `false`*

### `documents_hide_download_icon`

**Ocultar o ícone de descarregamento dos documentos**

Na ferramenta de documentos, ocultar o ícone de descarregamento aos utilizadores.

*Predefinição: `false`*


### `enable_x_sendfile_headers`

**Ativar cabeçalhos X-sendfile**

Ative esta opção se tiver o X-sendfile ativado ao nível do servidor web e pretender adicionar os cabeçalhos necessários para que os navegadores os utilizem.

*Predefinição: `false`*

### `group_category_document_access`

**Ativar opções de partilha para documentos dentro da categoria de grupo**

Quando ativado, os administradores podem definir o acesso e as permissões de partilha de documentos para grupos de documentos por categoria.

*Predefinição: `false`*


### `group_document_access`

**Ativar opções de partilha para documentos de grupo**

Quando ativado, a partilha de documentos e as permissões de acesso podem ser configuradas ao nível do grupo.

*Predefinição: `false`*


### `pdf_export_watermark_by_course`

**Ativar definição de marca de água por curso**

Quando esta opção está ativada, os formadores podem definir a sua própria marca de água para os documentos dos seus cursos.

*Predefinição: `false`*


### `pdf_export_watermark_enable`

**Ativar marca de água na exportação PDF**

Ao ativar esta opção, pode carregar uma imagem ou um texto que será automaticamente adicionado como marca de água a todas as exportações PDF de documentos no sistema.

*Predefinição: `false`*

### `pdf_export_watermark_text`

**Texto da marca de água PDF**

Este texto será adicionado como marca de água às exportações de documentos em PDF.

### `permanently_remove_deleted_files`

**Os ficheiros eliminados não podem ser restaurados**

Eliminar um ficheiro na ferramenta de documentos elimina-o de forma permanente. O ficheiro não pode ser restaurado

*Predefinição: `false`*

### `permissions_for_new_directories`

**Permissões para novos diretórios**

A possibilidade de definir as permissões a atribuir a cada diretório recém-criado permite melhorar a segurança contra ataques de piratas informáticos que carreguem conteúdo perigoso no seu portal. A definição predefinida (0770) deve ser suficiente para conferir ao servidor um nível de proteção razoável. O formato indicado utiliza a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução.

*Predefinição: `0770`*


### `permissions_for_new_files`

**Permissões para novos ficheiros**

A possibilidade de definir as permissões a atribuir a cada ficheiro recém-criado permite melhorar a segurança contra ataques de piratas informáticos que carreguem conteúdo perigoso no seu portal. A definição predefinida (0550) deve ser suficiente para conferir ao servidor um nível de proteção razoável. O formato indicado utiliza a terminologia UNIX de Proprietário-Grupo-Outros com permissões de Leitura-Escrita-Execução. Se utilizar o Oogie, tenha o cuidado de garantir que o utilizador que inicia o LibreOffice consegue escrever ficheiros na pasta do curso.

*Predefinição: `0660`*


### `send_notification_when_document_added`

**Enviar notificação aos estudantes quando um documento é adicionado**

Sempre que alguém cria um novo item na ferramenta de documentos, enviar uma notificação aos utilizadores.

*Predefinição: `false`*

### `show_default_folders`

**Mostrar na ferramenta de documentos todas as pastas que contêm recursos multimédia fornecidos por predefinição**

Pastas de ficheiros multimédia contendo ficheiros fornecidos por predefinição, organizados em categorias de vídeo, áudio, imagem e animações flash para utilizar nos cursos. Embora as torne invisíveis na ferramenta de documentos, ainda pode utilizar estes recursos no editor web da plataforma.

*Predefinição: `true`*

### `show_documents_preview`

**Mostrar pré-visualização de documentos**

Mostrar pré-visualizações dos documentos na ferramenta de documentos evitará carregar uma nova página apenas para mostrar um documento, mas pode resultar instável em alguns navegadores mais antigos ou ecrãs de menor largura.

*Predefinição: `false`*

### `show_users_folders`

**Mostrar pastas de utilizadores na ferramenta de documentos**

Esta opção permite mostrar ou ocultar aos professores as pastas que o sistema gera para cada utilizador que visita a ferramenta de documentos ou envia um ficheiro através do editor web. Se mostrar estas pastas aos professores, estes poderão torná-las visíveis ou não aos formandos e permitir que cada formando tenha um espaço específico no curso onde não só armazenar documentos, mas também criar e editar páginas web e exportar para PDF, fazer desenhos, criar modelos web pessoais, enviar ficheiros, bem como criar, mover e eliminar diretórios e ficheiros e fazer cópias de segurança das suas pastas. Cada utilizador do curso terá um gestor de documentos completo. Além disso, recorde que qualquer utilizador pode copiar um ficheiro visível de qualquer pasta na ferramenta de documentos (seja ou não o proprietário) para os seus portefólios ou área de documentos pessoais da rede social, que ficará disponível para o utilizar noutros cursos.

*Predefinição: `true`*

### `students_download_folders`

**Permitir que os formandos descarreguem diretórios**

Permitir que os formandos compactem e descarreguem um diretório completo a partir da ferramenta de documentos

*Predefinição: `true`*


### `students_export2pdf`

**Permitir que os formandos exportem documentos web para formato PDF nas ferramentas de documentos e wiki**

Esta funcionalidade está ativada por predefinição, mas em caso de abuso por sobrecarga do servidor, ou em ambientes de aprendizagem específicos, poderá pretender desativá-la para todos os cursos.

*Predefinição: `true`*

### `thematic_pdf_orientation`

**Orientação PDF para o progresso do curso**

Na ferramenta de progresso do curso, pode imprimir um PDF dos diferentes elementos. Defina ‘portrait’ ou ‘landscape’ (termos técnicos) para a alterar.

*Predefinição: `landscape`*


### `upload_extensions_blacklist`

**Lista negra - definição**

A lista negra é utilizada para filtrar as extensões dos ficheiros, removendo (ou renomeando) qualquer ficheiro cuja extensão figure na lista negra abaixo. As extensões devem figurar sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no seguinte:  exe;com;bat;scr;php. Ficheiros sem extensão são aceites. Maiúsculas/minúsculas não importam.

### `upload_extensions_list_type`

**Tipo de filtragem nos carregamentos de documentos**

Se pretende utilizar a filtragem por lista negra ou por lista branca. Consulte a descrição da lista negra ou da lista branca abaixo para mais pormenores.

*Predefinição: `blacklist`*


### `upload_extensions_replace_by`

**Extensão de substituição**

Introduza a extensão que pretende utilizar para substituir as extensões perigosas detetadas pelo filtro. Só é necessário se tiver selecionado um filtro por substituição.

*Predefinição: `dangerous`*


### `upload_extensions_skip`

**Comportamento da filtragem (saltar/renomear)**

Se escolher saltar, os ficheiros filtrados através da lista negra ou da lista branca não serão carregados para o sistema. Se escolher renomeá-los, a respetiva extensão será substituída pela definida na definição de substituição de extensão. Tenha em atenção que renomear não o protege realmente e pode causar colisão de nomes se existirem vários ficheiros com o mesmo nome mas extensões diferentes.

*Predefinição: `true`*


### `upload_extensions_whitelist`

**Lista branca - definição**

A lista branca é utilizada para filtrar as extensões dos ficheiros, removendo (ou renomeando) qualquer ficheiro cuja extensão *NÃO* figure na lista branca abaixo. É geralmente considerada uma abordagem mais segura, mas mais restritiva, à filtragem. As extensões devem figurar sem o ponto inicial (.) e separadas por ponto e vírgula (;) como no seguinte:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Ficheiros sem extensão são aceites. Maiúsculas/minúsculas não importam.

### `users_copy_files`

**Permitir que os utilizadores copiem ficheiros de um curso para a área pessoal de ficheiros**

Permite que os utilizadores copiem ficheiros de um curso para a área pessoal de ficheiros, visível através da Rede Social ou através do editor HTML quando estão fora de um curso

*Predefinição: `true`*


### `video_features`

**Funcionalidades de vídeo**

Array de funcionalidades extra que pode ativar para o leitor de vídeo no Chamilo. As opções incluem 'speed', que permite alterar a velocidade de reprodução de um vídeo.