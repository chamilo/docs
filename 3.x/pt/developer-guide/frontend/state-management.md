# Gestão de Estado

O Chamilo utiliza duas bibliotecas de gestão de estado em paralelo:

* **Pinia** — o padrão atual para todas as novas stores. A maior parte da base de código utiliza Pinia.
* **Vuex** — store legado, ainda presente e utilizado por vistas mais antigas. O código novo deve utilizar Pinia.

## Stores Pinia

As stores Pinia encontram-se diretamente em `assets/vue/store/`:

| Ficheiro da store | Composable | Finalidade |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Utilizador autenticado, login/logout, verificação de sessão |
| `cidReq.js` | `useCidReqStore` | Contexto atual de curso/sessão (ID do curso, ID da sessão) |
| `courseSettingStore.js` | `useCourseSettings` | Cache de definições ao nível do curso |
| `enrolledStore.js` | `useEnrolledStore` | Dados de inscrição do utilizador |
| `platformConfig.js` | `usePlatformConfig` | Configuração da plataforma, plugins, tema, fornecedores OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Estado de mensagens |
| `socialStore.js` | `useSocialStore` | Estado da rede social |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

Regista o contexto atual de curso/sessão — necessário para qualquer operação de API no âmbito de um curso:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Coloca em cache as definições ao nível do curso para evitar chamadas repetidas à API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Contém a configuração de toda a plataforma obtida a partir de `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (legado)

A store Vuex está definida em `assets/vue/store/index.js` e contém:

| Módulo | Finalidade |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) que gera um módulo Vuex CRUD completo para um determinado serviço — utilizado por vistas mais antigas de listagem/criação/atualização |
| `modules/notifications.js` | Estado de notificações toast (exibição, cor, texto, tempo limite) |
| `modules/ux.js` | Estado de UX (mensagem de acesso proibido) |
| `security.js` | Módulo de segurança Vuex legado (substituído por `securityStore.js`) |

Evite adicionar novos módulos Vuex. Utilize Pinia para qualquer estado novo.

## Composables

Além das stores, `assets/vue/composables/` contém funções de composição partilhadas. Exemplos relevantes:

| Ficheiro | Finalidade |
|------|---------|
| `useFileManager.js` | Estado e operações do explorador de ficheiros |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Ligação do menu da barra superior |
| `useTopbarTour.js` | Visita guiada da barra superior |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Auxiliares da ferramenta de documentos |
| `useCertificateTags.js` | Auxiliares de etiquetas de modelos de certificado |
| `sidebarMenu.js` | Árvore de navegação da barra lateral |
| `theme.js` | Carregamento e troca de tema |
| `pluginRegion.js` | Renderização de regiões de IU injetadas por plugins |
| `userPermissions.js` | Verificações de permissões do utilizador atual |
| `notification.js` | Auxiliares de notificações push |
| `locale.js` | Deteção e troca de locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Padrões CRUD reutilizáveis de datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Auxiliares da rede social |
| `usePushSubscription.js` | Gestão de subscrição Web Push |
| `upload.js` | Auxiliares de carregamento de ficheiros |
| `useConfirmation.js` | Auxiliar de diálogo de confirmação |

Os composables também estão organizados em subdiretórios por funcionalidade (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). A lista completa encontra-se em `assets/vue/composables/`.