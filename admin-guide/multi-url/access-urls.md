# URLs de Acesso

As URLs de acesso permitem que uma única instalação do Chamilo sirva múltiplos portais separados.

## Casos de Uso

* **Implantações multi-inquilino** — Hospede portais de treinamento separados para diferentes organizações em um único servidor
* **Portais departamentais** — Dê a cada departamento seu próprio portal personalizado (por exemplo, `hr.treinamento.empresa.com`, `ti.treinamento.empresa.com`)
* **Portais regionais** — Portais separados para diferentes regiões ou idiomas

## Como Funciona

Cada URL de acesso é um ponto de entrada separado para a mesma instalação do Chamilo:

* Os usuários podem ser atribuídos a uma ou mais URLs de acesso
* Cursos e sessões pertencem a URLs de acesso específicas
* As configurações da plataforma podem ser personalizadas por URL de acesso
* A marca e os temas podem variar por URL
* Usuários em um portal não podem ver usuários ou cursos em outro (a menos que explicitamente compartilhados)

## Configuração

### Ativando Multi-URL

O recurso Multi-URL deve ser ativado na configuração do Chamilo (geralmente nas configurações de ambiente). Isso normalmente é feito durante a configuração inicial.

### Criando uma URL de Acesso

1. No painel de administração, navegue até **URLs de Acesso**
2. Clique em **Adicionar uma URL**
3. Insira a URL (por exemplo, `https://portal2.seusite.com`)
4. Configure as definições específicas para esta URL
5. Salve

### Atribuindo Usuários e Cursos

* **Usuários** — Atribua usuários a URLs de acesso específicas. Um usuário pode pertencer a várias URLs.
* **Cursos** — Atribua cursos a URLs de acesso específicas
* **Sessões** — Atribua sessões a URLs de acesso específicas

### Configurações por URL

Cada URL de acesso pode ter suas próprias:

* **Tema de cores** — Marca visual diferente
* **Nome e logotipo da plataforma** — Identidade personalizada
* **Substituições de configurações** — Certas configurações da plataforma podem ser personalizadas por URL

## Dicas

* **Decida cedo** — Se optar por uma configuração multi-URL, faça isso no início do seu projeto Chamilo, pois isso exige que a primeira URL permaneça relativamente vazia de conteúdo. Ativar multi-URL posteriormente é mais desafiador (requer alterações manuais no banco de dados).
* **Planeje a estrutura de URL** — Decida sobre o esquema de URL antes de criar URLs de acesso, pois alterar URLs posteriormente afeta todos os links e favoritos existentes
* **Configuração de DNS** — Cada URL de acesso deve resolver para o mesmo servidor Chamilo. Configure os registros DNS adequadamente.
* **Administrador global** — Use o papel de Administrador Global para gerenciar todas as URLs de acesso