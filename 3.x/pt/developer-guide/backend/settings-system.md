# Sistema de Definições

A configuração do Chamilo é gerida através de um conjunto de esquemas de definições (cerca de 40, variando entre versões) que definem todos os aspetos configuráveis da plataforma. Encontram-se em `src/CoreBundle/Settings/` — a lista exata nesse local é a fonte da verdade.

## Como Funciona

As definições são:

1. **Definidas** em classes de esquema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Armazenadas** na base de dados (tabela `settings_current`)
3. **Acedidas** através do serviço `SettingsManager`
4. **Geridas** através da interface web de administração

## Esquemas de Definições

Cada ficheiro de esquema define uma categoria de definições. Esquemas principais:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Informações da instituição, fuso horário, tipo de servidor, funcionalidades do portal |
| `SecuritySettingsSchema` | Tentativas de início de sessão, CAPTCHA, política de palavras-passe, cabeçalhos HTTP, 2FA |
| `RegistrationSettingsSchema` | Autorregisto, campos obrigatórios, inscrição automática |
| `CourseSettingsSchema` | Predefinições de criação de cursos, ferramentas, catálogo |
| `SessionSettingsSchema` | Predefinições de sessões, visibilidade |
| `MailSettingsSchema` | Configuração de e-mail, DKIM, notificações |
| `AiHelpersSettingsSchema` | Fornecedores de IA, interruptores de funcionalidades por ferramenta de IA |
| `ExerciseSettingsSchema` | Pontuação de questionários, feedback, opções de perguntas |
| `LearningPathSettingsSchema` | Apresentação de LP, pré-requisitos, definições SCORM |
| `DocumentSettingsSchema` | Limites de carregamento, tipos de ficheiro permitidos, armazenamento |
| `DisplaySettingsSchema` | Separadores da IU, itens da barra lateral, tema |
| `LanguageSettingsSchema` | Idiomas disponíveis, locale predefinido |
| `AdminSettingsSchema` | E-mail do administrador, opções específicas de administração |

## Aceder às Definições

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

## Estrutura de uma Definição

Cada definição tem:

* **Namespace** — A categoria do esquema (p. ex., `platform`, `security`, `ai_helpers`)
* **Variable** — O nome da definição (p. ex., `site_name`, `allow_registration`)
* **Value** — O valor atual
* **Type** — Tipo de dados (string, boolean, array, etc.)

## Definições ao Nível do Curso

Algumas definições podem ser substituídas ao nível do curso. Estas são definidas em `src/CourseBundle/Settings/` e incluem:

* Definições de exercícios por curso
* Definições de trabalhos por curso
* Interruptores de funcionalidades de IA por curso

## Definições Multi-URL

Em instalações multi-URL, algumas definições podem ser personalizadas por URL de acesso, permitindo configurações de portal diferentes a partir da mesma instalação.

Essas definições aparecerão várias vezes na tabela `settings`, com valores diferentes de `access_url`. Por predefinição, todas as definições estão associadas a `access_url=1`.

## Adicionar uma Nova Definição

1. Adicione a definição da definição à classe de esquema apropriada
2. Forneça um valor predefinido
3. Execute migrações da base de dados, se necessário
4. Aceda à definição através de `SettingsManager`