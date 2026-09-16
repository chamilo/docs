# Ferramentas da Plataforma

Esta página aborda os itens restantes, de menor dimensão, no bloco de gestão da Plataforma.

## Extra Fields

**Platform > Extra fields** é um seletor de tipos, e não uma lista de campos em si — mostra todos os tipos de objeto que suportam campos personalizados, e clicar num deles leva ao editor de campos desse tipo. Os tipos disponíveis incluem: user, course, session, question, learning path (e learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event e portfolio (além de scheduled announcements, se essa funcionalidade estiver ativada).

Para o caso mais comum — campos personalizados de perfil de utilizador — consulte [User Profiling](../users/user-profiling.md), que aborda a mesma funcionalidade subjacente do lado da gestão de utilizadores.

## Mail Templates

**Platform > Mail templates** permite substituir o texto de e-mails específicos do sistema (confirmação de registo, notificações de inscrição e semelhantes) sem alterar ficheiros do servidor. Cada modelo tem um título, um **type** correspondente ao e-mail integrado específico que substitui, o corpo do modelo em si (texto simples/Twig, não um editor rico) e um indicador "set as default" — apenas um modelo por tipo pode ser o predefinido ativo. Os modelos têm âmbito por URL de acesso; não existe um campo separado por idioma, pelo que o tratamento linguístico destes e-mails é o que o código envolvente já faz.

Os modelos são renderizados através de um ambiente Twig **sandboxed** por segurança: apenas um conjunto reduzido de tags e filtros é permitido, e os únicos dados disponíveis são o objeto `User` do destinatário, referenciado como `user.getEmail()`, `user.getFirstname()` e getters semelhantes (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Qualquer coisa fora dessa lista de permissões não gera um erro visível — é renderizada silenciosamente como vazia, o que depois recorre ao modelo integrado original. Mantenha os seus modelos personalizados simples e teste-os (usando um registo ou um disparo de notificação reais) após a edição.

## Contact Form Categories

**Platform > Contact form categories** gere a lista pendente apresentada no formulário público **Contact us** do seu portal. Cada categoria é apenas um título e um endereço de e-mail de destino — a categoria que um visitante escolhe determina para que caixa de entrada a mensagem é encaminhada. Utilize isto para encaminhar tópicos diferentes (suporte, vendas, admissões) para equipas diferentes sem criar formulários separados.

## Atalhos de Categorias de Definições

Alguns itens do bloco são simplesmente ligações diretas para categorias específicas de [Platform Settings](../platform-settings/README.md), em vez de ferramentas autónomas:

* **Plugins** e **System templates** abrem as Configuration Settings pré-filtradas para essas categorias
* **Regions** faz o mesmo, para as definições de região da plataforma

## Itens Ocasionalmente Visíveis

Alguns itens só aparecem quando a definição ou o plugin relevante está ativo, pelo que poderá não os ver na sua instalação:

* **Terms and Conditions** — aparece quando **Allow terms and conditions** está ativado, para gerir o texto que os utilizadores devem aceitar
* **Notifications** — aparece quando a funcionalidade de eventos de notificação da plataforma está ativada
* **CMS**, **Dictionary**, **Justification** — cada um associado ao respetivo plugin opcional estar instalado e ativado