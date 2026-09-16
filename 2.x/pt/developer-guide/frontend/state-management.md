# Gerenciamento de Estado

Chamilo utiliza duas bibliotecas de gerenciamento de estado lado a lado:

- **Pinia** — o padrão atual para todas as novas stores. A maior parte do código base utiliza Pinia.
- **Vuex** — store legado, ainda presente e utilizado por visualizações mais antigas. Novos códigos devem usar Pinia.

## Stores Pinia

As stores Pinia estão localizadas diretamente em `assets/vue/store/`:

| Arquivo da Store | Composable | Finalidade |
|------------------|------------|------------|
| `securityStore.js` | `useSecurityStore` | Usuário autenticado, login/logout, verificação de sessão |
| `cidReq.js` | `useCidReqStore` | Contexto atual do curso/sessão (ID do curso, ID da sessão) |
| `courseSettingStore.js` | `useCourseSettings` | Cache de configurações no nível do curso |
| `enrolledStore.js` | `useEnrolledStore` | Dados de matrícula do usuário |
| `platformConfig.js` | `usePlatformConfig` | Configuração da plataforma, plugins, tema, provedores OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Estado de mensagens |
| `socialStore.js` | `useSocialStore` | Estado da rede social |

### Store de Segurança

```javascript
const securityStore = useSecurityStore()

// Verificar se o usuário está logado
if (securityStore.isAuthenticated) { ... }

// Acessar o objeto do usuário atual
const user = securityStore.user
```

### Store de Requisição CID

Rastreia o contexto atual do curso/sessão — necessário para qualquer operação de API no escopo do curso:

```javascript
const cidReqStore = useCidReqStore()

// Objetos atuais de curso e sessão
const course = cidReqStore.course
const session = cidReqStore.session
```

### Store de Configurações do Curso

Armazena em cache as configurações no nível do curso para evitar chamadas repetidas à API:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Store de Configuração da Plataforma

Contém a configuração geral da plataforma obtida de `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Array de configurações carregadas, tema ativo, plugins habilitados, provedores OAuth2
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (Legado)

A store Vuex está definida em `assets/vue/store/index.js` e contém:

| Módulo | Finalidade |
|--------|------------|
| `modules/crud.js` | Fábrica (`makeCrudModule`) que gera um módulo Vuex CRUD completo para um determinado serviço — usado por visualizações antigas de lista/criação/atualização |
| `modules/notifications.js` | Estado de notificações toast (exibição, cor, texto, tempo limite) |
| `modules/ux.js` | Estado de UX (mensagem de acesso proibido) |
| `security.js` | Módulo de segurança Vuex legado (substituído por `securityStore.js`) |

Evite adicionar novos módulos Vuex. Use Pinia para qualquer novo estado.

## Composables

Além das stores, `assets/vue/composables/` contém funções de composição compartilhadas. Exemplos notáveis:

| Arquivo | Finalidade |
|---------|------------|
| `useFileManager.js` | Estado e operações do navegador de arquivos |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Conexão do menu da barra superior |
| `useTopbarTour.js` | Tour guiado para a barra superior |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Auxiliares da ferramenta de documentos |
| `useCertificateTags.js` | Auxiliares de tags de modelo de certificado |
| `sidebarMenu.js` | Árvore de navegação da barra lateral |
| `theme.js` | Carregamento e troca de tema |
| `pluginRegion.js` | Renderização de região de UI injetada por plugin |
| `userPermissions.js` | Verificações de permissão para o usuário atual |
| `notification.js` | Auxiliares de notificações push |
| `locale.js` | Detecção e troca de localidade |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Padrões CRUD reutilizáveis para datatable |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Auxiliares de rede social |
| `usePushSubscription.js` | Gerenciamento de assinatura Web Push |
| `upload.js` | Auxiliares de upload de arquivos |
| `useConfirmation.js` | Auxiliar de diálogo de confirmação |

Os composables também estão organizados em subdiretórios de funcionalidades (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). A lista completa está em `assets/vue/composables/`.