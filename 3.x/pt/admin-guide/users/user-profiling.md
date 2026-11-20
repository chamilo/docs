# Perfil de Utilizadores

O Chamilo permite definir campos de perfil personalizados (campos extra) para capturar informações adicionais sobre os utilizadores para além do nome, e-mail e função padrão.

## Campos Extra de Perfil

![A lista de campos extra de perfil a mostrar campos personalizados com nome, tipo e definições de visibilidade](/.gitbook/assets/admin-extra-fields-list.png)

Os campos extra permitem armazenar metadados específicos da sua organização, tais como:

* Número de colaborador
* Departamento
* Cargo
* Localização/escritório
* Número de telefone
* Identificadores personalizados

## Criar Campos Extra

1. No painel de administração, navegue até **Extra fields** ou **Profile fields**
2. Clique em **Add**
3. Configure o campo:
   * **Name** — O título do campo apresentado aos utilizadores
   * **Description** — Descrição opcional
   * **Helper text** — A mostrar por baixo do campo em qualquer formulário que o inclua
   * **Field type** — Texto, lista pendente, data, caixa de verificação, etc.
   * **Field label** — O nome interno do campo, para integração de plugins 
   * **Possible values** — Se o campo for um seletor entre esses valores 
   * **Default value** — Um valor predefinido opcional
   * **Visible to self** — Se o campo é visível no perfil do utilizador pelo próprio utilizador
   * **Visible to others** — Se o campo é visível para outros utilizadores da plataforma
   * **Can change** — Se o utilizador pode alterar o seu próprio campo (ou se apenas os administradores o podem fazer)
   * **Filter** — Se se trata de um campo do tipo seletor, se deve ser incluído como filtro nas páginas administrativas (p. ex., para inscrever utilizadores em cursos ou sessões)
   * **Order** — Se pretender gerir a ordem de apresentação dos campos, terá de atribuir uma ordem numérica a cada campo
   * **Remove on anonymization** — Importante para regras e leis de privacidade: se o utilizador for anonimizado mas não eliminado, este campo deve ser considerado como potencial detentor de dados pessoalmente identificáveis? 
4. Guarde

## Tipos de Campo

O motor de campos extra suporta um conjunto alargado de tipos de entrada. Os mais comuns incluem:

| Type | Description |
|------|-------------|
| **Text** | Uma entrada de texto de uma só linha |
| **Textarea** | Uma entrada de texto de várias linhas |
| **Radio** | Um grupo de botões de opção de escolha única |
| **Dropdown / Dropdown multiple** | Uma lista de opções predefinidas (seleção única ou múltipla) |
| **Double select** | Duas listas pendentes dependentes (p. ex., país → cidade) |
| **Checkbox** | Um interruptor sim/não |
| **Date / Date and time** | Seletor de data ou de data+hora |
| **Integer** | Uma entrada numérica |
| **Tag** | Vários valores de etiquetas de forma livre |
| **File** | Campo de carregamento de ficheiro |
| **Video URL** | Um URL que aponta para um vídeo |
| **Mobile phone number** | Um campo de número de telefone formatado |
| **Timezone** | Um seletor de fuso horário |
| **Social profile** | Uma ligação para um perfil de rede social |
| **Divider** | Um separador visual no formulário (sem valor) |

O conjunto exato de tipos utilizáveis depende da versão do Chamilo; a lista pendente de tipo de campo na página de administração **Extra fields** é a fonte da verdade.

## Utilizar Campos Extra

Os campos extra aparecem:

* Nos formulários de criação (se visíveis para o próprio) e de edição de utilizadores
* Nas páginas de perfil de utilizador (se visíveis para o próprio)
* Nas importações de utilizadores (pode incluir valores de campos extra nas importações CSV)
* Em exportações e relatórios (filtrar ou agrupar por valores de campos extra)

## Sugestões

* **Planeie antes de criar** — Defina que informações precisa antes de criar campos, pois alterar tipos de campo depois de os dados terem sido introduzidos pode ser problemático
* **Utilize listas pendentes para consistência** — Quando um campo tem um conjunto conhecido de valores possíveis, utilize uma lista pendente em vez de texto livre para garantir a consistência dos dados
* **Utilize para relatórios** — Os campos extra são úteis para filtrar relatórios (p. ex., «mostrar todos os utilizadores do Departamento X que concluíram a Formação Y»)