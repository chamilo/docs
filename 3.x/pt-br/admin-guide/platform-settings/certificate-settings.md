# Configurações de certificados

Padrões aplicados quando um aluno obtém um certificado a partir do boletim de notas.

Acesse estas configurações em **Administração > Configurações de configuração > Certificados**. Esta categoria contém **11 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_certificate_pdf_footer`

**Adicionar rodapé às exportações de certificado em PDF**

Quando habilitado, um rodapé é adicionado às exportações em PDF dos certificados.

*Padrão: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Geração automática de certificados em chamada WS**

Quando habilitado, e ao usar o webservice WSCertificatesList, esta opção garante que todos os certificados tenham sido gerados pelos usuários se eles atingiram a pontuação suficiente em todos os itens definidos nos boletins de notas de todos os cursos e sessões (isso pode consumir recursos de processamento consideráveis no seu servidor).

*Padrão: `false`*

### `allow_certificates_search` **v3**

**Permitir busca de certificados**

Permite que usuários e visitantes busquem certificados gerados a partir do menu da barra superior.

*Padrão: `false`*

### `allow_general_certificate`

**Habilitar certificado geral**

Um certificado geral é um certificado que agrupa todas as conquistas do usuário nos cursos que ele(a) frequentou.

*Padrão: `false`*

### `allow_public_certificates`

**Permitir certificados públicos**

Os certificados do usuário podem ser visualizados por usuários não registrados.

*Padrão: `false`*

### `certificate_filter_by_official_code`

**Filtro de certificados por código oficial**

Adiciona um filtro pelo código oficial dos estudantes à lista de certificados.

*Padrão: `false`*

### `certificate_pdf_orientation`

**Orientação do PDF para certificados**

Defina ‘portrait’ ou ‘landscape’ (termos técnicos) para os certificados em PDF.

*Padrão: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar o link de exportação em PDF para todos**

Habilite para remover completamente a possibilidade de exportar certificados para PDF (para todos os usuários). Se habilitado, isso inclui ocultá-lo dos estudantes.

*Padrão: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar o link de exportação dos estudantes**

Se habilitado, os estudantes não poderão exportar seus certificados para PDF. Esta opção está disponível porque, dependendo da estrutura HTML precisa do modelo de certificado, a exportação em PDF pode ter baixa qualidade. Nesse caso, é melhor mostrar apenas o certificado em HTML aos estudantes.

*Padrão: `false`*

### `hide_my_certificate_link`

**Ocultar o link ‘meu certificado’**

Oculta a página de certificados para usuários que não são administradores.

*Padrão: `false`*

### `session_admin_can_download_all_certificates`

**Permitir que administradores de sessão baixem certificados privados**

Se habilitado, os administradores de sessão podem baixar certificados mesmo que eles não estejam publicados publicamente.

*Padrão: `false`*

## Veja também

Os certificados agora podem receber um período de validade e uma data de expiração, com lembretes de expiração automatizados ou manuais. Isso não é configurado aqui — o período de validade é uma configuração do boletim de notas voltada ao professor, e o interruptor de ligar/desligar do cron de lembretes fica na categoria **Tarefas cron**. Consulte [Certificados e competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) e [Configurações de tarefas cron](crons-settings.md#certificate-expiry-reminders).