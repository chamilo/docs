# Componentes Vue

O Chamilo possui um amplo conjunto de componentes Vue organizados por área funcional em `assets/vue/components/`.

## Componentes Base

A família `Base*` em `assets/vue/components/basecomponents/` encapsula primitivos do PrimeVue com padrões específicos do Chamilo (layout FloatLabel, ícones MDI via `chamiloIconToClass`, mensagens de validação consistentes, dimensionamento Tailwind). Sempre utilize um componente `Base*` antes de importar o primitivo PrimeVue subjacente — é assim que a interface permanece consistente em toda a SPA e como alterações de design podem ser aplicadas a partir de um único lugar.

Os componentes **não** são registrados globalmente (o único primitivo PrimeVue registrado globalmente é `Column`, usado dentro de `BaseTable`). Importe cada um explicitamente:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Campos de formulário

A maioria aceita o valor por meio de `v-model`, expõe as props `id` + `label` para acessibilidade/vinculação de rótulo flutuante e apresenta validação por meio do par `isInvalid` / `errorText` (ou `messageText`).

| Componente                       | Encapsula                                            | Finalidade                                                                                                                                                                                         |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Campo de texto de linha única. Alterna para um rótulo estático em entradas `date`/`time`/`datetime-local` (em que o rótulo flutuante sobreporia o placeholder nativo).                             |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptador fino do Vuelidate: encaminha `$error` para `isInvalid` e renderiza `$errors[].$message` no slot `errors`. Combine-o com um objeto de campo do Vuelidate.                                 |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Campo de texto de várias linhas.                                                                                                                                                                   |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | O mesmo padrão de adaptador Vuelidate de `BaseInputTextWithVuelidate`.                                                                                                                             |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Campo numérico com `min` / `max` / `step` e botões de incremento.                                                                                                                                  |
| `BaseInputTags.vue`              | (customizado)                                        | Chips de tags de texto livre; as tags são adicionadas com Enter/vírgula e removidas com Backspace.                                                                                                 |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Campo de texto associado a um botão de ação (estilo busca).                                                                                                                                        |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Caixa de seleção binária ou vinculada a um valor, com rótulo.                                                                                                                                      |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grupo de botões de rádio controlado por um array `options: [{label, value}]`.                                                                                                                      |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Botão de dois estados (rótulos e ícones ligado / desligado) vinculado por `v-model`.                                                                                                               |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Seletor de data / data-hora. Respeita `platform.timepicker_increment` e o locale do usuário via `calendarLocales`.                                                                                 |
| `BaseColorPicker.vue`            | nativo `<input type="color">` + `InputText`          | Seletor de cor com fallback de texto hexadecimal; usa `colorjs.io` para validar a entrada hexadecimal manual.                                                                                      |
| `BaseRating.vue`                 | `Rating`                                             | Campo de avaliação por estrelas.                                                                                                                                                                   |
| `BaseFileUpload.vue`             | nativo `<input type="file">` + `BaseButton`          | Seletor de arquivo único que aciona um botão no estilo de anexo.                                                                                                                                   |
| `BaseFileUploadMultiple.vue`     | nativo `<input type="file" multiple>` + `BaseButton` | Variante de vários arquivos de `BaseFileUpload`.                                                                                                                                                   |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Uploader completo do Uppy (webcam, áudio, editor de imagem, upload XHR) com locales ligados ao `appLocale` atual. Use-o para uploads ricos com progresso; use `BaseFileUpload*` para anexos simples. |

### Seleção e autocompletar

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Lista suspensa de escolha única com botão opcional de limpar.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Lista suspensa de múltipla escolha que exibe os itens selecionados como chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Lista suspensa de escolha única com caixa de busca integrada, rolagem virtual opcional e modelo de opção em duas linhas (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocompletar assíncrono (mínimo de 3 caracteres). Suporta seleção única ou múltipla e um slot `chip` para personalizar os chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tabela paginada de busca de usuários com seleção de linhas. Use-a quando um recurso precisar de um seletor de usuários no estilo administrativo.                           |

### Botões e ações

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Botão padrão do Chamilo. Resolve ícones por meio de `chamiloIconToClass`, normaliza `type` para `severity`/`variant` do PrimeVue e renderiza um `BaseAppLink` interno quando um `route` ou `toUrl` é informado (assim o mesmo componente trata os casos de router-link, âncora e botão simples). Os valores aceitos de `type` estão listados em `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Botão de divulgação que alterna um painel encaixado de "configurações avançadas" via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Barra de ferramentas de ações com slots `start` / `end` (ou um único slot padrão). `showTopBorder` opcional para estilo de separador.                                                                                                                                                                                                                                       |

### Exibição e dados

| Componente           | Encapsula                   | Finalidade                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tabela de dados padrão do Chamilo. Suporta modo no servidor (`lazy`), ordenação em várias colunas, filtro global, seleção de linhas e paginação. Passe as colunas como filhos `<Column>` (registrados globalmente). |
| `BaseCard.vue`       | `Card`                      | Invólucro de cartão que encaminha os slots `header`, `title`, `subtitle`, `footer` e o slot padrão (conteúdo).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Predefinição de gráfico de pizza. Passe um objeto `data` compatível com Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip renderizado a partir de um objeto `{value, labelField, imageField}`, com botão opcional de remoção.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Etiqueta colorida. Mapeia o `warning` do Chamilo para o `warn` do PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Linha de avatares com contador de overflow (p. ex. "+3"); controlada por `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar de usuário com fallback de imagem, estado de carregamento e rótulo acessível.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Renderizador de ícones do Chamilo. Adiciona um distintivo opcional (texto ou ícone), dica de ferramenta e modificador de tamanho. Sempre passe um nome semântico do Chamilo (p. ex. `"edit"`), não uma classe MDI bruta.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Campo de busca com ícone de lupa à esquerda.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Divisor horizontal ou vertical, com título e alinhamento opcionais.                                                                                                                              |

### Navegação e menus

| Componente                 | Encapsula               | Finalidade                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup que interpreta rotas do roteador nos itens de `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Acionador de dropdown leve com coordenação de abertura única (abrir um fecha os demais).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menu de contexto por clique direito / posicionado, controlado por `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu de navegação em estilo acordeão usado em barras laterais; rastreia automaticamente as chaves expandidas a partir do modelo.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Barra de abas em que cada aba é um link do roteador. A aba ativa é destacada automaticamente com base na rota atual.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Link inteligente: renderiza um `<a>` quando `url` está definido (externo/legado); caso contrário, um `<RouterLink>` do Vue Router. Use-o no lugar de qualquer um dos primitivos para que os links internos/externos permaneçam uniformes. |

### Diálogos

`BaseDialog` é a base; os demais se compõem sobre ele para os fluxos comuns de confirmar/cancelar e excluir.

| Componente                    | Envolve                   | Finalidade                                                                                                                          |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Diálogo modal com cabeçalho titulado (`headerIcon` opcional) e corpo/rodapé via slots. O estado aberto é um `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmar/cancelar com dois botões. `type` (severidade) e `icon` de confirmação configuráveis; emite `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal pré-construído "Tem certeza de que deseja excluir este item?" com botão de confirmação no estilo de perigo.                   |

### Editor e conteúdo rico

| Componente           | Envolve                                         | Finalidade                                                                                                                                                           |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via o `components/Editor` do projeto)  | Editor de texto rico com `FloatLabel`, rastreamento de foco/estado vazio e integração com o contexto do curso atual (`cidReq`). Use-o para qualquer campo HTML de autoria do usuário. |

