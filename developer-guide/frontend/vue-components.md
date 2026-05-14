# Componentes Vue

O Chamilo possui um amplo conjunto de componentes Vue organizados por área de funcionalidade em `assets/vue/components/`.

## Componentes Base

A família `Base*` em `assets/vue/components/basecomponents/` encapsula os primitivos do PrimeVue com padrões específicos do Chamilo (layout FloatLabel, ícones MDI via `chamiloIconToClass`, mensagens de validação consistentes, dimensionamento Tailwind). Sempre opte por um componente `Base*` antes de importar o componente subjacente do PrimeVue — é assim que a interface do usuário permanece consistente em toda a SPA e como mudanças de design podem ser implementadas a partir de um único local.

Os componentes **não** são registrados globalmente (o único primitivo do PrimeVue registrado globalmente é `Column`, usado dentro de `BaseTable`). Importe cada um explicitamente:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Campos de formulário

A maioria aceita o valor através de `v-model`, expõe as propriedades `id` + `label` para acessibilidade/vinculação de rótulos flutuantes e apresenta validação por meio de um par `isInvalid` / `errorText` (ou `messageText`).

| Componente                        | Envolve                                              | Finalidade                                                                                                                                                                                            |
|-----------------------------------|------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`               | `InputText` + `FloatLabel`                           | Campo de texto de linha única. Muda para um rótulo estático em campos de entrada `date`/`time`/`datetime-local` (onde o rótulo flutuante sobreporia o placeholder nativo).                           |
| `BaseInputTextWithVuelidate.vue`  | `BaseInputText`                                      | Adaptador fino para Vuelidate: encaminha `$error` para `isInvalid` e renderiza `$errors[].$message` no slot `errors`. Combine-o com um objeto de campo Vuelidate.                                    |
| `BaseTextArea.vue`                | `Textarea` + `FloatLabel`                            | Campo de texto multilinha.                                                                                                                                                                            |
| `BaseTextAreaWithVuelidate.vue`   | `BaseTextArea`                                       | Mesmo padrão de adaptador Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                                 |
| `BaseInputNumber.vue`             | `InputNumber`                                        | Campo numérico com `min` / `max` / `step` e botões de incremento/decremento.                                                                                                                          |
| `BaseInputTags.vue`               | (personalizado)                                      | Etiquetas de texto livre; as etiquetas são adicionadas ao pressionar enter/vírgula e removidas ao pressionar backspace.                                                                              |
| `BaseInputGroup.vue`              | `InputGroup` + `BaseButton`                          | Campo de texto combinado com um botão de ação (estilo de pesquisa).                                                                                                                                   |
| `BaseCheckbox.vue`                | `Checkbox`                                           | Caixa de seleção binária ou vinculada a valor com rótulo.                                                                                                                                             |
| `BaseRadioButtons.vue`            | `RadioButton`                                        | Grupo de botões de rádio controlado por um array `options: [{label, value}]`.                                                                                                                         |
| `BaseToggleButton.vue`            | `BaseButton`                                         | Botão de dois estados (rótulos e ícones de ligado/desligado) vinculado através de `v-model`.                                                                                                          |
| `BaseCalendar.vue`                | `DatePicker` + `FloatLabel`                          | Seletor de data/data-hora. Respeita `platform.timepicker_increment` e a localidade do usuário via `calendarLocales`.                                                                                |
| `BaseColorPicker.vue`             | nativo `<input type="color">` + `InputText`          | Seletor de cores com fallback para texto hexadecimal; usa `colorjs.io` para validar entrada manual de hexadecimal.                                                                                   |
| `BaseRating.vue`                  | `Rating`                                             | Campo de avaliação por estrelas.                                                                                                                                                                      |
| `BaseFileUpload.vue`              | nativo `<input type="file">` + `BaseButton`          | Seletor de arquivo único que aciona um botão no estilo de anexo.                                                                                                                                      |
| `BaseFileUploadMultiple.vue`      | nativo `<input type="file" multiple>` + `BaseButton` | Variante de múltiplos arquivos de `BaseFileUpload`.                                                                                                                                                   |
| `BaseUploader.vue`                | Uppy `Dashboard`                                     | Carregador completo Uppy (webcam, áudio, editor de imagem, upload XHR) com localizações vinculadas ao `appLocale` atual. Use isso para uploads ricos com progresso; use `BaseFileUpload*` para anexos simples. |

---
### Seleção e autocompletar

| Componente              | Envolve                        | Finalidade                                                                                                                           |
|-------------------------|-------------------------------|-----------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`     | Menu suspenso de escolha única com botão de limpar opcional.                                                                |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel`  | Menu suspenso de escolha múltipla que exibe itens selecionados como chips.                                                  |
| `BaseSearchSelect.vue`  | `Dropdown` com `filter`       | Menu suspenso de escolha única com caixa de pesquisa integrada, rolagem virtual opcional e modelo de opção de duas linhas (`label` + `sublabel`). |
| `BaseAutocomplete.vue`  | `AutoComplete`                | Autocompletar assíncrono (mínimo de 3 caracteres). Suporta seleção única ou múltipla e um slot `chip` para personalizar chips. |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`   | Tabela de pesquisa de usuários paginada com seleção de linha. Use quando uma funcionalidade precisar de um seletor de usuários no estilo administrador. |

