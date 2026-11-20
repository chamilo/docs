# Integridade de Arquivos

*Novo no Chamilo 3.0.*

A Integridade de Arquivos compara os arquivos instalados no seu servidor com uma linha de base confiável, para detectar adições, modificações, exclusões e alterações de permissões que você não esperava — o tipo de alteração que uma invasão bem-sucedida, uma dependência comprometida ou uma edição manual equivocada deixaria para trás.

## Acessando a Integridade de Arquivos

No painel de administração, clique em **Segurança > Integridade de arquivos**.

## O Que Ela Mostra

![A página Integridade de arquivos mostrando informações da última varredura, painéis para arquivos Adicionados, Modificados, Excluídos e com Permissões alteradas, uma lista de Histórico de alertas e Ações para executar uma varredura, pausar alertas ou estabelecer uma nova linha de base](/.gitbook/assets/admin-security-file-integrity.png)

* **Última varredura** — Quando a varredura mais recente foi executada e quantos arquivos ela verificou
* **Adicionados / Modificados / Excluídos** — Arquivos que diferem da linha de base, identificados pela comparação de checksums SHA-256 (cada lista é limitada a 500 caminhos, com uma nota se a lista completa for maior — consulte o log CEF abaixo para a lista completa)
* **Permissões alteradas** — Arquivos cujas permissões diferem da linha de base. No Linux, isso compara os bits de modo POSIX diretamente (por exemplo, um arquivo que se torna gravável por todos é sinalizado); no Windows, apenas o atributo somente leitura é rastreado, pois `fileperms()` não reflete as ACLs reais do NTFS
* **Histórico de alertas** — Um log durável, apenas de acréscimo, de cada varredura que encontrou algo (até as últimas 50). Ao contrário do relatório acima, esta lista nunca é limpa por uma varredura limpa ou por uma nova linha de base, de modo que alertas anteriores permanecem visíveis mesmo depois que o desvio que eles sinalizaram tenha sido resolvido

A verificação percorre toda a árvore de arquivos instalada, exceto os diretórios `var/` e `.git/` — com uma exceção: `.git/config` ainda é observado individualmente, especificamente para detectar um remoto Git sendo silenciosamente redirecionado para um servidor hostil. Links simbólicos nunca são seguidos, para evitar loops de travessia ou escape do diretório de instalação.

Como uma varredura completa de uma instalação grande pode levar vários minutos, o percurso é dividido em partes (um diretório de nível superior por vez) e seu progresso é rastreado em um arquivo de bloqueio — de modo que a página possa ser recarregada com segurança para verificar o progresso, e uma varredura interrompida ou encerrada nunca seja confundida com uma ainda em execução.

## Ações

* **Executar uma varredura agora** — Compara a árvore de arquivos atual com a linha de base imediatamente
* **Pausar por 1 hora** — Suspende temporariamente os alertas (por exemplo, enquanto você implanta uma atualização). Exige que você redigite a própria senha. Enquanto pausada, uma varredura adota silenciosamente a árvore atual como a nova linha de base em vez de alertar, de modo que a janela de pausa se encerre sem alertas residuais. A pausa máxima é de 24 horas
* **Estabelecer nova linha de base** — Adota a árvore de arquivos atual como a nova referência confiável. Exige que você redigite a própria senha

Pausar alertas ou estabelecer uma nova linha de base pode ocultar uma invasão em andamento, razão pela qual ambas as ações exigem novamente a sua senha — uma sessão de administrador sequestrada por si só não é suficiente para silenciar a detecção enquanto os arquivos estão sendo adulterados.

## Execução via Cron

As mesmas verificações estão disponíveis como comandos de console, destinados a ser agendados com cron em vez de executados a partir da página de administração em um agendamento:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Se uma pausa estiver ativa, `app:file-integrity:scan` redefine a linha de base silenciosamente em vez de alertar, correspondendo ao comportamento de uma varredura disparada a partir da página de administração.

## Configurações

Uma configuração relacionada encontra-se em **Configurações > Segurança**:

* **`file_integrity_check_notify_admins`** — Uma lista de endereços de e-mail a notificar quando um desvio for encontrado; se deixada vazia, todos os Administradores Globais são notificados

## Integração SIEM

Cada varredura também grava linhas de log CEF (Common Event Format) em `var/logs/security/file_integrity.log`, adequadas para ingestão por um SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat e ferramentas semelhantes). Cada linha é marcada com um ID de assinatura que identifica o tipo de alteração:

| Assinatura | Significado |
|-----------|---------|
| `FIM-ADDED` | Um novo arquivo apareceu |
| `FIM-MODIFIED` | O conteúdo de um arquivo foi alterado |
| `FIM-DELETED` | Um arquivo desapareceu |
| `FIM-GITCONFIG` | `.git/config` foi alterado (possível remoto sequestrado) |
| `FIM-PERMS` | As permissões de um arquivo foram alteradas |
| `FIM-TRUNCATED` | O relatório de uma categoria foi limitado; consulte o log para a lista completa |

## Uso Recomendado

1. Estabeleça uma linha de base imediatamente após a instalação e novamente após cada atualização ou implantação manual
2. Agende `app:file-integrity:scan` no cron (por exemplo, todas as noites)
3. Antes de uma janela de manutenção planejada que alterará arquivos (uma atualização, uma migração), use **Pausar por 1 hora** em vez de remover o job do cron por completo
4. Encaminhe `var/logs/security/file_integrity.log` para o monitoramento de logs ou SIEM existente, se você tiver um