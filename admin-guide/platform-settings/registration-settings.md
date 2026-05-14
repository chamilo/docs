# Configurações de Registro

Política de auto-registro e redirecionamentos pós-registro — o que é solicitado aos novos usuários e para onde eles são direcionados.

Acesse essas configurações em **Administração > Configurações de configuração > Registro**. Esta categoria contém **20 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_double_validation_in_registration`

**Validação dupla no processo de registro**

Exibe simplesmente uma solicitação de confirmação na página de registro antes de prosseguir com a criação do usuário.

*Padrão: `false`*

### `allow_fields_inscription`

**Restringir campos exibidos durante o registro**

Se você deseja mostrar apenas alguns dos campos de perfil disponíveis, pode completar o array aqui com subelementos 'fields' e 'extra_fields' contendo arrays com a lista dos campos a serem exibidos.

### `allow_lostpassword`

**Senha perdida**

Os usuários podem solicitar a recuperação de senha perdida?

*Padrão: `true`*

### `allow_registration`

**Registro**

O registro como novo usuário é permitido? Os usuários podem criar novas contas?

*Padrão: `false`*

### `allow_registration_as_teacher`

**Registro como professor**

É possível se registrar como professor (com a capacidade de criar cursos)?

*Padrão: `false`*

### `allow_terms_conditions`

**Ativar termos e condições**

Esta opção exibirá os Termos e Condições no formulário de registro para novos usuários. Precisa ser configurada primeiro na página de administração do portal.

*Padrão: `false`*

### `drh_autosubscribe`

**Inscrição automática de diretor de recursos humanos**

Inscrição automática de diretor de recursos humanos - ainda não disponível

### `extendedprofile_registration`

**Campos de portfólio no registro**

Quais dos seguintes campos do portfólio devem estar disponíveis no processo de registro do usuário? Isso exige que a opção de portfólio esteja ativada (veja acima).

### `extendedprofile_registrationrequired`

**Campos de portfólio obrigatórios no registro**

Quais dos seguintes campos do portfólio são *obrigatórios* no processo de registro do usuário? Isso exige que a opção de portfólio esteja ativada e que o campo também esteja disponível no formulário de registro (veja acima).

### `extldap_config`

**Configuração de conexão LDAP**

Array definindo host e porta para o servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar caixa de aceitação legal na página de Termos e Condições**

Se definido como true, remove a caixa de seleção "Li e aceito" no fluxo da página de Termos e Condições.

*Padrão: `false`*

### `platform_unsubscribe_allowed`

**Permitir cancelamento de inscrição na plataforma**

Ao ativar esta opção, você permite que qualquer usuário remova definitivamente sua própria conta e todos os dados relacionados a ela da plataforma. Esta é uma ação bastante radical, mas necessária para portais abertos ao público onde os usuários podem se auto-registrar. Uma entrada adicional aparecerá no perfil do usuário para cancelar a inscrição após confirmação.

*Padrão: `false`*

### `redirect_after_login`

**Redirecionamento após login (por perfil)**

Defina o redirecionamento por perfil após o login usando um objeto JSON como {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Padrão:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Campos extras obrigatórios durante o registro**

Array de identificadores de campos extras que devem ser preenchidos durante o registro do usuário.

### `required_profile_fields`

**Campos obrigatórios durante o registro**

Array de nomes de campos de perfil (email, phone, language, official_code) que devem ser fornecidos durante o registro.

### `send_inscription_msg_to_inbox`

**Enviar mensagem de boas-vindas para e-mail e caixa de entrada**

Por padrão, a mensagem de boas-vindas (com credenciais) é enviada apenas por e-mail. Ative esta opção para enviá-la também para a caixa de entrada do usuário no Chamilo.

*Padrão: `false`*

### `sessionadmin_autosubscribe`

**Inscrição automática de administrador de sessão**

Inscrição automática de administrador de sessão - ainda não disponível

### `student_autosubscribe`

**Inscrição automática de aluno**

Inscrição automática de aluno - ainda não disponível

### `teacher_autosubscribe`

**Inscrição automática de professor**

Inscrição automática de professor - ainda não disponível

### `user_hide_never_expire_option`

**Ocultar opção 'nunca expira' para usuários**

Remove a opção 'nunca expira' ao criar/editar uma conta de usuário.

*Padrão: `false`*