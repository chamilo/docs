# Configurações de Presença

Padrões e comportamento da ferramenta **Presença**.

Acesse essas configurações em **Administração > Configurações de configuração > Presença**. Esta categoria contém **4 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_delete_attendance`

**Presenças: habilitar exclusão**

O comportamento padrão no Chamilo é ocultar as folhas de presença em vez de excluí-las, caso o professor o faça por engano. Habilite esta opção para permitir que os professores *realmente* excluam folhas de presença.

*Padrão: `true`*

### `attendance_allow_comments`

**Permitir comentários nas folhas de presença**

Professores e alunos podem comentar em cada registro de presença individual (para justificar).

*Padrão: `false`*

### `enable_sign_attendance_sheet`

**Assinatura de presença**

Habilita a coleta de assinaturas para confirmar a presença de alguém.

*Padrão: `false`*

### `multilevel_grading`

**Habilitar Avaliação de Presença em Múltiplos Níveis**

Permite avaliar a presença com múltiplos níveis em vez de um simples sistema de presente/ausente.

*Padrão: `false`*