### Botões e ações

| Componente                        | Envolve               | Finalidade                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Botão padrão do Chamilo. Resolve ícones através de `chamiloIconToClass`, normaliza `type` para `severity`/`variant` do PrimeVue, renderiza um `BaseAppLink` interno quando um `route` ou `toUrl` é fornecido (assim, o mesmo componente lida com casos de router-link, âncora e botão simples). Os valores aceitos para `type` estão listados em `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | Botão de divulgação que alterna um painel de "configurações avançadas" inserido via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                 | `Toolbar`           | Barra de ferramentas de ação com slots `start` / `end` (ou um único slot padrão). `showTopBorder` opcional para estilização de separador.                                                                                                                                                                                                                                       |

---
### Exibição e dados

| Componente            | Envolve                     | Propósito                                                                                                                                                                                         |
|-----------------------|-----------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)      | Tabela de dados padrão do Chamilo. Suporta modo server-side (`lazy`), ordenação por múltiplas colunas, filtro global, seleção de linhas e paginação. Passe colunas como filhos `<Column>` (registrados globalmente). |
| `BaseCard.vue`        | `Card`                      | Envoltório de cartão que encaminha os slots `header`, `title`, `subtitle`, `footer` e padrão (conteúdo).                                                                                         |
| `BaseChart.vue`       | `Chart`                     | Predefinição de gráfico de pizza. Passe um objeto `data` compatível com Chart.js.                                                                                                                |
| `BaseChip.vue`        | `Chip`                      | Chip renderizado a partir de um objeto `{value, labelField, imageField}`, com botão de remoção opcional.                                                                                        |
| `BaseTag.vue`         | `Tag`                      | Etiqueta colorida. Mapeia o `warning` do Chamilo para o `warn` do PrimeVue.                                                                                                                      |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | Linha de avatares com contador de excesso (por exemplo, "+3"); controlado por `useAvatarList`.                                                                                                   |
| `BaseUserAvatar.vue`  | `Avatar`                    | Avatar de usuário com fallback de imagem, estado de carregamento e rótulo acessível.                                                                                                             |
| `BaseIcon.vue`        | `<i class="mdi …">`         | Renderizador de ícones do Chamilo. Adiciona um distintivo opcional (texto ou ícone), tooltip e modificador de tamanho. Sempre passe um nome semântico do Chamilo (por exemplo, `"edit"`), não uma classe MDI bruta. |
| `BaseIconField.vue`   | `IconField` + `InputText`   | Campo de entrada de pesquisa com um ícone de lupa à esquerda.                                                                                                                                     |
| `BaseDivider.vue`     | `Divider`                   | Divisor horizontal ou vertical, com título e alinhamento opcionais.                                                                                                                               |

### Navegação e menus

| Componente                 | Envolve                 | Propósito                                                                                                                                                                                 |
|----------------------------|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup que entende rotas do router dentro de itens `model[]`.                                                                                                                         |
| `BaseDropdownMenu.vue`     | (personalizado)         | Gatilho de dropdown leve com coordenação de abertura única (abrir um fecha os outros).                                                                                                   |
| `BaseContextMenu.vue`      | (personalizado)         | Menu de contexto de clique direito / posicionado, controlado por `visible` + `position`.                                                                                                 |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu de navegação estilo acordeão usado em barras laterais; rastreia automaticamente chaves expandidas a partir do modelo.                                                                 |
| `BaseRouteTabs.vue`        | Linha de `BaseAppLink`  | Barra de abas onde cada aba é um link de router. A aba ativa é destacada automaticamente com base na rota atual.                                                                         |
| `BaseAppLink.vue`          | `RouterLink` *ou* `<a>` | Link inteligente: renderiza um `<a>` quando `url` está definido (externo/legado), caso contrário, um `<RouterLink>` do Vue Router. Use-o em vez de qualquer primitivo para manter a uniformidade entre links internos e externos. |

---
### Diálogos

`BaseDialog` é a base; os outros são construídos sobre ele para os fluxos comuns de confirmação/cancelamento e exclusão.

| Componente                     | Envolve                   | Finalidade                                                                                                                             |
|-------------------------------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Diálogo modal com um cabeçalho intitulado (opcional `headerIcon`) e corpo/rodapé com slots. O estado aberto é um `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmação/cancelamento com dois botões. Tipo de confirmação configurável (`type`) (severidade) e `icon`; emite `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal pré-construído "Tem certeza de que deseja excluir este item?" com um botão de confirmação estilizado como perigo.              |

### Editor e conteúdo rico

| Componente            | Envolve                                           | Finalidade                                                                                                                                                              |
|----------------------|-------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via o `components/Editor` do projeto) | Editor de texto rico com `FloatLabel`, rastreamento de estado de foco/vazio e integração com o contexto do curso atual (`cidReq`). Use-o para qualquer campo HTML criado pelo usuário. |

### Auxiliares

| Arquivo              | Finalidade                                                                                                                                                                                                                                                          |
|----------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`    | Mapeia nomes de ícones semânticos (`edit`, `delete`, `eye-on`, `courses`, …) para classes CSS MDI. Cerca de 127 entradas. Navegue por eles em `/admin/list-icons` em uma instância em execução.                                                                 |
| `validators.js`      | Validadores de propriedades compartilhados: `iconValidator` (deve ser um nome de ícone conhecido do Chamilo), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipos permitidos de `BaseButton`). Importe-os ao definir novos componentes `Base*` que seguem essas convenções. |

