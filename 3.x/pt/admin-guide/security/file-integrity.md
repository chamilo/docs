# Integridade de Ficheiros

*Novo no Chamilo 3.0.*

A Integridade de Ficheiros compara os ficheiros instalados no seu servidor com uma linha de base de confiança, para detetar adições, modificações, eliminações e alterações de permissões que não esperava — o tipo de alteração que uma intrusão bem-sucedida, uma dependência comprometida ou uma edição manual inadvertida deixaria para trás.

## Aceder à Integridade de Ficheiros

No painel de administração, clique em **Segurança > Integridade de ficheiros**.

## O Que Mostra

![A página Integridade de ficheiros a mostrar informações da última análise, painéis para ficheiros Adicionados, Modificados, Eliminados e com Permissões alteradas, uma lista de Histórico de alertas e Ações para executar uma análise, pausar alertas ou estabelecer uma nova linha de base](../../.gitbook/assets/admin-security-file-integrity.png)

* **Última análise** — Quando correu a análise mais recente e quantos ficheiros verificou
* **Adicionados / Modificados / Eliminados** — Ficheiros que diferem da linha de base, identificados pela comparação de checksums SHA-256 (cada lista está limitada a 500 caminhos, com uma nota se a lista completa for mais longa — consulte o registo CEF abaixo para a lista completa)
* **Permissões alteradas** — Ficheiros cujas permissões diferem da linha de base. No Linux, isto compara diretamente os bits de modo POSIX (por exemplo, um ficheiro que se torna gravável por todos é sinalizado); no Windows, apenas o atributo só de leitura é acompanhado, uma vez que `fileperms()` não reflete as ACL NTFS reais
* **Histórico de alertas** — Um registo duradouro, apenas de acréscimo, de cada análise que encontrou alguma coisa (até às últimas 50). Ao contrário do relatório acima, esta lista nunca é limpa por uma análise limpa ou por uma nova linha de base, pelo que os alertas passados permanecem visíveis mesmo depois de o desvio que sinalizaram ter sido resolvido

A verificação percorre toda a árvore de ficheiros instalada, exceto os diretórios `var/` e `.git/` — com uma exceção: `.git/config` continua a ser vigiado individualmente, especificamente para detetar um remoto Git a ser silenciosamente redirecionado para um servidor hostil. Ligações simbólicas nunca são seguidas, para evitar ciclos de travessia ou sair do diretório de instalação.

Como uma análise completa de uma instalação grande pode demorar vários minutos, o percurso é dividido em blocos (um diretório de nível superior de cada vez) e o seu progresso é acompanhado num ficheiro de bloqueio — para que a página possa ser recarregada em segurança para verificar o progresso, e uma análise interrompida ou terminada nunca seja confundida com uma ainda em execução.

## Ações

* **Executar uma análise agora** — Compara imediatamente a árvore de ficheiros atual com a linha de base
* **Pausar durante 1 hora** — Suspende temporariamente os alertas (por exemplo, enquanto implementa uma atualização). Exige que volte a introduzir a sua própria palavra-passe. Enquanto estiver em pausa, uma análise adota silenciosamente a árvore atual como nova linha de base em vez de alertar, para que a janela de pausa se feche sem alertas residuais. A pausa máxima é de 24 horas
* **Estabelecer nova linha de base** — Adota a árvore de ficheiros atual como a nova referência de confiança. Exige que volte a introduzir a sua própria palavra-passe

Pausar alertas ou estabelecer uma nova linha de base pode ocultar uma intrusão em curso, razão pela qual ambas as ações exigem novamente a sua palavra-passe — uma sessão de administrador sequestrada, por si só, não basta para silenciar a deteção enquanto os ficheiros estão a ser adulterados.

## Execução a partir do Cron

As mesmas verificações estão disponíveis como comandos de consola, pensados para serem agendados com cron em vez de executados a partir da página de administração de forma periódica:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Se uma pausa estiver ativa, `app:file-integrity:scan` redefine a linha de base silenciosamente em vez de alertar, coincidindo com o comportamento de uma análise desencadeada a partir da página de administração.

## Definições

Uma definição relacionada encontra-se em **Definições de configuração > Segurança**:

* **`file_integrity_check_notify_admins`** — Uma lista de endereços de correio eletrónico a notificar quando for detetado desvio; se for deixada vazia, todos os Administradores Globais são notificados

## Integração SIEM

Cada análise também escreve linhas de registo CEF (Common Event Format) em `var/logs/security/file_integrity.log`, adequadas para ingestão por um SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat e ferramentas semelhantes). Cada linha é etiquetada com um identificador de assinatura que identifica o tipo de alteração:

| Assinatura | Significado |
|-----------|---------|
| `FIM-ADDED` | Apareceu um ficheiro novo |
| `FIM-MODIFIED` | O conteúdo de um ficheiro foi alterado |
| `FIM-DELETED` | Um ficheiro desapareceu |
| `FIM-GITCONFIG` | `.git/config` foi alterado (possível remoto sequestrado) |
| `FIM-PERMS` | As permissões de um ficheiro foram alteradas |
| `FIM-TRUNCATED` | O relatório de uma categoria foi limitado; consulte o registo para a lista completa |

## Utilização Recomendada

1. Estabeleça uma linha de base imediatamente após a instalação e novamente após cada atualização ou implantação manual
2. Agende `app:file-integrity:scan` no cron (por exemplo, todas as noites)
3. Antes de uma janela de manutenção planeada que altere ficheiros (uma atualização, uma migração), utilize **Pausar durante 1 hora** em vez de remover o trabalho cron por completo
4. Envie `var/logs/security/file_integrity.log` para o seu sistema existente de monitorização de logs ou SIEM, se o tiver