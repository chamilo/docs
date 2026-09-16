# Perfil de Usuário

O Chamilo permite definir campos de perfil personalizados (campos extras) para capturar informações adicionais sobre os usuários além do nome, e-mail e função padrão.

## Campos de Perfil Extras

![Lista de campos de perfil extras mostrando campos personalizados com nome, tipo e configurações de visibilidade](/.gitbook/assets/admin-extra-fields-list.png)

Os campos extras permitem armazenar metadados específicos da sua organização, como:

* ID de funcionário
* Departamento
* Cargo
* Localização/escritório
* Número de telefone
* Identificadores personalizados

## Criando Campos Extras

1. No painel de administração, navegue até **Campos extras** ou **Campos de perfil**
2. Clique em **Adicionar**
3. Configure o campo:
   * **Nome** — O título do campo exibido aos usuários
   * **Descrição** — Descrição opcional
   * **Texto de ajuda** — Para ser exibido abaixo do campo em qualquer formulário que o inclua
   * **Tipo de campo** — Texto, lista suspensa, data, caixa de seleção, etc.
   * **Rótulo do campo** — O nome interno do campo, para integração com plugins
   * **Valores possíveis** — Se o campo for um seletor entre esses valores
   * **Valor padrão** — Um valor padrão opcional
   * **Visível para si mesmo** — Se o campo é visível no perfil do usuário pelo próprio usuário
   * **Visível para outros** — Se o campo é visível para outros usuários da plataforma
   * **Pode alterar** — Se o usuário pode alterar seu próprio campo por si mesmo (ou se apenas os administradores podem)
   * **Filtro** — Se este for um campo do tipo seletor, se deve ser incluído como filtro em páginas administrativas (por exemplo, para inscrever usuários em cursos ou sessões)
   * **Ordem** — Se você deseja gerenciar a ordem de exibição dos campos, deverá atribuir uma ordem numérica a cada campo
   * **Remover na anonimização** — Importante para regras e leis de privacidade: Se o usuário for anonimizado, mas não excluído, este campo deve ser considerado como potencial detentor de dados pessoalmente identificáveis?
4. Salvar

## Tipos de Campo

O mecanismo de campos extras suporta um amplo conjunto de tipos de entrada. Os mais comuns incluem:

| Tipo | Descrição |
|------|-------------|
| **Texto** | Uma entrada de texto de linha única |
| **Área de texto** | Uma entrada de texto de várias linhas |
| **Rádio** | Um grupo de rádio de escolha única |
| **Lista suspensa / Lista suspensa múltipla** | Uma lista de opções predefinidas (seleção única ou múltipla) |
| **Seleção dupla** | Duas listas suspensas dependentes (por exemplo, país → cidade) |
| **Caixa de seleção** | Um alternador sim/não |
| **Data / Data e hora** | Seletor de data ou data+hora |
| **Inteiro** | Uma entrada numérica |
| **Tag** | Múltiplos valores de tag de forma livre |
| **Arquivo** | Campo de upload de arquivo |
| **URL de vídeo** | Uma URL apontando para um vídeo |
| **Número de telefone celular** | Um campo de número de telefone formatado |
| **Fuso horário** | Um seletor de fuso horário |
| **Perfil social** | Um link para um perfil de rede social |
| **Divisor** | Um separador visual dentro do formulário (sem valor) |

O conjunto exato de tipos utilizáveis depende da versão do Chamilo; a lista suspensa de tipo de campo na página de administração **Campos extras** é a fonte de referência.

## Usando Campos Extras

Os campos extras aparecem:

* Na criação de usuário (se visível para si mesmo) e formulários de edição
* Nas páginas de perfil do usuário (se visível para si mesmo)
* Em importações de usuários (você pode incluir valores de campos extras em importações CSV)
* Em exportações e relatórios (filtrar ou agrupar por valores de campos extras)

## Dicas

* **Planeje antes de criar** — Defina quais informações você precisa antes de criar campos, pois alterar tipos de campo após a inserção de dados pode ser problemático
* **Use listas suspensas para consistência** — Quando um campo tem um conjunto conhecido de valores possíveis, use uma lista suspensa em vez de texto livre para garantir a consistência dos dados
* **Use para relatórios** — Campos extras são úteis para filtrar relatórios (por exemplo, "mostrar todos os usuários do Departamento X que completaram o Treinamento Y")