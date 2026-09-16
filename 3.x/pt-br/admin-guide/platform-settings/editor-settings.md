# Configurações do editor

Configuração do editor de texto avançado (TinyMCE) usado em toda a plataforma — barras de ferramentas, plugins e assistentes de IA no editor.

Acesse estas configurações em **Administração > Configurações > Editor**. Esta categoria contém **26 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_email_editor`

**Editor de e-mail on-line ativado**

Se esta opção estiver ativada, clicar em um endereço de e-mail abrirá um editor on-line.

### `allow_spellcheck`

**Verificação ortográfica**

Ativar verificação ortográfica

### `block_copy_paste_for_students`

**Bloquear copiar e colar para os alunos**

Impedir que os alunos copiem e colem no editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedir copiar e colar imagens no editor WYSIWYG**

Impedir o uso de copiar e colar imagens como base64 no editor para evitar o preenchimento do banco de dados com imagens.

*Padrão: `false`*


### `editor_driver_list`

**Lista de drivers de arquivos do WYSIWYG**

Array contendo os nomes dos drivers para acesso a arquivos a partir do editor WYSIWYG.

### `editor_settings`

**Configurações do editor WYSIWYG**

Array de configuração genérico para reconfigurar o editor WYSIWYG globalmente.

### `enable_iframe_inclusion`

**Permitir iframes no editor HTML**

Permitir iframes arbitrários no editor HTML ampliará as capacidades de edição dos usuários, mas pode representar um risco de segurança. Certifique-se de que pode confiar em seus usuários (ou seja, de que sabe quem eles são) antes de ativar este recurso.

### `enable_uploadimage_editor`

**Permitir arrastar e soltar imagens no editor WYSIWYG**

Ativar o envio de imagens como arquivo ao copiar no conteúdo ou ao arrastar e soltar.

*Padrão: `false`*


### `enabled_asciisvg`

**Ativar AsciiSVG**

Ativar o plugin AsciiSVG no editor WYSIWYG para desenhar gráficos a partir de funções matemáticas.

### `enabled_googlemaps`

**Ativar Google Maps**

Ativar o botão para inserir Google Maps. A ativação não é totalmente realizada se o arquivo main/inc/lib/fckeditor/myconfig.php não tiver sido editado previamente e uma chave de API do Google Maps não tiver sido adicionada.

### `enabled_imgmap`

**Ativar mapas de imagem**

Ativar o botão para inserir mapas de imagem. Isso permite associar URLs a áreas de uma imagem, criando hotspots.

### `enabled_insertHtml`

**Permitir inserção de widgets**

Isso permite incorporar em suas páginas da web seus vídeos e aplicativos favoritos, como vimeo ou slideshare, e todo tipo de widgets e gadgets

### `enabled_mathjax`

**Ativar MathJax**

Ativar a biblioteca MathJax para visualizar fórmulas matemáticas. Isso adiciona um botão de fórmula à barra de ferramentas do editor, no qual as fórmulas são escritas em LaTeX. Consulte [Fórmulas matemáticas](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Criar e editar arquivos SVG**

Esta opção permite criar e editar SVG (Scalable Vector Graphics) em várias camadas on-line, bem como exportá-los para imagens no formato png.

### `enabled_wiris`

**Editor matemático WIRIS**

Ativar o editor matemático WIRIS. Ao instalar este plugin, você obtém o editor WIRIS e o WIRIS CAS.<br/>Esta ativação não é totalmente realizada a menos que o <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP para CKeditor WIRIS</a> tenha sido baixado previamente e seu conteúdo descompactado no diretório do Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Isso é necessário porque o Wiris é software proprietário e seus serviços são <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciais</a>. Para ajustar o plugin, edite o arquivo configuration.ini ou substitua seu conteúdo pelo arquivo configuration.ini.default fornecido com o Chamilo.

### `force_wiki_paste_as_plain_text`

**Forçar colar como texto simples no wiki**

Isso impedirá que muitas tags ocultas, incorretas ou não padronizadas, copiadas de outros textos, corrompam o texto do Wiki após muitos problemas; porém, alguns recursos serão perdidos durante a edição.

### `full_editor_toolbar_set`

**Barra de ferramentas completa do editor WYSIWYG**

Exibir a barra de ferramentas completa em todas as caixas do editor WYSIWYG da plataforma.

*Padrão: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier no Wiki**

Ativar o HTML purifier na ferramenta wiki (aumentará a segurança, mas reduzirá os recursos de estilo)

### `include_asciimathml_script`

**Carregar a biblioteca Mathjax em todas as páginas do sistema**

Ative esta configuração se quiser exibir fórmulas matemáticas baseadas em MathML e gráficos matemáticos baseados em ASCIIsvg não apenas na ferramenta 'Documentos', mas em outras partes do sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Ativar o editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botões estendida**

Habilita as barras de botões estendidas quando o editor WYSIWYG está maximizado

*Padrão: `true`*

### `save_titles_as_html`

**Salvar títulos como HTML**

Permite que os usuários incluam HTML nos campos de título em vários lugares. Isso possibilita algum estilo nos títulos, notadamente nas perguntas de testes. Também permite que esses campos de título específicos usem a mesma marcação por idioma que `translate_html` abaixo, o que títulos em texto simples não conseguem conter.

*Padrão: `false`*

### `translate_html`

**Suporte a conteúdo HTML multilíngue**

Se habilitada, esta opção permite que os usuários usem um atributo ‘lang’ em elementos HTML para definir o idioma em que o conteúdo daquele elemento está escrito. Habilite vários elementos com atributos ‘lang’ diferentes e o Chamilo exibirá o conteúdo apenas no idioma do usuário.

*Padrão: `false`*

Consulte [Conteúdo multilíngue](../../teacher-guide/adding-content/multi-language-content.md) no Guia do Professor para o passo a passo completo desta funcionalidade voltado ao professor.


### `video_context_menu_hidden`

**Ocultar o menu de contexto no reprodutor de vídeo**

Quando habilitada, o menu de contexto do botão direito nos reprodutores de vídeo HTML5 é desabilitado.

*Padrão: `false`*


### `video_player_renderers`

**Renderizadores do reprodutor de vídeo**

Habilita renderizadores do reprodutor para mídias do YouTube, Vimeo, Facebook, DailyMotion e Twitch

### `youtube_for_students`

**Permitir que os alunos insiram vídeos do YouTube**

Habilita a possibilidade de os alunos inserirem vídeos do Youtube