### Auxiliares

| Arquivo           | Finalidade                                                                                                                                                                                                                                                       |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mapeia nomes semânticos de ícones (`edit`, `delete`, `eye-on`, `courses`, …) para classes CSS do MDI. ~127 entradas. Navegue-as em `/admin/list-icons` em uma instância em execução.                                                                              |
| `validators.js`   | Validadores de props compartilhados: `iconValidator` (deve ser um nome de ícone Chamilo conhecido), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipos permitidos de `BaseButton`). Importe-os ao definir novos componentes `Base*` que espelhem essas convenções. |

### Convenções entre os componentes Base

* **v-model via `defineModel()`** — o valor (e frequentemente `isVisible`, `filters`, `selectedItems`) é exposto como modelo; passe-os com `v-model[:name]` em vez de `:prop` + `@update:prop`.
* **Rótulos flutuantes** — a maioria dos campos de formulário envolve o input em `FloatLabel variant="on"` do PrimeVue. Forneça `label` (o texto exibido) e `id` (usado para vincular o `<label for>`).
* **Mensagens de validação** — os campos expõem `isInvalid` e uma mensagem pequena abaixo do input (`errorText`, `messageText` ou `smallText`, conforme o componente). Existem variantes conscientes do Vuelidate para os mais comuns.
* **Ícones** — passe nomes semânticos do Chamilo, não classes MDI brutas. Os componentes os resolvem por meio de `chamiloIconToClass`.
* **Dimensionamento** — `size="normal" | "small" | "large"` é a prop convencional de tamanho (veja `sizeValidator`).
* **Composição em vez de duplicação** — `BaseDialogDelete` envolve `BaseDialogConfirmCancel`, que envolve `BaseDialog`; `BaseToggleButton` e `BaseAdvancedSettingsButton` envolvem `BaseButton`. Quando precisar de uma variante recorrente de um componente existente, prefira compor um novo `Base*` por cima em vez de reimplementá-lo em uma pasta de funcionalidade.

## Componentes de layout

Localizados em `components/layout/`:

| Componente | Finalidade |
|-----------|---------|
| `DashboardLayout.vue` | Layout principal: barra superior + barra lateral + área de conteúdo |
| `Sidebar.vue` | Painel de navegação esquerdo (recolhível) |
| `TopbarLoggedIn.vue` | Barra superior com logotipo, caixa de entrada e avatar |

## Componentes por Área Funcional

| Diretório | Componentes | Finalidade |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Listagem e gestão de cursos |
| `session/` | Session cards, catalog | Listagem de sessões |
| `assignments/` | Submission lists, grading modals, forms | Fluxo de trabalho de tarefas |
| `chat/` | DockedChat, chat messages | Chat em tempo real e tutor de IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Navegador e gestão de arquivos |
| `installer/` | Step1-Step7, EmailSettings | Assistente de instalação |
| `social/` | GroupInfoCard, social posts | Recursos de rede social |
| `attendance/` | AttendanceTable | Controle de frequência |
| `usergroup/` | GroupMembers | Gestão de grupos de usuários |

## Sistema de Ícones

Os ícones utilizam **Material Design Icons (MDI)** como única biblioteca de ícones: `<i class="mdi mdi-pencil"></i>`

O arquivo `ChamiloIcons.js` fornece um mapeamento semântico:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Os componentes usam `BaseIcon` ou referenciam `chamiloIconToClass` para renderizar ícones de forma consistente.

Uma referência navegável de todos os ícones disponíveis na plataforma pode ser encontrada em `/admin/list-icons` em qualquer instância do Chamilo em execução.

## Padrões de Componentes

* **Composition API** — Os componentes usam a sintaxe `<script setup>` do Vue 3
* **Integração com PrimeVue** — Uso intensivo de componentes PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios para chamadas de API** — Requisições HTTP para a API do backend
* **Vue I18n** — Todo o texto visível ao usuário utiliza chaves de tradução