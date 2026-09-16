# Conteúdo Multilíngue

O Chamilo permite-lhe escrever **várias versões linguísticas do mesmo conteúdo num único campo** — uma secção da descrição do curso, um documento, uma pergunta de teste, um inquérito — e que cada formando veja automaticamente apenas a versão escrita na sua própria língua. Esta é a funcionalidade **translate_html**, assim designada devido à definição da plataforma que a governa.

Envolve três pessoas diferentes, cada uma a ver um lado distinto:

* **O seu administrador** tem de ativar a funcionalidade em toda a plataforma antes de alguém a poder utilizar.
* **Você (o professor)** escreve as diferentes versões linguísticas, utilizando um botão no editor de texto rico.
* **O formando** beneficia dela sem sequer saber que existe — vê simplesmente o conteúdo na sua própria língua, sem qualquer definição a encontrar ou a ativar.

## Ativar a Funcionalidade

Esta é uma tarefa de administrador, não de professor. Em **Administração > Definições de configuração > Editor**, a definição **Support multi-language HTML content** (`translate_html`) tem de estar ativada. Se não vir o botão **Lang ISO** descrito abaixo na barra de ferramentas do editor, é quase certamente por esta razão — peça ao seu administrador. Consulte [Definições do Editor](../../admin-guide/platform-settings/editor-settings.md) para a referência completa das definições. A partir da v3.0.0, esta definição está ativada por predefinição (não era o caso antes desta versão), a menos que tenha atualizado a partir de uma versão anterior em que a definição estava desativada.

