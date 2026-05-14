# Configurações do Editor

Configuração do editor de texto rico (TinyMCE) utilizado em toda a plataforma — barras de ferramentas, plugins, assistentes de IA no editor.

Acesse essas configurações em **Administração > Configurações de configuração > Editor**. Esta categoria contém **26 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_email_editor`

**Editor de e-mail online ativado**

Se esta opção estiver ativada, clicar em um endereço de e-mail abrirá um editor online.

### `allow_spellcheck`

**Verificação ortográfica**

Ativar verificação ortográfica

### `block_copy_paste_for_students`

**Bloquear cópia e cola para alunos**

Bloquear a capacidade dos alunos de copiar e colar no editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedir cópia e cola de imagens no editor WYSIWYG**

Impedir o uso de cópia e cola de imagens como base64 no editor para evitar o preenchimento do banco de dados com imagens.

*Default: `false`*

### `editor_driver_list`

**Lista de drivers de arquivos WYSIWYG**

Array contendo os nomes dos drivers para acesso a arquivos a partir do editor WYSIWYG.

### `editor_settings`

**Configurações do editor WYSIWYG**

Array de configuração genérico para reconfigurar o editor WYSIWYG globalmente.

### `enable_iframe_inclusion`

**Permitir iframes no Editor HTML**

Permitir iframes arbitrários no Editor HTML aumentará as capacidades de edição dos usuários, mas pode representar um risco de segurança. Certifique-se de que pode confiar nos seus usuários (ou seja, sabe quem são) antes de ativar este recurso.

### `enable_uploadimage_editor`

**Permitir arrastar e soltar imagens no editor WYSIWYG**

Habilitar o upload de imagens como arquivo ao fazer uma cópia no conteúdo ou arrastar e soltar.

*Default: `false`*

### `enabled_asciisvg`

**Ativar AsciiSVG**

Ativar o plugin AsciiSVG no editor WYSIWYG para desenhar gráficos a partir de funções matemáticas.

### `enabled_googlemaps`

**Ativar Google Maps**

Ativar o botão para inserir Google Maps. A ativação não será totalmente realizada se o arquivo main/inc/lib/fckeditor/myconfig.php não tiver sido editado anteriormente e uma chave de API do Google Maps não tiver sido adicionada.

### `enabled_imgmap`

**Ativar mapas de imagem**

Ativar o botão para inserir mapas de imagem. Isso permite associar URLs a áreas de uma imagem, criando pontos de acesso.

### `enabled_insertHtml`

**Permitir inserção de widgets**

Isso permite incorporar nas suas páginas web seus vídeos e aplicativos favoritos, como Vimeo ou Slideshare, e todos os tipos de widgets e gadgets.

### `enabled_mathjax`

**Ativar MathJax**

Ativar a biblioteca MathJax para visualizar fórmulas matemáticas. Isso só é útil se as configurações ASCIIMathML ou ASCIISVG estiverem ativadas.

### `enabled_support_svg`

**Criar e editar arquivos SVG**

Esta opção permite criar e editar arquivos SVG (Scalable Vector Graphics) multilayer online, bem como exportá-los para imagens no formato PNG.

### `enabled_wiris`

**Editor matemático WIRIS**

Ativar o editor matemático WIRIS. Ao instalar este plugin, você obtém o editor WIRIS e o WIRIS CAS.<br/>Esta ativação não será totalmente realizada a menos que tenha sido previamente baixado o <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP para CKeditor WIRIS</a> e descompactado seu conteúdo no diretório do Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Isso é necessário porque o Wiris é um software proprietário e seus serviços são <a href='http://www.wiris.com/store/who-pays' target='_blank'>comerciais</a>. Para fazer ajustes no plugin, edite o arquivo configuration.ini ou substitua seu conteúdo pelo arquivo configuration.ini.default fornecido com o Chamilo.

### `force_wiki_paste_as_plain_text`

**Forçar colagem como texto simples no wiki**

Isso evitará muitas tags ocultas, incorretas ou não padrão, copiadas de outros textos, que podem corromper o texto do Wiki após vários problemas; mas perderá algumas funcionalidades durante a edição.

### `full_editor_toolbar_set`

**Barra de ferramentas completa do editor WYSIWYG**

Mostrar a barra de ferramentas completa em todas as caixas do editor WYSIWYG na plataforma.

*Default: `false`*

### `htmlpurifier_wiki`

**HTMLPurifier no Wiki**

Ativar o HTML Purifier na ferramenta wiki (aumentará a segurança, mas reduzirá os recursos de estilo)

### `include_asciimathml_script`

**Carregar a biblioteca MathJax em todas as páginas do sistema**

Ative esta configuração se desejar mostrar fórmulas matemáticas baseadas em MathML e gráficos matemáticos baseados em ASCIIsvg não apenas na ferramenta 'Documentos', mas em outros lugares do sistema.

### `math_asciimathML`

**Editor matemático ASCIIMathML**

Ativar o editor matemático ASCIIMathML

### `more_buttons_maximized_mode`

**Barra de botões estendida**

Ativar barras de botões estendidas quando o editor WYSIWYG estiver maximizado

*Default: `true`*

---
### `save_titles_as_html`

**Salvar títulos como HTML**

Permite que os usuários incluam HTML em campos de título em vários lugares. Isso possibilita alguma estilização de títulos, especialmente em perguntas de testes.

*Padrão: `false`*

### `translate_html`

**Suporte a conteúdo HTML multilíngue**

Se ativada, esta opção permite que os usuários utilizem um atributo 'lang' em elementos HTML para definir o idioma em que o conteúdo desse elemento está escrito. Habilite múltiplos elementos com diferentes atributos 'lang' e o Chamilo exibirá o conteúdo apenas no idioma do usuário.

*Padrão: `false`*

### `video_context_menu_hidden`

**Ocultar o menu de contexto no reprodutor de vídeo**

Quando ativado, o menu de contexto ao clicar com o botão direito em reprodutores de vídeo HTML5 é desabilitado.

*Padrão: `false`*

### `video_player_renderers`

**Renderizadores de reprodutor de vídeo**

Habilita renderizadores de reprodutor para mídias do YouTube, Vimeo, Facebook, DailyMotion e Twitch.

### `youtube_for_students`

**Permitir que alunos insiram vídeos do YouTube**

Habilita a possibilidade de os alunos inserirem vídeos do YouTube.