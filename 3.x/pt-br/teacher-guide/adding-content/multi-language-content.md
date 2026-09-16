# Conteúdo em Vários Idiomas

O Chamilo permite escrever **várias versões linguísticas do mesmo conteúdo em um único campo** — uma seção da descrição do curso, um documento, uma pergunta de teste, uma pesquisa — e faz com que cada aluno veja automaticamente apenas a versão escrita no seu próprio idioma. Este é o recurso **translate_html**, nomeado a partir da configuração da plataforma que o controla.

Envolve três pessoas diferentes, cada uma vendo um lado distinto:

* **O administrador** precisa ativar o recurso em toda a plataforma antes que alguém possa usá-lo.
* **Você (o professor)** escreve as diferentes versões linguísticas, usando um botão no editor de texto rico.
* **O aluno** se beneficia sem nunca saber que o recurso existe — simplesmente vê o conteúdo no próprio idioma, sem nenhuma configuração para localizar ou alternar.

## Ativando o Recurso

Esta é uma tarefa do administrador, não do professor. Em **Administração > Configurações da plataforma > Editor**, a configuração **Suporte a conteúdo HTML multilíngue** (`translate_html`) deve estar ativada. Se você não vir o botão **Lang ISO** descrito abaixo na barra de ferramentas do editor, esta é quase certamente a razão — peça ao administrador. Consulte [Configurações do Editor](../../admin-guide/platform-settings/editor-settings.md) para a referência completa das configurações. A partir da v3.0.0, esta configuração vem ativada por padrão (não era o caso antes desta versão), a menos que você tenha atualizado a partir de uma versão anterior em que a configuração estava desativada.

