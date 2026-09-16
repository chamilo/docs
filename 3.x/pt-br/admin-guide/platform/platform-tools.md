# Ferramentas da Plataforma

Esta página aborda os itens restantes, de menor porte, no bloco de gerenciamento da Plataforma.

## Extra Fields

**Platform > Extra fields** é um seletor de tipos, e não uma lista de campos em si — ele exibe todos os tipos de objeto que suportam campos personalizados, e clicar em um deles leva ao editor de campos daquele tipo. Os tipos disponíveis incluem: user, course, session, question, learning path (e learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event e portfolio (além de scheduled announcements, se esse recurso estiver habilitado).

Para o caso mais comumente utilizado — campos personalizados de perfil de usuário — consulte [Perfilamento de Usuários](../users/user-profiling.md), que aborda o mesmo recurso subjacente pelo lado do gerenciamento de usuários.

## Mail Templates

**Platform > Mail templates** permite substituir o texto de e-mails específicos do sistema (confirmação de registro, notificações de inscrição e similares) sem alterar arquivos do servidor. Cada modelo tem um título, um **type** correspondente ao e-mail interno específico que ele substitui, o corpo do modelo em si (texto simples/Twig, não um editor rico) e um sinalizador "set as default" — apenas um modelo por tipo pode ser o padrão ativo. Os modelos são delimitados por URL de acesso; não há um campo separado por idioma, portanto o tratamento de idioma desses e-mails é o que o código circundante já faz.

Os modelos são renderizados por meio de um ambiente Twig **sandboxed** por segurança: apenas um conjunto reduzido de tags e filtros é permitido, e os únicos dados disponíveis são o objeto `User` do destinatário, referenciado como `user.getEmail()`, `user.getFirstname()` e getters semelhantes (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Qualquer coisa fora dessa lista de permissões não gera erro de forma ruidosa — é renderizada silenciosamente como vazia, o que então recai no modelo interno original. Mantenha seus modelos personalizados simples e teste-os (usando um registro ou disparo de notificação reais) após a edição.

## Contact Form Categories

**Platform > Contact form categories** gerencia a lista suspensa exibida no formulário público **Contact us** do seu portal. Cada categoria é apenas um título e um endereço de e-mail de destino — a categoria que o visitante escolher determina para qual caixa de entrada a mensagem será encaminhada. Use isso para direcionar tópicos diferentes (suporte, vendas, admissões) a equipes diferentes sem criar formulários separados.

## Atalhos de Categoria de Configurações

Alguns itens do bloco são simplesmente links diretos para categorias específicas de [Configurações da Plataforma](../platform-settings/README.md), em vez de ferramentas separadas:

* **Plugins** e **System templates** abrem as Configuration Settings pré-filtradas para essas categorias
* **Regions** faz o mesmo, para as configurações de região da plataforma

## Itens Ocasionalmente Visíveis

Alguns itens só aparecem quando a configuração ou o plugin relevante está ativo, portanto você pode não vê-los na sua instalação:

* **Terms and Conditions** — aparece quando **Allow terms and conditions** está habilitado, para gerenciar o texto que os usuários devem aceitar
* **Notifications** — aparece quando o recurso de eventos de notificação da plataforma está habilitado
* **CMS**, **Dictionary**, **Justification** — cada um vinculado ao respectivo plugin opcional estar instalado e habilitado