# Configurações de Certificados

Configurações padrão aplicadas quando um aluno obtém um certificado a partir do livro de notas.

Acesse essas configurações em **Administração > Configurações de configuração > Certificados**. Esta categoria contém **9 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_certificate_pdf_footer`

**Adicionar rodapé às exportações de certificados em PDF**

Quando ativado, um rodapé é adicionado às exportações de certificados em PDF.

*Padrão: `false`*

### `allow_general_certificate`

**Habilitar certificado geral**

Um certificado geral é um certificado que agrupa todas as conquistas do usuário nos cursos que ele frequentou.

*Padrão: `false`*

### `allow_public_certificates`

**Permitir certificados públicos**

Certificados de usuários podem ser visualizados por usuários não registrados.

*Padrão: `false`*

### `certificate_filter_by_official_code`

**Filtro de certificados por código oficial**

Adiciona um filtro pelo código oficial dos alunos na lista de certificados.

*Padrão: `false`*

### `certificate_pdf_orientation`

**Orientação do PDF para certificados**

Defina 'portrait' (retrato) ou 'landscape' (paisagem) como termos técnicos para certificados em PDF.

*Padrão: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar link de exportação para PDF para todos**

Ative para remover completamente a possibilidade de exportar certificados para PDF (para todos os usuários). Se ativado, isso inclui ocultá-lo dos alunos.

*Padrão: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar link de exportação para alunos**

Se ativado, os alunos não poderão exportar seus certificados para PDF. Esta opção está disponível porque, dependendo da estrutura HTML precisa do modelo de certificado, a exportação para PDF pode ter baixa qualidade. Nesse caso, é melhor mostrar apenas o certificado em HTML para os alunos.

*Padrão: `false`*

### `hide_my_certificate_link`

**Ocultar link 'meu certificado'**

Oculta a página de certificados para usuários não administradores.

*Padrão: `false`*

### `session_admin_can_download_all_certificates`

**Permitir que administradores de sessão baixem certificados privados**

Se ativado, os administradores de sessão podem baixar certificados mesmo que não sejam publicados publicamente.

*Padrão: `false`*