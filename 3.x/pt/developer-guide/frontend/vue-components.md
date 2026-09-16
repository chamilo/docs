# Componentes Vue

O Chamilo possui um conjunto alargado de componentes Vue organizados por área funcional em `assets/vue/components/`.

## Componentes Base

A família `Base*` em `assets/vue/components/basecomponents/` envolve primitivas do PrimeVue com predefinições específicas do Chamilo (layout FloatLabel, ícones MDI via `chamiloIconToClass`, mensagens de validação consistentes, dimensionamento Tailwind). Recorra sempre a um componente `Base*` antes de importar o correspondente do PrimeVue — é assim que a IU se mantém consistente em toda a SPA e que as alterações de design podem ser aplicadas a partir de um único ponto.

Os componentes **não** são registados globalmente (a única primitiva PrimeVue registada globalmente é `Column`, utilizada dentro de `BaseTable`). Importe cada um explicitamente:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Campos de formulário

A maioria aceita o valor através de `v-model`, expõe as props `id` + `label` para acessibilidade/associação de rótulo flutuante e apresenta a validação através do par `isInvalid` / `errorText` (ou `messageText`).

| Componente                       | Envolve                                              | Finalidade                                                                                                                                                                                         |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Campo de texto de uma linha. Alterna para um rótulo estático em entradas `date`/`time`/`datetime-local` (em que o rótulo flutuante sobreporia o placeholder nativo).                               |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptador Vuelidate leve: encaminha `$error` para `isInvalid` e renderiza `$errors[].$message` no slot `errors`. Associe-o a um objeto de campo Vuelidate.                                         |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Campo de texto de várias linhas.                                                                                                                                                                   |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | O mesmo padrão de adaptador Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                            |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Campo numérico com `min` / `max` / `step` e botões de incremento.                                                                                                                                  |
| `BaseInputTags.vue`              | (personalizado)                                      | Chips de etiquetas de texto livre; as etiquetas são adicionadas com Enter/vírgula e removidas com Backspace.                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Campo de texto associado a um botão de ação (estilo pesquisa).                                                                                                                                     |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Caixa de seleção binária ou associada a um valor, com rótulo.                                                                                                                                      |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grupo de botões de opção controlado por um array `options: [{label, value}]`.                                                                                                                      |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Botão de dois estados (rótulos e ícones ligado / desligado) associado através de `v-model`.                                                                                                        |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Seletor de data / data-hora. Respeita `platform.timepicker_increment` e a localidade do utilizador através de `calendarLocales`.                                                                   |
| `BaseColorPicker.vue`            | nativo `<input type="color">` + `InputText`          | Seletor de cor com recurso a texto hexadecimal; usa `colorjs.io` para validar a introdução manual de hex.                                                                                          |
| `BaseRating.vue`                 | `Rating`                                             | Campo de classificação por estrelas.                                                                                                                                                               |
| `BaseFileUpload.vue`             | nativo `<input type="file">` + `BaseButton`          | Seletor de ficheiro único que aciona um botão no estilo de anexo.                                                                                                                                  |
| `BaseFileUploadMultiple.vue`     | nativo `<input type="file" multiple>` + `BaseButton` | Variante de vários ficheiros de `BaseFileUpload`.                                                                                                                                                  |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Carregador Uppy completo (câmara, áudio, editor de imagem, envio XHR) com localizações ligadas ao `appLocale` atual. Use-o para envios ricos com progresso; use `BaseFileUpload*` para anexos simples. |

