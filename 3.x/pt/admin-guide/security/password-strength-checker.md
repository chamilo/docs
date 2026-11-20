# Verificador de Força de Palavras-passe

O Verificador de Força de Palavras-passe compara os hashes de palavras-passe armazenados dos utilizadores ativos com uma lista curta de palavras-passe frequentemente utilizadas (`123456`, `password`, `qwerty123` e semelhantes). Nunca apresenta nem transmite as próprias palavras-passe — apenas indica se a palavra-passe atual de um utilizador coincide com um dos candidatos conhecidos como fracos.

## Aceder ao Verificador de Força de Palavras-passe

No painel de administração, clique em **Segurança > Verificador de força de palavras-passe**.

## Executar uma análise

![A página do verificador de força de palavras-passe, com um campo para IDs de utilizador a analisar e um botão para executar a análise](/.gitbook/assets/admin-security-password-strength.png)

* Deixe **IDs de utilizador a analisar** vazio para analisar todos os utilizadores ativos, ou introduza uma lista de IDs de utilizador separados por vírgulas para verificar um subconjunto
* Clique em **Executar análise de força de palavras-passe**

A análise é executada de forma assíncrona em segundo plano para não congelar a página, mostrando o progresso em tempo real (utilizadores verificados até ao momento, do total, e quantas palavras-passe fracas foram encontradas). Como cada palavra-passe candidata tem de ser verificada em relação ao hash de cada utilizador selecionado, analisar todos os utilizadores numa plataforma grande pode demorar algum tempo — a lista de candidatos é mantida intencionalmente curta para limitar este custo.

## Agir sobre os resultados

![Os resultados da análise concluída, listando um utilizador sinalizado com as colunas Nome, Nome de utilizador e E-mail, e ações por linha para solicitar uma alteração de palavra-passe ou forçar uma redefinição de palavra-passe](/.gitbook/assets/admin-security-password-strength-results.png)

Quando a análise termina, os utilizadores sinalizados são listados com duas ações disponíveis, por utilizador ou como ação em massa para todos os utilizadores selecionados:

* **Solicitar alteração de palavra-passe** (ícone de envelope) — Envia ao utilizador um e-mail a pedir que altere a palavra-passe
* **Forçar redefinição de palavra-passe** (ícone de redefinição) — Invalida imediatamente a palavra-passe atual do utilizador e envia-lhe uma nova por e-mail

Ambas as ações voltam a verificar os utilizadores selecionados em relação à lista de palavras-passe fracas antes de agir, para que um pedido desatualizado ou adulterado não possa ser usado para redefinir uma conta que já não tenha uma palavra-passe fraca.

## Utilização recomendada

* Execute esta análise periodicamente, especialmente após uma importação em massa de utilizadores (as contas importadas por vezes vêm com palavras-passe predefinidas simples)
* Combine-a com as definições **Requisitos mínimos de sintaxe da palavra-passe** e **Intervalo de rotação de palavras-passe** em [Definições de segurança](../platform-settings/security-settings.md) para impedir que palavras-passe fracas sejam definidas à partida, em vez de apenas as detetar a posteriori