Desativar esta configuração novamente não exclui nem corrompe nenhum conteúdo já escrito dessa forma — veja [O Que os Alunos Veem](#what-learners-see) abaixo.

## Escrevendo Conteúdo em Vários Idiomas

O recurso está disponível em qualquer lugar em que você tenha o editor de texto rico completo: seções da [descrição do curso](../creating-your-course/course-description.md), [documentos](documents.md), perguntas de testes e pesquisas, e mais.

1. Escreva (ou cole) o conteúdo no seu idioma padrão, normalmente.
2. Selecione esse texto e clique no botão **Lang ISO** na barra de ferramentas do editor.

![A barra de ferramentas do editor de texto rico, com o botão "Lang ISO" visível próximo ao início](/.gitbook/assets/teacher-multilang-editor.png)

3. No menu, escolha o idioma em que você acabou de escrever — a lista cobre todos os idiomas ativos na sua plataforma. Se o que você precisa não estiver listado, use **Custom Chamilo ISO code...** no final e digite-o (por exemplo, `en_US`, `fr_FR`, `es`).

![O menu "Lang ISO" aberto, listando todos os idiomas ativos da plataforma, além de "Add translation to..." e uma opção de código personalizado](/.gitbook/assets/teacher-multilang-lang-menu.png)

4. O Chamilo envolve a seleção com essa tag de idioma. Agora escreva (ou cole) a versão do próximo idioma logo em seguida, selecione-a e repita com um idioma diferente.

Continue para quantos idiomas quiser cobrir. Todos eles ficam no mesmo campo — enquanto você edita, verá todas as versões linguísticas empilhadas uma após a outra; somente quando alguém *visualiza* a página o Chamilo oculta tudo, exceto o idioma que se aplica a essa pessoa (veja abaixo).

### Tradução Assistida por IA

Se o administrador tiver configurado um provedor de texto por IA, o mesmo menu **Lang ISO** também oferece **Add translation to...** no topo. Isso envia o conteúdo existente ao modelo de IA configurado e insere um novo bloco traduzido automaticamente no idioma que você escolher (ou em todos os idiomas restantes de uma vez, se a plataforma permitir) — você não precisa escrevê-lo. Os blocos de idioma existentes permanecem intactos, e os idiomas já presentes são excluídos da lista, de modo que o uso repetido não cria duplicatas.

Como em qualquer conteúdo gerado por IA, revise o resultado — é uma forma rápida de obter um primeiro rascunho sólido em um idioma que você talvez não fale, não um substituto da revisão.

## O Que os Alunos Veem

Cada aluno vê exatamente uma versão linguística: o Chamilo tenta primeiro o idioma da interface do aluno; se nenhum dos seus blocos corresponder, recorre ao idioma do próprio curso e, em seguida, ao idioma padrão da plataforma; se nenhum desses corresponder, mostra o idioma que você tiver escrito primeiro, em vez de deixar o conteúdo em branco. Tudo isso ocorre automaticamente — não há nada para o aluno configurar, nem nada para você configurar por aluno.

Aqui está a mesma seção da descrição do curso, vista por três alunos com idiomas de interface diferentes — nada mais no curso mudou entre estas três capturas de tela, apenas o idioma do visualizador:

![A mesma seção da descrição do curso vista por um aluno com inglês como idioma da interface](/.gitbook/assets/teacher-multilang-en.png)

![A mesma seção vista por um aluno com francês como idioma da interface](/.gitbook/assets/teacher-multilang-fr.png)

![A mesma seção vista por um aluno com espanhol como idioma da interface](/.gitbook/assets/teacher-multilang-es.png)

### Por Dentro

Se você abrir a visualização de **Código-fonte** de um campo multilíngue (o botão `<>` na barra de ferramentas do editor), verá cada versão de idioma encapsulada assim:

![A visualização de Código-fonte, mostrando um bloco que se abre com lang="en_US" class="mce-translatehtml"](/.gitbook/assets/teacher-multilang-source-view.png)

Cada versão é encapsulada em um `<div class="mce-translatehtml" lang="...">` (ou `<span>`, para uma frase curta em linha em vez de um bloco inteiro) — esse atributo `lang` é o que o Chamilo compara com o idioma do visualizador para decidir o que exibir. Vale reconhecer esse nome de classe específico se você estiver inspecionando o código-fonte da página ou solucionando conteúdo que parece incorreto: **`mce-translatehtml`** é o marcador a procurar.

Isso também explica por que desativar `translate_html` nas configurações da plataforma não quebra nada já escrito: a configuração controla apenas se o botão de *autoria* **Lang ISO** aparece no editor. A filtragem do *lado da exibição* descrita acima é executada incondicionalmente, de modo que o conteúdo multilíngue escrito anteriormente continua filtrado corretamente para cada visualizador, mesmo em uma plataforma em que um administrador tenha desativado o botão de autoria.

## Títulos Não Funcionam Dessa Forma

O título de um curso, o título de um documento, o título de um teste — esses são campos de texto simples, não texto rico, portanto não podem conter a marcação com tags `lang` descrita acima. Eles permanecem como um único valor neutro, independentemente de quem os esteja visualizando, não importa quantas versões de idioma você tenha escrito no conteúdo abaixo.

A única exceção: se o administrador tiver habilitado **Salvar títulos como HTML** (`save_titles_as_html`, também em **Administração > Configurações de configuração > Editor**) para o campo de título específico com o qual você está trabalhando, esse campo também se torna um campo HTML real, e a mesma técnica **Lang ISO** descrita acima pode ser aplicada a ele. Isso é incomum e usado principalmente para perguntas de teste — a maioria dos títulos na plataforma permanece texto simples.

## Dicas

* **Mantenha o idioma de origem primeiro** — coloque o idioma mais comum da sua plataforma primeiro no campo; é o fallback mais natural se você esquecer de marcar um idioma mais raro depois.
* **Não aninhe blocos de idioma** — escreva cada versão como um bloco separado e sequencial; encapsular um dentro de outro não é suportado e o editor desfaz ativamente os marcadores aninhados quando você insere um novo.
* **Uma seção que parece vazia em um idioma** geralmente significa que nenhum bloco foi marcado para ele (ou para o fallback expandido do curso/padrão da plataforma) — verifique a visualização de Código-fonte para os idiomas realmente presentes.