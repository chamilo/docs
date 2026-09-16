# Sistema de Configurações

A configuração do Chamilo é gerenciada por um conjunto de esquemas de configurações (cerca de 40, variando entre as versões) que definem cada aspecto configurável da plataforma. Eles ficam em `src/CoreBundle/Settings/` — a lista exata nesse diretório é a fonte da verdade.

## Como Funciona

As configurações são:

1. **Definidas** em classes de esquema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Armazenadas** no banco de dados (tabela `settings_current`)
3. **Acessadas** por meio do serviço `SettingsManager`
4. **Gerenciadas** pela interface web de administração

## Esquemas de Configurações

Cada arquivo de esquema define uma categoria de configurações. Esquemas principais:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Informações da instituição, fuso horário, tipo de servidor, recursos do portal |
| `SecuritySettingsSchema` | Tentativas de login, CAPTCHA, política de senhas, cabeçalhos HTTP, 2FA |
| `RegistrationSettingsSchema` | Autocadastro, campos obrigatórios, inscrição automática |
| `CourseSettingsSchema` | Padrões de criação de curso, ferramentas, catálogo |
| `SessionSettingsSchema` | Padrões de sessão, visibilidade |
| `MailSettingsSchema` | Configuração de e-mail, DKIM, notificações |
| `AiHelpersSettingsSchema` | Provedores de IA, interruptores de recursos por ferramenta de IA |
| `ExerciseSettingsSchema` | Pontuação de questionários, feedback, opções de questões |
| `LearningPathSettingsSchema` | Exibição de LP, pré-requisitos, configurações SCORM |
| `DocumentSettingsSchema` | Limites de upload, tipos de arquivo permitidos, armazenamento |
| `DisplaySettingsSchema` | Abas da IU, itens da barra lateral, tema |
| `LanguageSettingsSchema` | Idiomas disponíveis, locale padrão |
| `AdminSettingsSchema` | E-mail do administrador, opções específicas de administração |

## Acessando Configurações

Em código PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Em templates:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Estrutura de uma Configuração

Cada configuração possui:

* **Namespace** — A categoria do esquema (por exemplo, `platform`, `security`, `ai_helpers`)
* **Variable** — O nome da configuração (por exemplo, `site_name`, `allow_registration`)
* **Value** — O valor atual
* **Type** — Tipo de dado (string, boolean, array, etc.)

## Configurações no Nível do Curso

Algumas configurações podem ser sobrescritas no nível do curso. Elas são definidas em `src/CourseBundle/Settings/` e incluem:

* Configurações de exercícios por curso
* Configurações de tarefas por curso
* Interruptores de recursos de IA por curso

## Configurações Multi-URL

Em instalações multi-URL, algumas configurações podem ser personalizadas por URL de acesso, permitindo diferentes configurações de portal a partir da mesma instalação.

Essas configurações aparecerão várias vezes na tabela `settings`, com valores diferentes de `access_url`. Por padrão, todas as configurações estão associadas a `access_url=1`.

## Adicionando uma Nova Configuração

1. Adicione a definição da configuração à classe de esquema apropriada
2. Forneça um valor padrão
3. Execute as migrações de banco de dados, se necessário
4. Acesse a configuração por meio do `SettingsManager`