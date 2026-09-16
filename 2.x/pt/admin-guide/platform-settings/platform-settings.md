# Configurações da Plataforma

Identidade e comportamento no nível da plataforma — nome da instituição, fuso horário, política de registro, usuários online, flags de desempenho.

Acesse essas configurações em **Administração > Configurações de configuração > Plataforma**. Esta categoria contém **29 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_my_files`

**Habilitar seção 'Meus Arquivos'**

Permite que os usuários façam upload de arquivos para um espaço pessoal na plataforma.

*Padrão: `true`*

### `chamilo_database_version`

**Versão atual do esquema de banco de dados usado pelo Chamilo**

Exibe a versão atual do banco de dados para corresponder à versão principal do Chamilo.

### `cookie_warning`

**Notificação de privacidade de cookies**

Se ativada, esta opção exibe um banner no topo da plataforma que solicita aos usuários que reconheçam que a plataforma utiliza cookies necessários para proporcionar a experiência do usuário. O banner pode ser facilmente reconhecido e ocultado pelo usuário. Isso permite que o Chamilo cumpra as regulamentações da UE sobre cookies na web.

*Padrão: `false`*

### `disable_copy_paste`

**Desativar copiar e colar**

Quando ativada, esta opção desabilita, tanto quanto possível, os mecanismos de copiar e colar. Útil em configurações de exames restritivos.

*Padrão: `false`*

### `donotlistcampus`

**Não listar este campus em chamilo.org**

Por padrão, os portais Chamilo são automaticamente registrados em uma lista pública em chamilo.org, usando apenas o título que você deu a este portal (não a URL nem dados privados). Marque esta caixa para evitar que o título do seu portal apareça.

*Padrão: `false`*

### `generate_random_login`

**Gerar nome de usuário aleatório**

Ao importar usuários (processos em lote), gera automaticamente uma string aleatória para o nome de usuário. Caso contrário, o nome de usuário será gerado com base no nome e sobrenome, ou no prefixo do e-mail.

*Padrão: `false`*

### `hosting_limit_identical_email`

**Limitar uso de e-mails idênticos**

Número máximo de contas permitidas para compartilhar o mesmo endereço de e-mail. Defina como 0 para desativar este limite.

*Padrão: `0`*

### `hosting_limit_users_per_course`

**Limite global de usuários por curso**

Define um número máximo global de usuários (incluindo professores) permitidos para se inscreverem em um único curso na plataforma. Defina este valor como 0 para desativar o limite. Isso ajuda a evitar que cursos sejam sobrecarregados em portais abertos.

*Padrão: `0`*

### `institution`

**Nome da organização**

O nome da organização (aparece no cabeçalho à direita)

*Padrão: `Chamilo.org`*

### `institution_address`

**Endereço da instituição**

Endereço

### `institution_url`

**URL da organização (endereço web)**

A URL da instituição (o link que aparece no cabeçalho à direita)

*Padrão: `http://www.chamilo.org`*

### `max_courses_per_user`

**Máximo de cursos por usuário**

Número máximo de cursos que um professor/treinador pode criar. Defina como 0 para desativar o limite. Pode ser substituído por usuário através da compra de um serviço BuyCourses.

*Padrão: `0`*

### `notification_event`

**Habilitar a ferramenta de notificação para um canal de comunicação mais impactante com os alunos**

Ativa notificações pop-up ou do sistema para eventos importantes da plataforma.

*Padrão: `false`*

### `pdf_img_dpi`

**Resolução de exportação de PDF**

Representa a resolução dos arquivos PDF gerados (em pontos por polegada, ou dpi). O padrão é 96. Aumentar esse valor proporcionará arquivos PDF de melhor resolução, mas também aumentará o tamanho e o tempo de geração dos arquivos.

*Padrão: `96`*

### `platform_logo_url`

**URL para logotipo alternativo da plataforma**

Substitui o logotipo do Chamilo carregando uma URL (possivelmente remota). Certifique-se de que isso é permitido pelas suas políticas de segurança.

*Padrão: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Habilitar compartilhamento avançado de portfólio**

Decide quem pode visualizar as postagens e comentários do portfólio.

*Padrão: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostrar postagens de cursos base em cursos de sessão**

Decide quem pode visualizar as postagens e comentários do portfólio.

*Padrão: `false`*

### `push_notification_settings`

**Configurações de notificação push (JSON)**

Configuração JSON para integração de notificações push.

### `server_type`

**Tipo de servidor**

Define o tipo de ambiente: "prod" (produção normal), "validation" (como produção, mas sem relatórios de estatísticas) ou "test" (modo de depuração com ferramentas de desenvolvedor, como indicadores de strings não traduzidas).

*Padrão: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Permitir que administradores de sessão vejam todos os usuários em todas as URLs**

Se ativado, os administradores de sessão podem pesquisar e listar usuários de todas as URLs de acesso, independentemente da URL atual.

*Padrão: `false`*

---
### `site_name`

**Nome do portal de e-learning**

O nome do seu portal Chamilo (aparece no cabeçalho)

*Padrão: `Chamilo site`*


### `timepicker_increment`

**Incremento do seletor de horário**

Incremento mínimo de tempo (em minutos) ao selecionar uma data e hora com o widget de seletor de horário. Por exemplo, pode não ser útil ter incrementos menores que 5 ou 15 minutos ao falar sobre envio de tarefas, disponibilidade de um teste, horário de início de uma sessão, etc.

*Padrão: `15`*


### `timezone`

**Fuso horário padrão**

Selecione o fuso horário padrão para este portal. Isso ajudará a definir o fuso horário (se o recurso estiver ativado) para cada novo usuário ou para qualquer usuário que ainda não tenha configurado um fuso horário específico. Os fusos horários ajudam a exibir todas as informações relacionadas ao tempo na tela no fuso horário específico de cada usuário.

*Padrão: `Europe/Paris`*


### `unoconv_binaries`

**Binários do conversor UNO**

Forneça o caminho do sistema para a biblioteca de conversão UNO para habilitar alguns recursos extras de exportação.

*Padrão: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Usar ID externo de carreira em diagramas**

Se estiver usando diagramas de carreira, mostre um campo extra em vez do ID interno de carreira.

*Padrão: `false`*


### `use_custom_pages`

**Usar páginas personalizadas**

Habilite este recurso para configurar páginas de login específicas por função.

*Padrão: `false`*


### `use_virtual_keyboard`

**Usar teclado virtual**

Faz aparecer um teclado virtual. Isso é útil ao configurar exames restritivos em uma sala física onde os alunos não têm teclado, para limitar sua capacidade de trapacear.

*Padrão: `false`*


### `user_status_show_option`

**Opções de exibição de funções**

Um array de função => true/false que define se essa função deve ser exibida ou ocultada.

### `user_status_show_options_enabled`

**Exibição seletiva de funções**

Habilite para usar um array para definir quais funções devem ser claramente exibidas e quais devem ser ocultadas.

*Padrão: `false`*