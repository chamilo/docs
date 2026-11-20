# Configurações do Curso

As configurações do curso permitem controlar o comportamento do seu curso — quem pode acessá-lo, como ele aparece e quais recursos estão habilitados.

Para acessar as configurações do curso, entre no seu curso e clique no ícone **Configurações** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Configurações" data-size="line"> ao lado do botão **Alternar para a visão do aluno**.

## Configurações Gerais

### Informações do Curso

* **Título do curso** — O nome de exibição do seu curso
* **Idioma do curso** — O idioma principal da interface do curso
* **Categoria do curso** — A categoria sob a qual o curso aparece no catálogo
* **Imagem do curso** — Envie uma miniatura que represente o seu curso nas listagens de cursos (será redimensionada conforme o contexto)

O código do curso (o identificador único curto) é definido quando o curso é criado e não é editável nesta página.

Por padrão, todos os usuários que entram no seu curso verão toda a interface do Chamilo no idioma do seu curso. Este é um recurso imersivo. Os administradores podem alterar esse comportamento, mas você também pode alterá-lo com uma das primeiras opções: **Exibir o curso no idioma do usuário** (definida como Não por padrão), se achar que isso dificulta demais para os seus usuários.

O departamento e a URL do departamento são campos obsoletos. Eles são mantidos apenas por motivos de suporte legado.

Se habilitada, você pode alternar o estilo dentro do seu curso com a opção **Folhas de estilo**, usando as folhas de estilo existentes no seu portal. Essa opção costuma ser desabilitada pelos administradores, para um design global mais integrado.

### Cota de Disco

Cada curso tem um limite de armazenamento (cota de disco) para arquivos enviados. A cota é definida pelo administrador da plataforma. Você pode ver o seu limite atual nas configurações do curso e o uso atual na ferramenta **Documentos**.

> Se estiver ficando sem espaço, entre em contato com o administrador da plataforma para solicitar um aumento de cota ou remova arquivos não utilizados da ferramenta Documentos.

### Visibilidade do Curso

![As configurações de visibilidade do curso mostrando as opções público, aberto, registrado e fechado](/.gitbook/assets/course-settings-visibility.png)

Controle quem pode acessar o seu curso:

| Configuração | Descrição |
|---------|-------------|
| **Público** | Qualquer pessoa, inclusive visitantes anônimos, pode acessar o curso |
| **Aberto à plataforma** | Todos os usuários registrados na plataforma podem acessar o curso |
| **Privado — acesso concedido por usuários privilegiados** | Somente usuários explicitamente inscritos no curso podem acessá-lo |
| **Fechado** | O curso está bloqueado; ninguém pode acessá-lo, exceto o professor |

#### Configurações de Inscrição

Dependendo da configuração da sua plataforma, você poderá controlar:

* **Permitir autoinscrição** — Se os alunos podem se inscrever por conta própria pelo catálogo de cursos
* **Permitir autodesinscrição** — Se os alunos podem sair do curso por conta própria
* **Senha de inscrição** — Exigir uma senha para a autoinscrição (útil para restringir o acesso a um grupo específico), mas o nível de segurança é baixo, pois a mesma senha de acesso ao curso é compartilhada entre todos os usuários.

Essas configurações cobrem apenas a autoinscrição. Para o panorama completo — incluindo inscrever você mesmo um usuário existente ou convidar alguém que ainda não tem conta na plataforma — consulte [Inscrição de Usuários](../assessing-learners/subscribing-users.md).

### Configurações de Documentos

Escolha se deseja exibir ou ocultar as pastas do sistema na ferramenta **Documentos** (ocultas por padrão; na maioria dos casos você realmente não precisa delas, e exibi-las pode causar problemas com conteúdo oculto e com os alunos).

### Configurações de Notificação por E-mail

Configure como a atividade do curso dispara notificações:

* **Notificações por e-mail para conteúdo novo** — Notificar os usuários inscritos quando você adicionar novos documentos, avisos ou outro conteúdo

### Configurações do Chat

Controle como a ferramenta **Chat** será exibida.

### Configurações de Percurso de Aprendizagem

* **Habilitar temas do curso** — Permitir que os percursos de aprendizagem alterem a aparência (não recomendado para uma experiência de usuário integrada)
* **Link de retorno do percurso de aprendizagem** — Decida para onde os usuários vão ao clicar no ícone **Início** em um percurso de aprendizagem: a lista de percursos de aprendizagem, a página inicial do curso, *Meus cursos*, *Minhas sessões* ou a página inicial do portal

### Configurações de Avanço Temático

Configure como as mensagens de avanço temático aparecerão na página inicial do curso.

### Configurações do Fórum

Controle o comportamento na ferramenta de fórum deste curso.

### Configurações de Tarefas

* **Configuração padrão para a visibilidade de arquivos recém-enviados** — Decida se novos documentos enviados pelos alunos na ferramenta **Tarefas** são compartilhados com todos os demais alunos (Não por padrão)
* **Permitir que os alunos excluam as próprias publicações** — Permitir que os alunos excluam as tarefas que já enviaram (caso queiram enviar uma correção).

### Configurações de inicialização automática

Um curso pode ser configurado para ter um comportamento de inicialização automática, o que encurtará o caminho dos alunos até as partes importantes do seu curso. Se habilitado, os alunos que entrarem no seu curso serão enviados diretamente para a ferramenta selecionada e não verão a página inicial do curso como etapa intermediária. Você pode até selecionar percursos de aprendizagem ou exercícios específicos para iniciar ao chegar ao curso. Nesse caso, você precisa selecionar a opção aqui, depois ir à lista de percursos de aprendizagem ou de exercícios e clicar no ícone de foguete <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Inicialização automática" data-size="line"> no item selecionado.

### Configurações dos assistentes de IA

Esta seção só aparece se o administrador tiver habilitado as ferramentas de IA na plataforma. Ela permite refinar a seleção dos serviços de assistente de IA disponíveis por meio das diferentes ferramentas da sua plataforma Chamilo. Desabilite-os se não quiser usá-los, mas isso provavelmente seria uma má ideia, pois são recursos muito poderosos.

Esses recursos são explicados na seção **Ferramentas de IA** deste guia.

### Ferramentas externas (LTI)

Se habilitado na sua plataforma, o Learning Tools Integration permite integrar a este curso atividades externas compatíveis, como ícones individuais na página inicial do curso. Discutir LTI está fora do escopo deste guia, mas este é um sistema de integração poderoso para professores.

### Outros

Seções ou opções adicionais podem aparecer nesta página, dependendo das opções e das versões do Chamilo.