### Seleção e preenchimento automático

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Lista pendente de escolha única com botão opcional de limpar.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Lista pendente de escolha múltipla que apresenta os itens selecionados como chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Lista pendente de escolha única com caixa de pesquisa integrada, deslocamento virtual opcional e modelo de opção em duas linhas (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Preenchimento automático assíncrono (mínimo de 3 caracteres). Suporta seleção única ou múltipla e um slot `chip` para personalizar os chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tabela paginada de pesquisa de utilizadores com seleção de linhas. Utilize-a quando uma funcionalidade precisar de um seletor de utilizadores no estilo de administração.                           |

### Botões e ações

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Botão padrão do Chamilo. Resolve ícones através de `chamiloIconToClass`, normaliza `type` para `severity`/`variant` do PrimeVue e renderiza um `BaseAppLink` interno quando é fornecido um `route` ou `toUrl` (para que o mesmo componente trate os casos de router-link, âncora e botão simples). Os valores aceites de `type` estão listados em `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Botão de divulgação que alterna um painel encaixado de «definições avançadas» através de `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Barra de ferramentas de ações com slots `start` / `end` (ou um único slot predefinido). `showTopBorder` opcional para estilo de separador.                                                                                                                                                                                                                                       |

### Exibição e dados

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tabela de dados padrão do Chamilo. Suporta modo no servidor (`lazy`), ordenação em várias colunas, filtro global, seleção de linhas e paginação. Passe as colunas como filhos `<Column>` (registados globalmente). |
| `BaseCard.vue`       | `Card`                      | Invólucro de cartão que reencaminha os slots `header`, `title`, `subtitle`, `footer` e o slot predefinido (conteúdo).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Predefinição de gráfico circular. Passe um objeto `data` compatível com Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip renderizado a partir de um objeto `{value, labelField, imageField}`, com botão de remoção opcional.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Etiqueta colorida. Mapeia o `warning` do Chamilo para o `warn` do PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Fila de avatares com contador de overflow (p. ex. "+3"); controlada por `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar de utilizador com imagem de recurso, estado de carregamento e etiqueta acessível.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Renderizador de ícones do Chamilo. Adiciona um distintivo opcional (texto ou ícone), tooltip e modificador de tamanho. Passe sempre um nome semântico do Chamilo (p. ex. `"edit"`), não uma classe MDI em bruto.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Campo de pesquisa com ícone de lupa à esquerda.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Divisor horizontal ou vertical, com título e alinhamento opcionais.                                                                                                                              |

### Navegação e menus

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup que interpreta rotas do router nos itens de `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Acionador de menu pendente leve, com coordenação de abertura única (abrir um fecha os outros).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menu de contexto por clique direito / posicionado, controlado por `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu de navegação em acordeão usado nas barras laterais; segue automaticamente as chaves expandidas a partir do modelo.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Barra de separadores em que cada separador é uma ligação do router. O separador ativo é destacado automaticamente com base na rota atual.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Ligação inteligente: renderiza um `<a>` quando `url` está definido (externo/legado); caso contrário, um `<RouterLink>` do Vue Router. Use-o em vez de qualquer um dos primitivos para que as ligações internas/externas permaneçam uniformes. |

### Diálogos

`BaseDialog` é a base; os restantes compõem-se sobre ele para os fluxos comuns de confirmar/cancelar e eliminar.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Diálogo modal com cabeçalho titulado (`headerIcon` opcional) e corpo/rodapé em slots. O estado aberto é um `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmar/cancelar com dois botões. `type` (severidade) e `icon` de confirmação configuráveis; emite `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal pré-construído «Tem a certeza de que pretende eliminar este item?» com botão de confirmação no estilo de perigo.                                   |

### Editor e conteúdo rico

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Editor de texto rico com `FloatLabel`, acompanhamento de foco/estado vazio e integração com o contexto do curso atual (`cidReq`). Utilize-o para qualquer campo HTML da autoria do utilizador. |

### Auxiliares

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mapeia nomes semânticos de ícones (`edit`, `delete`, `eye-on`, `courses`, …) para classes CSS MDI. ~127 entradas. Consulte-os em `/admin/list-icons` numa instância em execução.                                                                                                  |
| `validators.js`   | Validadores de props partilhados: `iconValidator` (deve ser um nome de ícone Chamilo conhecido), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipos `BaseButton` permitidos). Importe-os ao definir novos componentes `Base*` que espelhem estas convenções. |

### Convenções nos componentes Base

* **v-model via `defineModel()`** — o valor (e frequentemente `isVisible`, `filters`, `selectedItems`) é exposto como modelo; passe-os com `v-model[:name]` em vez de `:prop` + `@update:prop`.
* **Rótulos flutuantes** — a maioria dos campos de formulário envolve o input em PrimeVue `FloatLabel variant="on"`. Forneça `label` (o texto apresentado) e `id` (usado para associar o `<label for>`).
* **Mensagens de validação** — os campos expõem `isInvalid` e uma mensagem pequena abaixo do input (`errorText`, `messageText` ou `smallText`, consoante o componente). Existem variantes conscientes do Vuelidate para os mais comuns.
* **Ícones** — passe nomes semânticos Chamilo, não classes MDI em bruto. Os componentes resolvem-nos através de `chamiloIconToClass`.
* **Dimensionamento** — `size="normal" | "small" | "large"` é a prop convencional de tamanho (ver `sizeValidator`).
* **Composição em vez de duplicação** — `BaseDialogDelete` envolve `BaseDialogConfirmCancel`, que envolve `BaseDialog`; `BaseToggleButton` e `BaseAdvancedSettingsButton` envolvem `BaseButton`. Quando precisar de uma variante recorrente de um componente existente, prefira compor um novo `Base*` por cima em vez de o reimplementar numa pasta de funcionalidade.

## Componentes de layout

Localizados em `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Layout principal: barra superior + barra lateral + área de conteúdo |
| `Sidebar.vue` | Painel de navegação esquerdo (recolhível) |
| `TopbarLoggedIn.vue` | Barra superior com logótipo, caixa de entrada e avatar |

## Componentes por Área Funcional

| Diretório | Componentes | Finalidade |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Listagem e gestão de cursos |
| `session/` | Session cards, catalog | Listagem de sessões |
| `assignments/` | Submission lists, grading modals, forms | Fluxo de trabalho de trabalhos |
| `chat/` | DockedChat, chat messages | Chat em tempo real e tutor de IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Navegador e gestão de ficheiros |
| `installer/` | Step1-Step7, EmailSettings | Assistente de instalação |
| `social/` | GroupInfoCard, social posts | Funcionalidades de rede social |
| `attendance/` | AttendanceTable | Controlo de assiduidade |
| `usergroup/` | GroupMembers | Gestão de grupos de utilizadores |

## Sistema de Ícones

Os ícones utilizam **Material Design Icons (MDI)** como única biblioteca de ícones: `<i class="mdi mdi-pencil"></i>`

O ficheiro `ChamiloIcons.js` fornece um mapeamento semântico:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Os componentes utilizam `BaseIcon` ou referenciam `chamiloIconToClass` para renderizar ícones de forma consistente.

Uma referência navegável de todos os ícones disponíveis na plataforma pode ser encontrada em `/admin/list-icons` em qualquer instância Chamilo em execução.

## Padrões de Componentes

* **Composition API** — Os componentes utilizam a sintaxe `<script setup>` do Vue 3
* **Integração PrimeVue** — Uso intensivo de componentes PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios para chamadas à API** — Pedidos HTTP à API do backend
* **Vue I18n** — Todo o texto visível ao utilizador utiliza chaves de tradução