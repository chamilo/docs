# Configurações do editor

Configuração do editor de texto rico (TinyMCE) utilizado em toda a plataforma — barras de ferramentas, plugins e assistentes de IA no editor.

Aceda a estas definições em **Administração > Configurações > Editor**. Esta categoria contém **26 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_email_editor`

**Editor de e-mail em linha ativado**

Se esta opção estiver ativada, clicar num endereço de e-mail abrirá um editor em linha.

### `allow_spellcheck`

**Verificação ortográfica**

Ativar a verificação ortográfica

### `block_copy_paste_for_students`

**Bloquear copiar e colar para os alunos**

Impedir que os alunos copiem e colem no editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedir copiar e colar imagens no editor WYSIWYG**

Impedir o uso de copiar e colar imagens como base64 no editor, para evitar preencher a base de dados com imagens.

*Predefinição: `false`*


### `editor_driver_list`

**Lista de controladores de ficheiros WYSIWYG**

Array contendo os nomes dos controladores para acesso a ficheiros a partir do editor WYSIWYG.

### `editor_settings`

**Definições do editor WYSIWYG**

Array de configuração genérico para reconfigurar o editor WYSIWYG de forma global.

### `enable_iframe_inclusion`

**Permitir iframes no editor HTML**

Permitir iframes arbitrários no editor HTML aumentará as capacidades de edição dos utilizadores, mas pode representar um risco de segurança. Certifique-se de que pode confiar nos seus utilizadores (ou seja, de que sabe quem são) antes de ativar esta funcionalidade.

### `enable_uploadimage_editor`

**Permitir arrastar e largar imagens no editor WYSIWYG**

Ativar o carregamento de imagens como ficheiro ao copiar conteúdo ou ao arrastar e largar.

*Predefinição: `false`*


### `enabled_asciisvg`

**Ativar AsciiSVG**

Ativar o plugin AsciiSVG no editor WYSIWYG para desenhar gráficos a partir de funções matemáticas.

### `enabled_googlemaps`

**Ativar Google maps**

Ativar o botão para inserir Google maps. A ativação não fica completa se não tiver sido previamente editado o ficheiro main/inc/lib/fckeditor/myconfig.php e adicionada uma chave de API do Google maps.

### `enabled_imgmap`

**Ativar mapas de imagem**

Ativar o botão para inserir mapas de imagem. Isto permite associar URLs a áreas de uma imagem, criando hotspots.

### `enabled_insertHtml`

**Permitir inserção de widgets**

Isto permite incorporar nas suas páginas web os seus vídeos e aplicações favoritos, como vimeo ou slideshare, e todo o tipo de widgets e gadgets

### `enabled_mathjax`

**Ativar MathJax**

Ativar a biblioteca MathJax para visualizar fórmulas matemáticas. Isto adiciona um botão de fórmula à barra de ferramentas do editor, onde as fórmulas são escritas em LaTeX. Consulte [Fórmulas matemáticas](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Criar e editar ficheiros SVG**

Esta opção permite criar e editar SVG (Scalable Vector Graphics) em várias camadas em linha, bem como exportá-los para imagens no formato png.

### `enabled_wiris`

**Editor matemático WIRIS**

Ativar o editor matemático WIRIS. Ao instalar este plugin obtém o editor WIRIS e o WIRIS CAS.<br/>Esta ativação não fica completa a menos que tenha sido previamente descarregado o <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP para CKeditor WIRIS</a> e descompactado o seu conteúdo no diretório do Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Isto é necessário porque o Wiris é software proprietário e os seus serviços são <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciais</a>. Para ajustar o plugin, edite o ficheiro configuration.ini ou substitua o seu conteúdo pelo ficheiro configuration.ini.default fornecido com o Chamilo.

### `force_wiki_paste_as_plain_text`

**Forçar colar como texto simples no wiki**

Isto impedirá que muitas etiquetas ocultas, incorretas ou não standard, copiadas de outros textos, corrompam o texto do Wiki após muitos problemas; no entanto, perder-se-ão algumas funcionalidades durante a edição.

### `full_editor_toolbar_set`

**Barra de ferramentas completa do editor WYSIWYG**

Mostrar a barra de ferramentas completa em todas as caixas do editor WYSIWYG na plataforma.

*Predefinição: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier no Wiki**

Ativar o HTML purifier na ferramenta wiki (aumentará a segurança, mas reduzirá as funcionalidades de estilo)

### `include_asciimathml_script`

**Carregar a biblioteca Mathjax em todas as páginas do sistema**

Ative esta definição se pretender mostrar fórmulas matemáticas baseadas em MathML e gráficos matemáticos baseados em ASCIIsvg não só na ferramenta «Documentos», mas também noutros locais do sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Ativar o editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botões alargada**

Ativar as barras de botões alargadas quando o editor WYSIWYG está maximizado

*Predefinição: `true`*

### `save_titles_as_html`

**Guardar títulos como HTML**

Permitir que os utilizadores incluam HTML nos campos de título em vários locais. Isto permite algum estilo nos títulos, nomeadamente nas perguntas de testes. Também permite que esses campos de título específicos utilizem a mesma marcação por idioma que `translate_html` abaixo, o que os títulos em texto simples de outro modo não conseguem conter.

*Predefinição: `false`*

### `translate_html`

**Suporte a conteúdo HTML multilíngue**

Se estiver ativada, esta opção permite que os utilizadores usem um atributo ‘lang’ em elementos HTML para definir o idioma em que o conteúdo desse elemento está escrito. Ative vários elementos com atributos ‘lang’ diferentes e o Chamilo apresentará o conteúdo apenas no idioma do utilizador.

*Predefinição: `false`*

Consulte [Conteúdo multilíngue](../../teacher-guide/adding-content/multi-language-content.md) no Guia do Professor para o percurso completo desta funcionalidade, orientado para o professor.


### `video_context_menu_hidden`

**Ocultar o menu de contexto no leitor de vídeo**

Quando ativada, o menu de contexto do botão direito nos leitores de vídeo HTML5 é desativado.

*Predefinição: `false`*


### `video_player_renderers`

**Renderizadores do leitor de vídeo**

Ativar renderizadores do leitor para conteúdos YouTube, Vimeo, Facebook, DailyMotion e Twitch

### `youtube_for_students`

**Permitir que os formandos insiram vídeos do YouTube**

Ativar a possibilidade de os formandos inserirem vídeos do Youtube