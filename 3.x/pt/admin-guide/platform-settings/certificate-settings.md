# Definições de Certificados

Predefinições aplicadas quando um formando obtém um certificado a partir do boletim de notas.

Aceda a estas definições em **Administração > Definições de configuração > Certificados**. Esta categoria contém **11 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `add_certificate_pdf_footer`

**Adicionar rodapé às exportações PDF de certificados**

Quando ativado, é adicionado um rodapé às exportações PDF de certificados.

*Predefinição: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Geração automática de certificados na chamada WS**

Quando ativado, e ao utilizar o webservice WSCertificatesList, esta opção garante que todos os certificados tenham sido gerados pelos utilizadores se estes tiverem atingido a pontuação suficiente em todos os itens definidos nos boletins de notas de todos os cursos e sessões (isto pode consumir recursos de processamento consideráveis no seu servidor).

*Predefinição: `false`*

### `allow_certificates_search` **v3**

**Permitir pesquisa de certificados**

Permitir que utilizadores e visitantes pesquisem certificados gerados a partir do menu da barra superior.

*Predefinição: `false`*

### `allow_general_certificate`

**Ativar certificado geral**

Um certificado geral é um certificado que agrupa todas as conquistas do utilizador nos cursos que frequentou.

*Predefinição: `false`*

### `allow_public_certificates`

**Permitir certificados públicos**

Os certificados do utilizador podem ser visualizados por utilizadores não registados.

*Predefinição: `false`*

### `certificate_filter_by_official_code`

**Filtro de certificados por código oficial**

Adicionar um filtro pelo código oficial dos estudantes à lista de certificados.

*Predefinição: `false`*

### `certificate_pdf_orientation`

**Orientação PDF para certificados**

Definir ‘portrait’ ou ‘landscape’ (termos técnicos) para os certificados em PDF.

*Predefinição: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar ligação de exportação PDF para todos**

Ativar para remover completamente a possibilidade de exportar certificados para PDF (para todos os utilizadores). Se ativado, inclui a ocultação para os estudantes.

*Predefinição: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar ligação de exportação aos estudantes**

Se ativado, os estudantes não poderão exportar os seus certificados para PDF. Esta opção está disponível porque, consoante a estrutura HTML precisa do modelo de certificado, a exportação PDF pode ser de baixa qualidade. Nesse caso, é preferível mostrar apenas o certificado HTML aos estudantes.

*Predefinição: `false`*

### `hide_my_certificate_link`

**Ocultar ligação «o meu certificado»**

Ocultar a página de certificados para utilizadores que não sejam administradores.

*Predefinição: `false`*

### `session_admin_can_download_all_certificates`

**Permitir que administradores de sessão descarreguem certificados privados**

Se ativado, os administradores de sessão podem descarregar certificados mesmo que estes não estejam publicados publicamente.

*Predefinição: `false`*

## Ver também

Os certificados podem agora ter um período de validade e uma data de expiração, com lembretes de expiração automatizados ou manuais. Isto não se configura aqui — o período de validade é uma definição do boletim de notas orientada para o professor, e o interruptor de ligar/desligar do cron de lembretes encontra-se na categoria **Tarefas Cron**. Consulte [Certificados e Competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) e [Definições de Tarefas Cron](crons-settings.md#certificate-expiry-reminders).