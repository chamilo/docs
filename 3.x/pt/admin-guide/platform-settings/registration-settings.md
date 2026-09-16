# Definições de Registo

Política de autorregisto e redirecionamentos após o registo — o que é pedido aos novos utilizadores e para onde são encaminhados.

Aceda a estas definições em **Administração > Definições de configuração > Registo**. Esta categoria contém **21 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaço. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_double_validation_in_registration`

**Dupla validação no processo de registo**

Simplesmente apresenta um pedido de confirmação na página de registo antes de avançar com a criação do utilizador.

*Predefinição: `false`*


### `allow_fields_inscription`

**Restringir os campos apresentados durante o registo**

Se pretender mostrar apenas alguns dos campos de perfil disponíveis, pode completar o array aqui com os subelementos 'fields' e 'extra_fields' contendo arrays com a lista dos campos a mostrar.

### `allow_invitation_registration` **v3**

**Permitir o registo através de ligações de convite para cursos**

Quando ativado, um professor/administrador pode enviar uma ligação de convite de utilização única a partir da ferramenta Utilizadores de um curso, que permite a uma pessoa não registada aceder ao formulário de registo e registar-se mesmo quando o autorregisto geral (`allow_registration`) está desativado.

*Predefinição: `false`*

Consulte [Inscrever utilizadores](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) para o lado desta funcionalidade voltado para o professor.

### `allow_lostpassword`

**Palavra-passe perdida**

Os utilizadores podem pedir a recuperação da palavra-passe perdida?

*Predefinição: `true`*

### `allow_registration`

**Registo**

O registo como novo utilizador é permitido? Os utilizadores podem criar novas contas?

*Predefinição: `false`*

### `allow_registration_as_teacher`

**Registo como professor**

É possível registar-se como professor (com a capacidade de criar cursos)?

*Predefinição: `false`*

### `allow_terms_conditions`

**Ativar termos e condições**

Esta opção apresentará os Termos e Condições no formulário de registo para novos utilizadores. Precisa de ser configurada primeiro na página de administração do portal.

*Predefinição: `false`*


### `drh_autosubscribe`

**Autoinscrição do diretor de recursos humanos**

Autoinscrição do diretor de recursos humanos — ainda não disponível

### `extendedprofile_registration`

**Campos do portefólio no registo**

Quais dos seguintes campos do portefólio têm de estar disponíveis no processo de registo do utilizador? Isto exige que a opção de portefólio esteja ativada (ver acima).

### `extendedprofile_registrationrequired`

**Campos obrigatórios do portefólio no registo**

Quais dos seguintes campos do portefólio são *obrigatórios* no processo de registo do utilizador? Isto exige que a opção de portefólio esteja ativada e que o campo também esteja disponível no formulário de registo (ver acima).

### `extldap_config`

**Configuração da ligação LDAP**

Array que define o anfitrião e a porta do servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar a caixa de aceitação legal na página de Termos e Condições**

Se definido como verdadeiro, remove a caixa de verificação «Li e aceito» no fluxo da página de Termos e Condições.

*Predefinição: `false`*


### `platform_unsubscribe_allowed`

**Permitir o cancelamento da inscrição na plataforma**

Ao ativar esta opção, permite que qualquer utilizador elimine definitivamente a sua própria conta e todos os dados relacionados da plataforma. Trata-se de uma ação bastante radical, mas necessária em portais abertos ao público onde os utilizadores se podem autorregistar. Surgirá uma entrada adicional no perfil do utilizador para cancelar a inscrição após confirmação.

*Predefinição: `false`*


### `redirect_after_login`

**Redirecionamento após o início de sessão (por perfil)**

Defina o redirecionamento por perfil após o início de sessão utilizando um objeto JSON como {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Predefinição:*
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

**Campos extra obrigatórios durante o registo**

Array de identificadores de campos extra que devem ser preenchidos durante o registo do utilizador.

### `required_profile_fields`

**Campos obrigatórios durante o registo**

Array de nomes de campos de perfil (email, phone, language, official_code) que devem ser fornecidos durante o registo.

### `send_inscription_msg_to_inbox`

**Enviar a mensagem de boas-vindas para o correio eletrónico e para a caixa de entrada**

Por predefinição, a mensagem de boas-vindas (com as credenciais) é enviada apenas por correio eletrónico. Ative esta opção para a enviar também para a caixa de entrada Chamilo do utilizador.

*Predefinição: `false`*


### `sessionadmin_autosubscribe`

**Autoinscrição do administrador de sessão**

Autoinscrição do administrador de sessão — ainda não disponível

### `student_autosubscribe`

**Inscrição automática de alunos**

Inscrição automática de alunos - ainda não disponível

### `teacher_autosubscribe`

**Inscrição automática de professores**

Inscrição automática de professores - ainda não disponível

### `user_hide_never_expire_option`

**Ocultar a opção «nunca expira» para utilizadores**

Remove a opção «nunca expira» ao criar/editar uma conta de utilizador.

*Predefinição: `false`*