### Convenções em componentes Base

* **v-model via `defineModel()`** — valor (e frequentemente `isVisible`, `filters`, `selectedItems`) são expostos como modelos; passe-os com `v-model[:name]` em vez de `:prop` + `@update:prop`.
* **Rótulos flutuantes** — a maioria dos campos de formulário envolve sua entrada em PrimeVue `FloatLabel variant="on"`. Forneça `label` (o texto exibido) e `id` (usado para vincular o `<label for>`).
* **Mensagens de validação** — os campos expõem `isInvalid` e uma pequena mensagem abaixo da entrada (`errorText`, `messageText` ou `smallText`, dependendo do componente). Variantes compatíveis com Vuelidate existem para os mais comuns.
* **Ícones** — passe nomes semânticos do Chamilo, não classes MDI brutas. Os componentes os resolvem através de `chamiloIconToClass`.
* **Dimensionamento** — `size="normal" | "small" | "large"` é a propriedade de dimensionamento convencional (veja `sizeValidator`).
* **Composição sobre duplicação** — `BaseDialogDelete` envolve `BaseDialogConfirmCancel`, que envolve `BaseDialog`; `BaseToggleButton` e `BaseAdvancedSettingsButton` envolvem `BaseButton`. Quando você precisar de uma variante recorrente de um componente existente, prefira compor um novo `Base*` sobre ele em vez de reimplementá-lo em uma pasta de funcionalidade.

## Componentes de Layout

Localizados em `components/layout/`:

| Componente | Finalidade |
|-----------|------------|
| `DashboardLayout.vue` | Layout principal: barra superior + barra lateral + área de conteúdo |
| `Sidebar.vue` | Painel de navegação esquerdo (colapsável) |
| `TopbarLoggedIn.vue` | Barra superior com logotipo, caixa de entrada, avatar |

---
## Componentes de Área de Funcionalidade

| Diretório | Componentes | Finalidade |
|-----------|-----------|---------|
| `course/` | Cartões de curso, filtros de catálogo, formulários de curso | Listagem e gestão de cursos |
| `session/` | Cartões de sessão, catálogo | Listagem de sessões |
| `assignments/` | Listas de submissões, modais de avaliação, formulários | Fluxo de trabalho de tarefas |
| `chat/` | DockedChat, mensagens de chat | Chat em tempo real e tutor de IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Navegador e gestão de arquivos |
| `installer/` | Step1-Step7, EmailSettings | Assistente de instalação |
| `social/` | GroupInfoCard, publicações sociais | Funcionalidades de rede social |
| `attendance/` | AttendanceTable | Rastreamento de presença |
| `usergroup/` | GroupMembers | Gestão de grupos de usuários |

## Sistema de Ícones

Os ícones utilizam **Material Design Icons (MDI)** como a única biblioteca de ícones: `<i class="mdi mdi-pencil"></i>`

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

Os componentes utilizam `BaseIcon` ou fazem referência a `chamiloIconToClass` para renderizar ícones de forma consistente.

Uma referência navegável de todos os ícones disponíveis na plataforma pode ser encontrada em `/admin/list-icons` em qualquer instância do Chamilo em execução.

## Padrões de Componentes

* **Composition API** — Os componentes utilizam a sintaxe `<script setup>` do Vue 3
* **Integração com PrimeVue** — Uso intensivo de componentes PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios para chamadas de API** — Requisições HTTP para a API do backend
* **Vue I18n** — Todo o texto voltado para o usuário utiliza chaves de tradução