# Configurações de registro

Política de autorregistro e redirecionamentos pós-registro — o que é solicitado aos novos usuários e para onde eles são encaminhados.

Acesse essas configurações em **Administração > Configurações > Registro**. Esta categoria contém **21 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_double_validation_in_registration`

**Validação dupla no processo de registro**

Simplesmente exibe uma solicitação de confirmação na página de registro antes de prosseguir com a criação do usuário.

*Padrão: `false`*


### `allow_fields_inscription`

**Restringir campos exibidos durante o registro**

Se você quiser mostrar apenas alguns dos campos de perfil disponíveis, pode completar o array aqui com os subelementos 'fields' e 'extra_fields' contendo arrays com a lista dos campos a exibir.

### `allow_invitation_registration` **v3**

**Permitir registro via links de convite de curso**

Quando habilitado, um professor/administrador pode enviar um link de convite de uso único a partir da ferramenta Usuários de um curso, permitindo que uma pessoa não registrada acesse o formulário de registro e se registre mesmo com o autorregistro geral (`allow_registration`) desabilitado.

*Padrão: `false`*

Consulte [Inscrição de usuários](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) para o lado voltado ao professor deste recurso.

### `allow_lostpassword`

**Senha perdida**

Os usuários têm permissão para solicitar a senha perdida?

*Padrão: `true`*

### `allow_registration`

**Registro**

O registro como novo usuário é permitido? Os usuários podem criar novas contas?

*Padrão: `false`*

### `allow_registration_as_teacher`

**Registro como professor**

É possível registrar-se como professor (com a capacidade de criar cursos)?

*Padrão: `false`*

### `allow_terms_conditions`

**Habilitar termos e condições**

Esta opção exibirá os Termos e Condições no formulário de registro para novos usuários. Precisa ser configurada primeiro na página de administração do portal.

*Padrão: `false`*


### `drh_autosubscribe`

**Autoinscrição do diretor de recursos humanos**

Autoinscrição do diretor de recursos humanos — ainda não disponível

### `extendedprofile_registration`

**Campos do portfólio no registro**

Quais dos seguintes campos do portfólio devem estar disponíveis no processo de registro do usuário? Isso exige que a opção de portfólio esteja habilitada (veja acima).

### `extendedprofile_registrationrequired`

**Campos obrigatórios do portfólio no registro**

Quais dos seguintes campos do portfólio são *obrigatórios* no processo de registro do usuário? Isso exige que a opção de portfólio esteja habilitada e que o campo também esteja disponível no formulário de registro (veja acima).

### `extldap_config`

**Configuração de conexão LDAP**

Array que define host e porta do servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar caixa de aceitação legal na página de Termos e Condições**

Se definido como true, remove a caixa de seleção "Li e aceito" no fluxo da página de Termos e Condições.

*Padrão: `false`*


### `platform_unsubscribe_allowed`

**Permitir cancelamento de inscrição na plataforma**

Ao habilitar esta opção, você permite que qualquer usuário remova definitivamente a própria conta e todos os dados relacionados a ela da plataforma. Trata-se de uma ação bastante radical, mas necessária em portais abertos ao público em que os usuários podem se autorregistrar. Uma entrada adicional aparecerá no perfil do usuário para cancelar a inscrição após confirmação.

*Padrão: `false`*


### `redirect_after_login`

**Redirecionar após o login (por perfil)**

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

Array de nomes de campos de perfil (email, phone, language, official_code) que devem ser informados durante o registro.

### `send_inscription_msg_to_inbox`

**Enviar a mensagem de boas-vindas para e-mail e caixa de entrada**

Por padrão, a mensagem de boas-vindas (com as credenciais) é enviada apenas por e-mail. Habilite esta opção para enviá-la também para a caixa de entrada do Chamilo do usuário.

*Padrão: `false`*


### `sessionadmin_autosubscribe`

**Autoinscrição do administrador de sessão**

Autoinscrição do administrador de sessão — ainda não disponível

### `student_autosubscribe`

**Inscrição automática de aluno**

Inscrição automática de aluno - ainda não disponível

### `teacher_autosubscribe`

**Inscrição automática de professor**

Inscrição automática de professor - ainda não disponível

### `user_hide_never_expire_option`

**Ocultar a opção 'nunca expira' para usuários**

Remove a opção 'nunca expira' ao criar/editar uma conta de usuário.

*Padrão: `false`*