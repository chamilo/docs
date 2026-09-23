# Segurança

O bloco **Segurança** no painel de administração agrupa as ferramentas nativas de monitorização e auditoria de segurança da plataforma. É distinto das [Definições de Segurança](../platform-settings/security-settings.md), que configuram a *política* de segurança (regras de palavras-passe, CAPTCHA, cabeçalhos de segurança HTTP, entre outras) — este bloco disponibiliza os *relatórios e ferramentas* que vigiam a plataforma em busca de atividade suspeita e alterações indesejadas.

![O bloco Segurança no painel de administração, listando Auditoria de atividades, Tentativas de início de sessão, Simple IDS, Verificador de força de palavras-passe e Integridade de ficheiros](../../.gitbook/assets/admin-security-block.png)

O bloco foi introduzido no Chamilo 2.0 com quatro ferramentas e alargado no Chamilo 3.0 com uma quinta, **Integridade de ficheiros**.

## Aceder ao Bloco Segurança

No painel de administração, o bloco **Segurança** aparece juntamente com os outros blocos do painel (Utilizadores, Cursos, Gestão da plataforma, Sistema, entre outros). Clique em qualquer uma das respetivas ligações para abrir a ferramenta correspondente.

## O Que Contém o Bloco

* **[Auditoria de Atividades](activities-audit.md)** — Percorra eventos administrativos e da plataforma importantes (alterações de utilizadores, cursos, sessões e outras) por tipo de evento
* **[Tentativas de Início de Sessão](login-attempts.md)** — Reveja tentativas de início de sessão falhadas e bem-sucedidas, com gráficos e um registo pesquisável
* **[Simple IDS](simple-ids.md)** — Consulte pedidos assinalados pelo sistema de deteção de intrusões nativo e leve do Chamilo
* **[Verificador de Força de Palavras-passe](password-strength-checker.md)** — Analise utilizadores ativos em busca de palavras-passe que coincidam com uma lista de palavras-passe frequentemente utilizadas
* **[Integridade de Ficheiros](file-integrity.md)** *(novo no Chamilo 3.0)* — Detete adições, modificações, eliminações ou alterações de permissões inesperadas nos ficheiros instalados

## Quem Pode Aceder

Todas as cinco ferramentas exigem acesso de **Administrador do Portal**. As ações de análise, pausa e redefinição da linha de base da integridade de ficheiros exigem adicionalmente acesso de **Administrador Global**, e pausar alertas ou estabelecer uma nova linha de base exige que volte a introduzir a sua própria palavra-passe — consulte [Integridade de Ficheiros](file-integrity.md#actions) para mais pormenores.