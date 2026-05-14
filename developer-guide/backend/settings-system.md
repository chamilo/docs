# Sistema de Configurações

A configuração do Chamilo é gerenciada por meio de um conjunto de esquemas de configurações (cerca de 40, variando entre versões) que definem todos os aspectos configuráveis da plataforma. Eles estão localizados em `src/CoreBundle/Settings/` — a lista exata nesse diretório é a fonte de referência.

## Como Funciona

As configurações são:

1. **Definidas** em classes de esquema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Armazenadas** no banco de dados (tabela `settings_current`)
3. **Acessadas** por meio do serviço `SettingsManager`
4. **Gerenciadas** pela interface web de administração

## Esquemas de Configurações

Cada arquivo de esquema define uma categoria de configurações. Principais esquemas:

| Esquema | Finalidade |
|--------|------------|
| `PlatformSettingsSchema` | Informações da instituição, fuso horário, tipo de servidor, recursos do portal |
| `SecuritySettingsSchema` | Tentativas de login, CAPTCHA, política de senha, cabeçalhos HTTP, autenticação de dois fatores (2FA) |
| `RegistrationSettingsSchema` | Auto-registro, campos obrigatórios, inscrição automática |
| `CourseSettingsSchema` | Padrões de criação de cursos, ferramentas, catálogo |
| `SessionSettingsSchema` | Padrões de sessões, visibilidade |
| `MailSettingsSchema` | Configuração de e-mail, DKIM, notificações |
| `AiHelpersSettingsSchema` | Provedores de IA, ativação de recursos por ferramenta de IA |
| `ExerciseSettingsSchema` | Pontuação de questionários, feedback, opções de perguntas |
| `LearningPathSettingsSchema` | Exibição de caminhos de aprendizagem, pré-requisitos, configurações SCORM |
| `DocumentSettingsSchema` | Limites de upload, tipos de arquivo permitidos, armazenamento |
| `DisplaySettingsSchema` | Abas da interface, itens da barra lateral, tema |
| `LanguageSettingsSchema` | Idiomas disponíveis, localidade padrão |
| `AdminSettingsSchema` | E-mail do administrador, opções específicas para administradores |

## Acessando Configurações

Em código PHP:

```php
// Via serviço SettingsManager
$value = $settingsManager->getSetting('platform.site_name');

// Em código legado
$value = api_get_setting('platform.site_name');
```

Em templates:

```twig
{# Ler uma única configuração #}
{{ chamilo_settings_get('platform.site_name') }}

{# Verificar se uma configuração existe #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Obter todas as configurações como um array #}
{% set settings = chamilo_settings_all() %}
```

## Estrutura das Configurações

Cada configuração possui:

* **Namespace** — A categoria do esquema (por exemplo, `platform`, `security`, `ai_helpers`)
* **Variável** — O nome da configuração (por exemplo, `site_name`, `allow_registration`)
* **Valor** — O valor atual
* **Tipo** — Tipo de dado (string, boolean, array, etc.)

## Configurações no Nível do Curso

Algumas configurações podem ser sobrescritas no nível do curso. Elas são definidas em `src/CourseBundle/Settings/` e incluem:

* Configurações de exercícios por curso
* Configurações de tarefas por curso
* Ativação de recursos de IA por curso

## Configurações Multi-URL

Em configurações multi-URL, algumas configurações podem ser personalizadas por URL de acesso, permitindo diferentes configurações de portal a partir da mesma instalação.

Essas configurações aparecerão várias vezes na tabela `settings`, com diferentes valores de `access_url`. Por padrão, todas as configurações estão associadas a `access_url=1`.

## Adicionando uma Nova Configuração

1. Adicione a definição da configuração à classe de esquema apropriada
2. Forneça um valor padrão
3. Execute migrações de banco de dados, se necessário
4. Acesse a configuração via `SettingsManager`