Desativar novamente esta definição não elimina nem corrompe qualquer conteúdo já escrito desta forma — consulte [O Que os Formandos Veem](#what-learners-see) abaixo.

## Escrever Conteúdo Multilíngue

A funcionalidade está disponível em qualquer sítio onde tenha o editor de texto rico completo: secções da [descrição do curso](../creating-your-course/course-description.md), [documentos](documents.md), perguntas de testes e inquéritos, e mais.

1. Escreva (ou cole) o conteúdo na sua língua predefinida, como habitualmente.
2. Selecione esse texto e, em seguida, clique no botão **Lang ISO** na barra de ferramentas do editor.

![A barra de ferramentas do editor de texto rico, com o botão "Lang ISO" visível perto do início](/.gitbook/assets/teacher-multilang-editor.png)

3. No menu, escolha a língua em que acabou de escrever — a lista cobre todas as línguas ativas na sua plataforma. Se a que precisa não estiver listada, use **Custom Chamilo ISO code...** no fundo e escreva-o (p. ex. `en_US`, `fr_FR`, `es`).

![O menu "Lang ISO" aberto, listando todas as línguas ativas da plataforma mais "Add translation to..." e uma opção de código personalizado](/.gitbook/assets/teacher-multilang-lang-menu.png)

4. O Chamilo envolve a sua seleção com essa etiqueta de língua. Agora escreva (ou cole) a versão da língua seguinte imediatamente a seguir, selecione-a e repita com uma língua diferente.

Continue para tantas línguas quantas quiser cobrir. Todas vivem no mesmo campo — enquanto edita, verá todas as versões linguísticas empilhadas uma após a outra; só quando alguém *visualiza* efetivamente a página é que o Chamilo oculta tudo exceto a língua que se aplica a essa pessoa (ver abaixo).

### Tradução Assistida por IA

Se o seu administrador tiver configurado um fornecedor de texto de IA, o mesmo menu **Lang ISO** também oferece **Add translation to...** no topo. Isto envia o seu conteúdo existente para o modelo de IA configurado e insere um novo bloco traduzido automaticamente na língua que escolher (ou em todas as línguas restantes de uma vez, se a sua plataforma o permitir) — não tem de o escrever você mesmo. Os blocos de língua existentes ficam intactos, e as línguas já presentes são excluídas da lista, pelo que usá-lo repetidamente não criará duplicados.

Como em qualquer conteúdo gerado por IA, reveja o resultado — é uma forma rápida de obter um primeiro rascunho sólido numa língua que talvez não fale, não um substituto da revisão.

## O Que os Formandos Veem

Cada formando vê exatamente uma versão linguística: o Chamilo tenta primeiro a língua da interface do próprio formando; se nenhum dos seus blocos corresponder, recorre à língua do próprio curso, depois à língua predefinida da plataforma; se nenhuma destas corresponder também, mostra a língua que por acaso tiver escrito primeiro, em vez de deixar o conteúdo em branco. Tudo isto acontece automaticamente — não há nada para o formando configurar, nem nada para si configurar por formando.

Eis a mesma secção da descrição do curso, vista por três formandos com línguas de interface diferentes — nada mais no curso mudou entre estes três ecrãs, apenas a língua do visualizador:

![A mesma secção da descrição do curso vista por um formando com inglês como língua de interface](/.gitbook/assets/teacher-multilang-en.png)

![A mesma secção vista por um formando com francês como língua de interface](/.gitbook/assets/teacher-multilang-fr.png)

![A mesma secção vista por um formando com espanhol como língua de interface](/.gitbook/assets/teacher-multilang-es.png)

### Por Dentro

Se alguma vez abrir a vista de **Código-fonte** de um campo multilíngue (o botão `<>` na barra de ferramentas do editor), verá cada versão linguística envolvida desta forma:

![A vista Código-fonte, mostrando um bloco que abre com lang="en_US" class="mce-translatehtml"](/.gitbook/assets/teacher-multilang-source-view.png)

Cada versão está envolvida num `<div class="mce-translatehtml" lang="...">` (ou `<span>`, para uma frase curta em linha em vez de um bloco inteiro) — esse atributo `lang` é o que o Chamilo compara com o idioma do visualizador para decidir o que mostrar. Vale a pena reconhecer este nome de classe específico se alguma vez inspecionar o código-fonte da página ou resolver problemas de conteúdo que pareça incorreto: **`mce-translatehtml`** é o marcador a procurar.

Isto também explica por que desativar `translate_html` nas definições da plataforma não quebra nada já escrito: a definição controla apenas se o botão de *autoria* **Lang ISO** aparece no editor. A filtragem do *lado da apresentação* descrita acima corre incondicionalmente, pelo que o conteúdo multilíngue previamente escrito continua corretamente filtrado para cada visualizador mesmo numa plataforma em que um administrador tenha entretanto desligado o botão de autoria.

## Os Títulos Não Funcionam Desta Forma

O título de um curso, o título de um documento, o título de um teste — estes são campos de texto simples, não texto rico, pelo que não podem conter a marcação etiquetada com `lang` descrita acima. Permanecem como um único valor neutro independentemente de quem os consulta, por mais versões linguísticas que tenha escrito no conteúdo por baixo.

A única exceção: se o seu administrador tiver ativado **Guardar títulos como HTML** (`save_titles_as_html`, também em **Administração > Definições de configuração > Editor**) para o campo de título específico com que está a trabalhar, esse campo torna-se também um campo HTML real, e a mesma técnica **Lang ISO** descrita acima pode ser-lhe aplicada. Isto é invulgar e usa-se sobretudo para perguntas de teste — a maioria dos títulos na plataforma permanece texto simples.

## Dicas

* **Mantenha o idioma de origem em primeiro lugar** — coloque o idioma mais comum da sua plataforma em primeiro no campo; é o recurso mais natural se se esquecer de etiquetar um idioma mais raro mais tarde.
* **Não aninhe blocos de idioma** — escreva cada versão como um bloco separado e sequencial; envolver um dentro de outro não é suportado e o editor desembrulha ativamente marcadores aninhados quando insere um novo.
* **Uma secção que parece vazia num idioma** significa normalmente que nunca foi etiquetado um bloco para esse idioma (ou o seu recurso expandido de curso/predefinição da plataforma) — verifique a vista Código-fonte para os idiomas efetivamente presentes.