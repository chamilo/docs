# Denúncia confidencial

O Chamilo inclui um fluxo de trabalho opcional de **denúncia confidencial** para submeter preocupações sobre outro utilizador a investigadores autorizados. Não se trata da ferramenta comum de pedidos de suporte nem de um fórum de discussão público.

## Ativar a funcionalidade

Abra **Administração > Definições de configuração > Segurança** e configure:

| Definição | Predefinição | Finalidade |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Ativar o fluxo de trabalho de denúncia confidencial |
| `security.confidential_reporting_min_reporters` | `2` | Número mínimo de denunciantes distintos (2–10) antes de uma investigação se tornar visível |
| `security.confidential_reporting_attachments_enabled` | `true` | Permitir anexos de prova |
| `security.confidential_reporting_notifications_enabled` | `false` | Mostrar indicadores internos para investigações elegíveis (sem correio eletrónico) |

A implementação também exige que a encriptação de denúncias confidenciais e o armazenamento privado do servidor estejam prontos. O Chamilo utiliza as funções criptográficas PHP Sodium e uma chave de encriptação privada; **conserve e faça cópia de segurança dessa chave de forma segura**. Perdê-la pode tornar as denúncias armazenadas ilegíveis. Não copie a chave para um repositório Git. Não ative a funcionalidade antes de verificar que o armazenamento da chave privada e as migrações de base de dados necessárias estão operacionais.

## Submeter uma denúncia

1. Inicie sessão diretamente no Chamilo e abra **Denúncia confidencial** (quando estiver ativada no portal).
2. Escolha a pessoa em causa, introduza um assunto e descreva o incidente.
3. Adicione provas se os anexos estiverem ativados.
4. Decida se os investigadores podem ver o seu **nome e correio eletrónico** nesta denúncia específica. Esta autorização pode ser retirada mais tarde.
5. Envie a denúncia. Utilize **As minhas denúncias confidenciais** para acompanhar o caso e trocar mensagens com um investigador.

A identidade do denunciante **não é apresentada aos investigadores por predefinição**. Trata-se de um controlo de confidencialidade, não de uma promessa de anonimato absoluto por parte dos operadores do sistema.

## Permissões e limiares de investigação

As investigações exigem a permissão dedicada `welfare:investigate` e um administrador elegível ou um papel de RH. Um caso fica disponível para investigação apenas depois de se atingir o número configurado de **denunciantes distintos** para o mesmo alvo. Um investigador não pode investigar uma denúncia sobre si próprio. O acesso de RH limita-se aos utilizadores que o gestor de RH acompanha.

Os investigadores acedem a **Investigações confidenciais** para ver os casos elegíveis, rever as provas e trocar mensagens. Os casos abaixo do limiar ou não autorizados não são expostos através da API de investigação. A **personificação** administrativa não concede acesso à denúncia confidencial.

## Privacidade e cuidado operacional

As denúncias e as provas anexadas contêm dados pessoais sensíveis. Restrinja as permissões dos investigadores, limite o acesso às cópias de segurança, defina uma política organizacional de retenção adequada e teste o fluxo de trabalho com contas separadas de denunciante, alvo e investigador. Evite copiar denúncias completas para registos técnicos ou sistemas de acompanhamento de incidências.

Implementação: [Denúncia confidencial #9310](https://github.com/chamilo/chamilo-lms/pull/9310).