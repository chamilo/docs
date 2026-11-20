# Perfilamento de Usuários

O Chamilo permite definir campos de perfil personalizados (campos extras) para capturar informações adicionais sobre os usuários além do nome, e-mail e papel padrão.

## Campos extras de perfil

![A lista de campos extras de perfil mostrando campos personalizados com nome, tipo e configurações de visibilidade](/.gitbook/assets/admin-extra-fields-list.png)

Os campos extras permitem armazenar metadados específicos da sua organização, como:

* ID do funcionário
* Departamento
* Cargo
* Localização/escritório
* Número de telefone
* Identificadores personalizados

## Criação de campos extras

1. No painel de administração, navegue até **Extra fields** ou **Profile fields**
2. Clique em **Add**
3. Configure o campo:
   * **Name** — O título do campo exibido aos usuários
   * **Description** — Descrição opcional
   * **Helper text** — Texto a ser exibido abaixo do campo em qualquer formulário que o inclua
   * **Field type** — Texto, lista suspensa, data, caixa de seleção etc.
   * **Field label** — O nome interno do campo, para integração com plugins 
   * **Possible values** — Se o campo for um seletor entre esses valores 
   * **Default value** — Um valor padrão opcional
   * **Visible to self** — Se o campo é visível no perfil do usuário pelo próprio usuário
   * **Visible to others** — Se o campo é visível para outros usuários da plataforma
   * **Can change** — Se o usuário pode alterar o próprio campo (ou se apenas os administradores podem)
   * **Filter** — Se este for um campo do tipo seletor, se deve incluí-lo como filtro nas páginas administrativas (por exemplo, para inscrever usuários em cursos ou sessões)
   * **Order** — Se você quiser gerenciar a ordem de exibição dos campos, será necessário atribuir uma ordem numérica a cada campo
   * **Remove on anonymization** — Importante para regras e leis de privacidade: se o usuário for anonimizado, mas não excluído, este campo deve ser considerado como possível detentor de dados de identificação pessoal? 
4. Salve

## Tipos de campo

O mecanismo de campos extras oferece suporte a um conjunto amplo de tipos de entrada. Os mais comuns incluem:

| Type | Description |
|------|-------------|
| **Text** | Um campo de texto de uma linha |
| **Textarea** | Um campo de texto de várias linhas |
| **Radio** | Um grupo de opções de escolha única |
| **Dropdown / Dropdown multiple** | Uma lista de opções predefinidas (seleção única ou múltipla) |
| **Double select** | Duas listas suspensas dependentes (por exemplo, país → cidade) |
| **Checkbox** | Um interruptor sim/não |
| **Date / Date and time** | Seletor de data ou de data+hora |
| **Integer** | Um campo numérico |
| **Tag** | Vários valores de tags em formato livre |
| **File** | Campo de envio de arquivo |
| **Video URL** | Uma URL apontando para um vídeo |
| **Mobile phone number** | Um campo de número de telefone formatado |
| **Timezone** | Um seletor de fuso horário |
| **Social profile** | Um link para um perfil de rede social |
| **Divider** | Um separador visual dentro do formulário (sem valor) |

O conjunto exato de tipos utilizáveis depende da versão do Chamilo; a lista suspensa de tipos de campo na página de administração **Extra fields** é a fonte da verdade.

## Uso de campos extras

Os campos extras aparecem:

* Nos formulários de criação (se visíveis para o próprio usuário) e de edição de usuários
* Nas páginas de perfil do usuário (se visíveis para o próprio usuário)
* Nas importações de usuários (você pode incluir valores de campos extras em importações CSV)
* Em exportações e relatórios (filtrar ou agrupar por valores de campos extras)

## Dicas

* **Planeje antes de criar** — Defina quais informações você precisa antes de criar os campos, pois alterar tipos de campo depois que os dados já foram inseridos pode ser problemático
* **Use listas suspensas para consistência** — Quando um campo tiver um conjunto conhecido de valores possíveis, use uma lista suspensa em vez de texto livre para garantir consistência dos dados
* **Use para relatórios** — Os campos extras são úteis para filtrar relatórios (por exemplo, "mostrar todos os usuários do Departamento X que concluíram o Treinamento Y")