# Gerenciamento de Estado

O Chamilo utiliza duas bibliotecas de gerenciamento de estado em paralelo:

* **Pinia** — o padrão atual para todas as novas stores. A maior parte da base de código usa Pinia.
* **Vuex** — store legada, ainda presente e usada por views mais antigas. Código novo deve usar Pinia.

## Stores Pinia

As stores Pinia ficam diretamente em `assets/vue/store/`:

| Arquivo da store | Composable | Propósito |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Usuário autenticado, login/logout, verificação de sessão |
| `cidReq.js` | `useCidReqStore` | Contexto atual de curso/sessão (ID do curso, ID da sessão) |
| `courseSettingStore.js` | `useCourseSettings` | Cache de configurações no nível do curso |
| `enrolledStore.js` | `useEnrolledStore` | Dados de matrícula do usuário |
| `platformConfig.js` | `usePlatformConfig` | Configuração da plataforma, plugins, tema, provedores OAuth2 |
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

Rastreia o contexto atual de curso/sessão — necessário para qualquer operação de API no escopo do curso:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

Armazena em cache as configurações no nível do curso para evitar chamadas repetidas à API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

Mantém a configuração de toda a plataforma obtida de `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Legada)

A store Vuex é definida em `assets/vue/store/index.js` e contém:

| Módulo | Propósito |
|--------|---------|
| `modules/crud.js` | Fábrica (`makeCrudModule`) que gera um módulo Vuex CRUD completo para um determinado serviço — usada por views mais antigas de listagem/criação/atualização |
| `modules/notifications.js` | Estado de notificações toast (exibição, cor, texto, timeout) |
| `modules/ux.js` | Estado de UX (mensagem de acesso proibido) |
| `security.js` | Módulo de segurança Vuex legado (substituído por `securityStore.js`) |

Evite adicionar novos módulos Vuex. Use Pinia para qualquer estado novo.

## Composables

Além das stores, `assets/vue/composables/` contém funções de composição compartilhadas. Exemplos notáveis:

| Arquivo | Propósito |
|------|---------|
| `useFileManager.js` | Estado e operações do navegador de arquivos |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Encadeamento do menu da barra superior |
| `useTopbarTour.js` | Tour guiado da barra superior |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Auxiliares da ferramenta de documentos |
| `useCertificateTags.js` | Auxiliares de tags de modelos de certificado |
| `sidebarMenu.js` | Árvore de navegação da barra lateral |
| `theme.js` | Carregamento e troca de tema |
| `pluginRegion.js` | Renderização de regiões de UI injetadas por plugins |
| `userPermissions.js` | Verificações de permissão do usuário atual |
| `notification.js` | Auxiliares de notificação push |
| `locale.js` | Detecção e troca de locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Padrões reutilizáveis de CRUD em datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Auxiliares da rede social |
| `usePushSubscription.js` | Gerenciamento de inscrição Web Push |
| `upload.js` | Auxiliares de upload de arquivos |
| `useConfirmation.js` | Auxiliar de diálogo de confirmação |

Os composables também estão organizados em subdiretórios por funcionalidade (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). A lista completa está em `assets/vue/composables/`.