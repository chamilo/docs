# Definições da plataforma

Identidade e comportamento ao nível da plataforma — nome da instituição, fuso horário, política de registo, utilizadores em linha, flags de desempenho.

Aceda a estas definições em **Administração > Definições de configuração > Plataforma**. Esta categoria contém **29 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_my_files`

**Ativar a secção «Os meus ficheiros»**

Permite que os utilizadores carreguem ficheiros para um espaço pessoal na plataforma.

*Predefinição: `true`*

### `chamilo_database_version`

**Versão atual do esquema da base de dados utilizado pelo Chamilo**

Apresenta a versão atual da BD para corresponder à versão do núcleo do Chamilo.

### `cookie_warning`

**Notificação de privacidade de cookies**

Se estiver ativada, esta opção mostra um banner no topo da plataforma que pede aos utilizadores que confirmem que a plataforma utiliza cookies necessários para proporcionar a experiência de utilização. O banner pode ser facilmente confirmado e ocultado pelo utilizador. Isto permite que o Chamilo cumpra a regulamentação da UE relativa a cookies na Web.

*Predefinição: `false`*

### `disable_copy_paste`

**Desativar copiar-colar**

Quando ativada, esta opção desativa, tanto quanto possível, os mecanismos de copiar-colar. Útil em configurações de exames restritivas.

*Predefinição: `false`*

### `donotlistcampus`

**Não listar este campus em chamilo.org**

Por predefinição, os portais Chamilo são automaticamente registados numa lista pública em chamilo.org, utilizando apenas o título que atribuiu a este portal (não o URL nem quaisquer dados privados). Marque esta caixa para evitar que o título do seu portal apareça.

*Predefinição: `false`*

### `generate_random_login`

**Gerar nome de utilizador aleatório**

Ao importar utilizadores (processos em lote), gera automaticamente uma cadeia aleatória para o nome de utilizador. Caso contrário, o nome de utilizador será gerado com base no primeiro nome e no apelido, ou no prefixo do correio eletrónico.

*Predefinição: `false`*

### `hosting_limit_identical_email`

**Limitar a utilização de correio eletrónico idêntico**

Número máximo de contas autorizadas a partilhar o mesmo endereço de correio eletrónico. Defina como 0 para desativar este limite.

*Predefinição: `0`*

### `hosting_limit_users_per_course`

**Limite global de utilizadores por curso**

Define um número máximo global de utilizadores (incluindo formadores) autorizados a inscrever-se em qualquer curso individual da plataforma. Defina este valor como 0 para desativar o limite. Isto ajuda a evitar que os cursos fiquem sobrecarregados em portais abertos.

*Predefinição: `0`*

### `institution`

**Nome da organização**

O nome da organização (aparece no cabeçalho à direita)

*Predefinição: `Chamilo.org`*


### `institution_address`

**Morada da instituição**

Morada

### `institution_url`

**URL da organização (endereço Web)**

O URL das instituições (a hiperligação que aparece no cabeçalho à direita)

*Predefinição: `http://www.chamilo.org`*


### `max_courses_per_user`

**Máximo de cursos por utilizador**

Número máximo de cursos que um formador/professor pode criar. Defina como 0 para desativar o limite. Pode ser substituído por utilizador através de uma compra de serviço BuyCourses.

*Predefinição: `0`*

### `notification_event`

**Ativar a ferramenta de notificações para um canal de comunicação mais impactante com os estudantes**

Ativa notificações popup ou de sistema para eventos importantes da plataforma.

*Predefinição: `false`*

### `pdf_img_dpi`

**Resolução da exportação PDF**

Representa a resolução dos ficheiros PDF gerados (em pontos por polegada, ou dpi). O valor predefinido é 96. Aumentá-lo produzirá ficheiros PDF com melhor resolução, mas também aumentará o peso e o tempo de geração dos ficheiros.

*Predefinição: `96`*

### `platform_logo_url`

**URL para logótipo alternativo da plataforma**

Substitui o logótipo do Chamilo carregando um URL (possivelmente remoto). Certifique-se de que isto é permitido pelas suas políticas de segurança.

*Predefinição: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Ativar partilha avançada do portefólio**

Decide quem pode ver as publicações e os comentários do portefólio.

*Predefinição: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostrar publicações do curso base no curso da sessão**

Decide quem pode ver as publicações e os comentários do portefólio.

*Predefinição: `false`*

### `push_notification_settings`

**Definições de notificações push (JSON)**

Configuração JSON para a integração de notificações Push.

### `server_type`

**Tipo de servidor**

Define o tipo de ambiente: "prod" (produção normal), "validation" (como produção, mas sem reporte de estatísticas) ou "test" (modo de depuração com ferramentas de programador, como indicadores de cadeias não traduzidas).

*Predefinição: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Permitir que os administradores de sessão vejam todos os utilizadores em todos os URLs**

Se estiver ativada, os administradores de sessão podem pesquisar e listar utilizadores de todos os URLs de acesso, independentemente do URL atual.

*Predefinição: `false`*

### `site_name`

**Nome do portal de e-learning**

O nome do seu portal Chamilo (aparece no cabeçalho)

*Predefinição: `Chamilo site`*


### `timepicker_increment`

**Incremento do seletor de hora**

Incremento mínimo de tempo (em minutos) ao selecionar uma data e hora com o widget de seletor de hora. Por exemplo, pode não ser útil ter incrementos inferiores a 5 ou 15 minutos quando se trata da submissão de trabalhos, da disponibilidade de um teste, da hora de início de uma sessão, etc.

*Predefinição: `15`*

### `timezone`

**Fuso horário predefinido**

Selecione o fuso horário predefinido para este portal. Isto ajudará a definir o fuso horário (se a funcionalidade estiver ativada) para cada novo utilizador ou para qualquer utilizador que ainda não tenha definido um fuso horário específico. Os fusos horários ajudam a mostrar toda a informação relacionada com o tempo no ecrã no fuso horário específico de cada utilizador.

*Predefinição: `Europe/Paris`*


### `unoconv_binaries`

**Binários do conversor UNO**

Indique o caminho de sistema para a biblioteca do conversor UNO para ativar algumas funcionalidades extra de exportação.

*Predefinição: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Utilizar o ID externo da carreira nos diagramas**

Se utilizar diagramas de carreira, mostrar um campo extra em vez do ID interno da carreira.

*Predefinição: `false`*

### `use_custom_pages`

**Utilizar páginas personalizadas**

Ative esta funcionalidade para configurar páginas de início de sessão específicas por papel

*Predefinição: `false`*

### `use_virtual_keyboard`

**Utilizar teclado virtual**

Fazer aparecer um teclado virtual. Isto é útil ao configurar exames restritivos numa sala física em que os estudantes não têm teclado, para limitar a sua capacidade de copiar.

*Predefinição: `false`*

### `user_status_show_option`

**Opções de apresentação de papéis**

Um array de papel => true/false que define se esse papel deve ser mostrado ou ocultado.

### `user_status_show_options_enabled`

**Apresentação seletiva de papéis**

Ativar para utilizar um array que define quais os papéis que devem ser claramente apresentados e quais devem ser ocultados.

*Predefinição: `false`*