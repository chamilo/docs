# Denúncia confidencial

O Chamilo inclui um fluxo opcional de **denúncia confidencial** para o envio de preocupações sobre outro usuário a investigadores autorizados. Não se trata da ferramenta comum de chamados de suporte nem de um fórum público de discussão.

## Habilitar o recurso

Abra **Administração > Configurações de configuração > Segurança** e configure:

| Configuração | Padrão | Finalidade |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Habilitar o fluxo de denúncia confidencial |
| `security.confidential_reporting_min_reporters` | `2` | Número mínimo de denunciantes distintos (2–10) antes que uma investigação se torne visível |
| `security.confidential_reporting_attachments_enabled` | `true` | Permitir anexos de evidências |
| `security.confidential_reporting_notifications_enabled` | `false` | Exibir indicadores internos para investigações elegíveis (sem e-mails) |

A implantação também exige que a criptografia de denúncias confidenciais e o armazenamento privado do servidor estejam prontos. O Chamilo utiliza as funções criptográficas PHP Sodium e uma chave de criptografia privada; **guarde e faça backup dessa chave com segurança**. Perdê-la pode tornar ilegíveis as denúncias armazenadas. Não copie a chave para um repositório Git. Não habilite o recurso antes de verificar se o armazenamento da chave privada e as migrações de banco de dados necessárias estão operacionais.

## Enviar uma denúncia

1. Entre diretamente no Chamilo e abra **Denúncia confidencial** (quando habilitada no portal).
2. Escolha a pessoa envolvida, informe um assunto e descreva o incidente.
3. Adicione evidências se os anexos estiverem habilitados.
4. Decida se os investigadores podem ver seu **nome e e-mail** nesta denúncia específica. Essa permissão pode ser revogada posteriormente.
5. Envie a denúncia. Use **Minhas denúncias confidenciais** para acompanhar o caso e trocar mensagens com um investigador.

A identidade do denunciante **não é exibida aos investigadores por padrão**. Trata-se de um controle de confidencialidade, não de uma promessa de anonimato absoluto em relação aos operadores do sistema.

## Permissões e limiares de investigação

As investigações exigem a permissão dedicada `welfare:investigate` e um administrador ou função de RH elegível. Um caso fica disponível para investigação somente depois que o número configurado de **denunciantes distintos** for atingido para o mesmo alvo. Um investigador não pode investigar uma denúncia sobre si mesmo. O acesso de RH limita-se aos usuários acompanhados pelo gestor de RH.

Os investigadores acessam **Investigações confidenciais** para visualizar casos elegíveis, analisar evidências e trocar mensagens. Casos abaixo do limiar ou não autorizados não são expostos pela API de investigação. A **personificação** administrativa não concede acesso à denúncia confidencial.

## Privacidade e cuidados operacionais

As denúncias e as evidências anexadas contêm dados pessoais sensíveis. Restrinja as permissões dos investigadores, limite o acesso aos backups, defina uma política organizacional adequada de retenção e teste o fluxo com contas distintas de denunciante, alvo e investigador. Evite copiar denúncias completas para logs técnicos ou rastreadores de issues.

Implementação: [Denúncia confidencial #9310](https://github.com/chamilo/chamilo-lms/pull/9310).